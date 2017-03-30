@extends('layouts.admin')
@section('content')


<h1 class="page-header">Les types de jeu</h1>
    <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($lesTypeJeux as $typejeu)
                                         <tr> 
                                             
                                             <td>{{$typejeu["titre"]}}</td>                                                 
                                             
                                             <td> 
                                                 <a data-toggle="modal" data-target="#myModal{{$typejeu->id}}"><button type="button" class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a>
                                                 <!-- Modal supprimer -->
                                                    <div class="modal fade" id="myModal{{$typejeu->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Confirmation de suppression</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                            Voulez vous vraiment supprimer cette categorie : {{$typejeu->type}} ?</br>
                                                          </div>
                                                          <div class="modal-footer">
                                                             {!! Form::open(['route'=> ['typejeu.destroy',$typejeu["id"]], 'method' => 'delete'])  !!}
                                                                                {!! Form::submit('Supprimer',['class'=>'btn btn-danger up'])  !!}
                                                                              {!! Form::close()  !!}
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                     </div>
                                                  <a href="{{route('typejeu.edit', $typejeu->id)}}"><button type="button" class="btn btn-success"><i class="fa fa-lg fa-pencil"></i></button></a>
                                             
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
