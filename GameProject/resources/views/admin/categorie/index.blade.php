@extends('layouts.admin')
@section('content')


<h1 class="page-header">Les Categories</h1>
    <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Libelle</th>
                                            <th>Tag</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($lesCategories as $categorie)
                                         <tr> 
                                             
                                             <td>{{$categorie["libelle"]}}</td>                                                 
                                             <td>{{$categorie["tag"]}}</td>   
                                             <td> 
                                                 <a data-toggle="modal" data-target="#myModal{{$categorie->id}}"><button type="button" class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a>
                                                 <!-- Modal supprimer -->
                                                    <div class="modal fade" id="myModal{{$categorie->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Confirmation de suppression</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                            Voulez vous vraiment supprimer cette categorie : {{$categorie->libelle}} ?</br>
                                                          </div>
                                                          <div class="modal-footer">
                                                             {!! Form::open(['route'=> ['categorie.destroy',$categorie["id"]], 'method' => 'delete'])  !!}
                                                                                {!! Form::submit('Supprimer',['class'=>'btn btn-danger up'])  !!}
                                                                              {!! Form::close()  !!}
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                     </div>
                                                  <a href="{{route('categorie.edit', $categorie->id)}}"><button type="button" class="btn btn-success"><i class="fa fa-lg fa-pencil"></i></button></a>
                                             
                                             </td>
                                         </tr>
                                            @endforeach   
                                    
                                    </tbody>
                                </table>
        
    </div>
    </div>
    @if (Session::has('sucess'))
    {{Session::get('success')}}
    @endif
</html>                         
@stop
