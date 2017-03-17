@extends('layouts.admin')
@section('content')


<h1 class="page-header">Les types de jeu</h1>
    <div class="col-lg-12">
        <div class="panel panel-default">
                        <div class="panel-heading"> Mon profil</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

                        {!! Form::open(array('method' => 'PUT', 'route' => ['user.myAccountPut', $user->id])) !!}
                        <div class="form-group">
                        {!! Form::label('name', 'Nom') !!}
                          <p>{{$user->name}}</p>   
                        </div>      
                         @if ($errors->has('name'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('name') as $message) 
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif

                         <div class="form-group">
                        {!! Form::label('email', 'email') !!}
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
                        {!! Form::label('statut', 'Statut') !!}
                       <p>{{$user->statut}}</p>                        
                        </div>
                         @if ($errors->has('statut'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('statut') as $message) 
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
