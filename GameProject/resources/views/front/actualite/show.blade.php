@extends('layouts.front')
@section('content')





	</header><!-- /.header -->
	
	
	
	<!-- page avec texte-->

	<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
                            <h1>Actualité</h1>
                                
			</header><!-- /.section-head -->
			
                        <div class="section-body">
                                <div class="features">
                                        <div class="row">
                                            @if(Auth::check())
                                            @if(Auth::user()->statut == "Admin" || Auth::user()->statut == "Moderateur")
                                                    
                                                
                                            <a href="{{route('actualite.edit', $uneActu->id)}}"><button class="btn btn-primary">Modifier</button></a>
                                                    
                                            @endif
                                            @endif
                                            
                                            
                                            <div class="bloc-actu col-xs-12 col-md-12 col-lg-12">
                                                
                                           <h3 class='titre-actu col-lg-12'>{{$uneActu->titre}}</h3>
                                           <div class="date-actu col-lg-12">{{$uneActu->categorie->libelle}}</div>
                                                    <div class="date-actu col-lg-12">{{$uneActu->created_at}} par <a href="{{route('user.profilFront', $uneActu->user->id)}}">{{$uneActu->user->name}}</a></div>
                                                    
                                                    <div class="message-actu col-lg-12">{!! nl2br(e($uneActu->description)) !!}</div>
								
                                            </div><!-- /.actu -->
                                            
                                            
                                            
                                                        
                                            @if(Auth::check())
                                            
                                                {!! Form::open(array('method' => 'PUT', 'route' => ['commentaire.storeFront', $uneActu->id], 'class' => 'form-horizontal')) !!}                        
                                                 <div class="form-group">
                                                  
                                                   <div class="col-lg-12">
                                                   {!! Form::textarea('commentaire',null, ['placeholder' => 'Votre commentaire...','class' => 'form-control'])!!}
                                                  </div>
                                                 </div>
                                                                   @if ($errors->has('commentaire'))
                                                                   <div class="alert alert-danger" role="alert">
                                                                           <ul>
                                                                                   @foreach ($errors->get('commentaire') as $message) 
                                                                                           <li>{{$message}}</li>
                                                                                   @endforeach
                                                                           </ul>
                                                                   </div>
                                                                   @endif
                                                     <button type="submit" class=" btn btn-primary center-block">Commenter</button>
                                                  
                                                {!! Form::close() !!}
                                            
                                            @endif
                                            
                                            @if($lesCom->count() > 1)
                                            <h3 class="text-left">Commentaires : {{$lesCom->count()}}</h3>
                                            @else
                                            <h3 class="text-left">Commentaire : {{$lesCom->count()}}</h3>
                                            @endif
                                           
                                            <!-- Metre les 3 derniers commentaire + btn afficher les autres en ajax -->
                                            @foreach($lesCom as $unCommentaire)
                                                <div class="bloc-poste commentaire col-xs-12 col-md-12 col-lg-12">
                                                <div class="barre-haut-poste">
                                                    <div id="date-poste">{{$unCommentaire->created_at}}</div>
                                                    @if(Auth::check())
                                                    @if(Auth::user()->id == $unCommentaire->user->id || Auth::user()->statut == "Admin" || Auth::user()->statut == "Moderateur")
                                                    
                                                    <div id="signaler-poste"><a data-toggle="modal" data-target="#myModal{{$unCommentaire->id}}"> Supprimer</a> - <a href="{{route('commentaire.edit', $unCommentaire->id)}}"> Editer</a></div>
                                                    <!-- Modal supprimer -->
                                                    <div class="modal fade" id="myModal{{$unCommentaire->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">Confirmation de suppression</h4>
                                                          </div>
                                                          <div class="modal-body">
                                                            Voulez vous vraiment supprimer ce commentaire ?</br>
                                                          </div>
                                                          <div class="modal-footer">
                                                             {!! Form::open(['route'=> ['commentaire.destroy',$unCommentaire->id], 'method' => 'delete'])  !!}
                                                                                {!! Form::submit('Supprimer',['class'=>'btn btn-danger up'])  !!}
                                                                              {!! Form::close()  !!}
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                     </div>
                                                    @endif
                                                    @endif
                                                </div>
                                                <div class="coupe-block"></div>
								<div class="user col-xs-4 col-md-3 col-lg-2"> 
                                                                    <div class="user-name"><a href="{{route('user.profilFront', $unCommentaire->user->id)}}">{{$unCommentaire->user->name}}</a></div>
                                                                    <div>{{$unCommentaire->user->statut}}</div>
                                                                    @if($unCommentaire->user->avatar != null)
                                                                    <img src="{{url('/images/user/avatar/'.$unCommentaire->user->avatar)}}" alt="" class="img-responsive">
                                                                    @else
                                                                    <img src="{{url('/images/user/default.png')}}" alt="" class="img-responsive">
                                                                    @endif                                                                  
                                                                    
								</div>
                                                            <div class="bloc-message col-xs-8 col-md-9 col-lg-10">
                                                               {!! nl2br(e($unCommentaire->description)) !!}
                                                            </div>
								
                                            </div><!-- /.poste --> 
                                            @endforeach
					
                                        
                                        {{$lesCom->links()}}
                                        </div> <!-- /.row -->
					
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
	</section><!-- /.section section-features -->
        
        
        
        
        
        

        
        
@stop