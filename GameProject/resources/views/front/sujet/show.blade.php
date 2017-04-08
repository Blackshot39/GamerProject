@extends('layouts.front')
@section('content')





	</header><!-- /.header -->
	
	
	
	<!-- page avec texte-->

	<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
                                @if($unSujet->ferme == false)
				<h2 class="section-title">{{$unSujet->titre}}</h2><!-- /.section-title -->
                                @else
                                <h2 class="section-title">[FERME] {{$unSujet->titre}}</h2><!-- /.section-title -->
                                @endif
			</header><!-- /.section-head -->
			
                        <div class="section-body">
                                <div class="features">
                                        <div class="row">
                                            
                                            @if(Auth::user()->statut == "Admin" || Auth::user()->statut == "Moderateur")
                                                    @if($unSujet->ferme == false)
                                                
                                                        {!! Form::open(['route' => ['sujet.fermer', $unSujet->id], 'method' => 'put']) !!}
                                                           <button type="submit" class=" btn btn-primary btn-statut-sujet">Fermer le sujet</button>
                                                       {!! Form::close() !!}   
                                                    @else
                                                    
                                                        {!! Form::open(['route' => ['sujet.ouvrir', $unSujet->id], 'method' => 'put']) !!}
                                                            <button type="submit" class=" btn btn-primary btn-statut-sujet">Ouvrir le sujet</button>
                                                        {!! Form::close() !!} 
                                                    @endif
                                            @endif
                                            
                                            
                                            @foreach ($lesPostes as $poste)
                                            
                                            
                                            <div class="bloc-poste col-xs-12 col-md-12 col-lg-12">
                                                <div class="barre-haut-poste">
                                                    <div id="date-poste">{{$poste->created_at}} -</div>
                                                    <div id="signaler-poste"><a href="#"> Signaler</a></div>
                                                    @if(Auth::user()->id == $poste->user->id || Auth::user()->statut == "Admin" || Auth::user()->statut == "Moderateur")
                                                    <div id="signaler-poste"> - <a href="{{route('poste.edit', $poste->id)}}"> Editer</a></div>
                                                    @endif
                                                </div>
                                                <div class="coupe-block"></div>
								<div class="user col-xs-4 col-md-3 col-lg-2"> 
                                                                    <div class="user-name"><a href="{{route('user.profilFront', $poste->user->id)}}">{{$poste->user->name}}</a></div>
                                                                    <div>{{$poste->user->statut}}</div>
                                                                    @if($poste->user->avatar != null)
                                                                    <img src="{{url('/images/user/avatar/'.$poste->user->avatar)}}" alt="" class="img-responsive">
                                                                    @else
                                                                    <img src="{{url('/images/user/default.png')}}" alt="" class="img-responsive">
                                                                    @endif
                                                                   <?php $nbPosteOfUser = $poste->user->postes()->count(); ?>
                                                                    @if ($nbPosteOfUser > 1)
                                                                    <div>Messages : {{$nbPosteOfUser}}</div>  
                                                                    @else
                                                                    <div>Message : {{$nbPosteOfUser}}</div>  
                                                                    @endif
                                                                    
								</div>
                                                            <div class="bloc-message col-xs-8 col-md-9 col-lg-10">
                                                               {!! nl2br(e($poste->description)) !!}
                                                            </div>
								
                                            </div><!-- /.poste -->
                                            @endforeach

                                            {{ $lesPostes->links() }}
                                                        
                                            @if($unSujet->ferme == false && Auth::check() == true)
                                            
                                                {!! Form::open(array('method' => 'PUT', 'route' => ['poste.repondre', $unSujet->id], 'class' => 'form-horizontal')) !!}                        
                                                 <div class="form-group">
                                                  {!! Form::label('desc', 'Message :',['class' => 'col-lg-2 control-label'])!!}
                                                   <div class="col-lg-10">
                                                   {!! Form::textarea('desc',null, ['placeholder' => 'Votre message...','class' => 'form-control'])!!}
                                                  </div>
                                                 </div>
                                                                   @if ($errors->has('desc'))
                                                                   <div class="alert alert-danger" role="alert">
                                                                           <ul>
                                                                                   @foreach ($errors->get('desc') as $message) 
                                                                                           <li>{{$message}}</li>
                                                                                   @endforeach
                                                                           </ul>
                                                                   </div>
                                                                   @endif
                                                     <button type="submit" class=" btn btn-primary center-block">Répondre</button>
                                                  
                                                {!! Form::close() !!}
                                            
                                            @endif
                                            
                                            
                                            
					
                                        
                                        
                                        </div> <!-- /.row -->
					
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
	</section><!-- /.section section-features -->
        
        
        
        
        
        

        
        
@stop