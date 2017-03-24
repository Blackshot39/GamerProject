@extends('layouts.admin')
@section('content')

<div class="col-lg-12">
    <a class="btn btn-link" href="{{route('user.create')}}"> Créer un compte</a>
    <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                   <thead>
                                        <tr>                                           
                                            <th>Nom</th>
                                            <th>E-mail</th>
                                            <th>Statut</th>
                                            <th>Ville</th>
                                            <th>Nb signalement</th>
                                            <th>Date de création</th>
<!--                                            <th>Action</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lesUsers as $user)
                                        <tr>
                                            <td>{{$user['name']}}</td>
                                            <td>{{$user['email']}}</td>
                                            <td>{{$user['statut']}}</td>
                                            <td>{{$user['ville']}}</td>
                                            <td>{{$user['nb-signal']}}</td>
                                            <td>{{Carbon\Carbon::parse($user->created_at)->format('d-m-Y h:i:s')}}</td>
                                            <td>  
                                                @if ($user->statut == 'attente')
                                               {!! Form::open(['route' => ['user.validateStatut', $user->id], 'method' => 'put']) !!}
                                               {!! Form::submit('Valider',['class'=>'btn btn-success']) !!}
                                               {!! Form::close() !!}
                                               @endif
                                                <a href="{{route('user.edit', $user->id)}}"><button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a>
                                               <!-- -->
                                               <!-- Utilisation du modal du boostrap le p declenche l'ouverture, voir documentation bootstrap -->
                                               <a data-toggle="modal" data-target="#myModal{{$user->id}}"><button type="button" class="btn btn-danger"><span class="glyphicon glyphicon glyphicon-trash" aria-hidden="true"></span></button></a>
                                               
                                                <!-- Modal -->
                                                <div class="modal fade" id="myModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Confirmation de suppression</h4>
                                                      </div>
                                                      <div class="modal-body">
                                                        Voulez vous vraiment supprimer l'utilisateur "{{$user->name}}" ?</br>
                                                      </div>
                                                      <div class="modal-footer">
                                                        {!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'delete']) !!}
                                                        {!! Form::submit('Oui',['class'=>'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                        <button type="button" class="btn btn-success" data-dismiss="modal">Non</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                                <!-- Fin Modal -->
                                               <!-- -->
                                                

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
    </div>
    
    {{ $lesUsers->links() }}
</div>  


                                                       
@stop