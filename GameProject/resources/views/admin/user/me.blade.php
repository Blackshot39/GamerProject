@extends('layouts.admin')
@section('content')


<h1 class="page-header">Mon profil</h1>
    <div class="col-lg-12">
        <div class="panel panel-default">
                        <div class="panel-heading"> Mon profil: {{$user->name}}</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

                        {!! Form::open(array('method' => 'PUT', 'route' => ['user.myAccountPut', $user->id], 'enctype' => 'multipart/form-data')) !!}
                           
                         

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

                        <div class="form-group">
                        
                       <p>Statut: {{$user->statut}}</p>                        
                        </div>
                        
                        <div class="form-group">
                        {!! Form::label('ville', 'Ville') !!}
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
                         
                        
                        
                        
                        <div class="form-group">
                        @if($user->avatar != null)
                            <img src="{{url('/').'/images/user/avatar/'.$user->avatar}}" alt="{{$user->name}}" class="img-responsive">                        
                        @else
                            <img src="{{url('/').'/images/userdefault.png'}}" alt="{{$user->name}}" class="img-responsive"> 
                        @endif
                        </div>
                        
                        <div class="form-group">			
                            {!! Form::label('avatar', 'Avatar') !!}
                            {!! Form::file('avatar', array('class' => 'form-control')) !!}
                        </div>
                        @if ($errors->has('avatar'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('avatar') as $message) 
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif
                        
                        
                        
                        
                        <div class="form-group">
                        {!! Form::label('now-mdp', 'Mot de passe actuel (obligatoire)') !!}
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
                        
                        <button type="submit" class="btn btn-primary col-lg-12"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                        {!! Form::close() !!}
    </div>
    
    
    
    
    
    


@stop