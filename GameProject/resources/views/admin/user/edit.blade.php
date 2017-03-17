@extends('layout')
@section('content')


<h1 class="page-header">Editer un administrateur</h1>
    <div class="col-lg-12">
        <div class="panel panel-default">
                        <div class="panel-heading"> Editer un administrateur</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

                        {!! Form::open(array('method' => 'PUT', 'route' => ['user.update', $unUser->id])) !!}
                        <div class="form-group">
                        {!! Form::label('name', 'Nom') !!}
                        {!! Form::text('name', $unUser->name,['class'=>'form-control', 'required' => 'required']) !!}
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
                        {!! Form::text('email', $unUser->email, ['class'=>'form-control', 'required' => 'required']) !!}
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
                        {!! Form::select('statut',$lesStatuts, $unUser->statut, array('class' => 'form-control', 'required' => 'required')) !!}                        
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
                        {!! Form::label('mdp', 'Mot de passe') !!}
                        {!! Form::password('mdp', ['class'=>'form-control']) !!}
                         </div>
                          @if ($errors->has('mdp'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('mdp') as $message) 
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif
                        
                        <button type="submit" class="btn btn-primary col-lg-12"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                        {!! Form::close() !!}
    </div>
    
    
    
    
    
    


@stop