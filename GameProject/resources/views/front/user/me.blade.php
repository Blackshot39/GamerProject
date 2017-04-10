@extends('layouts.front')
@section('content')



</header><!-- /.header -->
	
	
	
	<!-- page avec texte-->

	<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
                               
				<h2 class="section-title">Mon profil</h2><!-- /.section-title -->
                                
			</header><!-- /.section-head -->
			
                        <div class="section-body">
                                <div class="features">
                                        <div class="row">

                                            
        <div class="panel panel-default">
                        <div class="panel-heading">{{$user->name}} ({{$user->statut}})</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

                        {!! Form::open(array('method' => 'PUT', 'route' => ['user.meFrontPut', $user->id], 'enctype' => 'multipart/form-data')) !!}
                           
                         
                        <div class="col-lg-6">
                         <div class="form-group">
                        {!! Form::label('email', 'Email') !!}
                        {!! Form::text('email', $user->email, ['class'=>'form-control', 'required' => 'required']) !!}
                         </div>
                          @if ($errors->has('email'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('email') as $message) 
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif
                        </div>

                        
                        
                        <div class="col-lg-6">
                        <div class="form-group">
                        {!! Form::label('ville', 'Ville (laisser vide si vous ne souhaitez pas la partager') !!}
                        {!! Form::text('ville', $user->ville, ['class'=>'form-control']) !!}
                         </div>
                          @if ($errors->has('ville'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('ville') as $message) 
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif
                        </div>
                        
                        
                        <div class="col-lg-6">
                        
                        
                        
                        <div class="form-group">			
                            {!! Form::label('avatar', 'Avatar') !!}
                            @if($user->avatar != null)
                            <img src="{{url('/').'/images/user/avatar/'.$user->avatar}}" alt="{{$user->name}}" class="img-responsive">                        
                        @else
                            <img src="{{url('/').'/images/userdefault.png'}}" alt="{{$user->name}}" class="img-responsive"> 
                        @endif
                        </div>
                            {!! Form::file('avatar', array('class' => 'form-control')) !!}
                        
                        @if ($errors->has('avatar'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('avatar') as $message) 
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif
                        </div>
                        
                        
                        <div class="col-lg-6">
                        <div class="form-group">
                        {!! Form::label('now-mdp', 'Mot de passe actuel (obligatoire pour valider les changements)') !!}
                        {!! Form::password('now-mdp', ['class'=>'form-control']) !!}
                         </div>
                          @if ($errors->has('now-mdp'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('now-mdp') as $message) 
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif
                        </div>
                        
                        <div class="col-lg-6">
                            <br>
                         <div class="form-group">
                             <h4>Changer de mot de passe ? (facultatif)</h4>
                         </div>

                           
                        <div class="form-group">
                        {!! Form::label('new-mdp', 'Nouveau mot de passe') !!}
                        {!! Form::password('new-mdp', ['class'=>'form-control']) !!}
                         </div>
                          @if ($errors->has('new-mdp'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('new-mdp') as $message) 
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif
                        </div>
                        
                        <button type="submit" class="btn btn-primary col-lg-12"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                        {!! Form::close() !!}
    </div>
    
    
    
      </div> <!-- /.row -->
					
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
	</section><!-- /.section section-features -->
        
        
        
    
    


@stop