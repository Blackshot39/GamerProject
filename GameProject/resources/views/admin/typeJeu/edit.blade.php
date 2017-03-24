@extends('layouts.admin')
@section('content')


<h2> Modifier un produit : {{$unTypeJeu->titre}} </h2>

    {!! Form::open(['method'=>'put', 'route' => ['typejeu.update', $unTypeJeu->id],'class' => 'form-horizontal']) !!}
<div class="well">
           <div class="form-group">
      {!! Form::label('titre', 'Titre :',['class' => 'col-lg-2 control-label'])!!}
      <div class="col-lg-10">
          {!! Form::text('titre',$unTypeJeu->titre, ['placeholder' => 'titre','class' => 'form-control'])!!}
      </div>
      
      
      @if ($errors->has('titre'))               
      <div class="alert alert-danger">  
          <!--afficher les erreurs une par une-->
          @foreach ($errors->get('titre') as $message)
          <ul>
               
          <li> {{ $message }}</li>
                
          </ul>
          @endforeach
          
      </div>
      @endif
</div>
<button type="submit" class=" btn btn-primary center-block">Créer</button>
</div>
{!! Form::close() !!}
@stop
