@extends('layouts.admin')
@section('content')    
    <h2 class="page-header"> Liste des jeux</h2>

    <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Description</th>
                                            <th>Date de sortie</th>
                                            <th>Photo</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($lesJeux as $jeu)
                                         <tr> 
                                             
                                             <td>{{$jeu["nom"]}}</td>                                                 
                                             <td>{{$jeu["description"]}}</td>
                                             <td>{{$jeu["dateSortie"]}}</td>
                                             <td><img src="{{'/GamerProject/GameProject/public/images/jeu/mini/'.$jeu["photo"]}} "> </td>
                                             <td> 
                                                 <a data-toggle="modal" data-target="#myModal{{$jeu->id}}"><button type="button" class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></button></a>
                                                 <!-- Modal supprimer -->
                                                    <div class="modal fade" id="myModal{{$jeu->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Confirmation de suppression</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                            Voulez vous vraiment supprimer ce jeu : {{$jeu->nom}} ?</br>
                                                          </div>
                                                          <div class="modal-footer">
                                                             {!! Form::open(['route'=> ['jeu.destroy',$jeu["id"]], 'method' => 'delete'])  !!}
                                                                                {!! Form::submit('Supprimer',['class'=>'btn btn-danger up'])  !!}
                                                                              {!! Form::close()  !!}
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Retour</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                     </div>
                                                 
                                                  <a href="{{route('jeu.edit', $jeu->id)}}"><button type="button" class="btn btn-success"><i class="fa fa-lg fa-pencil"></i></button></a>
                                                  <a href="{{route('jeu.addTypeJeu', $jeu->id)}}"><button type="button" class="btn btn-primary"><i class="fa fa-lg fa-plus"></i></button></a>
                                             
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

