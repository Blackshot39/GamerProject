@extends('layouts.admin')
@section('content')


<h2> Modifier l'actualité : {{$uneActualite->titre}} </h2>

    {!! Form::open(['method'=>'put', 'route' => ['actualite.update', $uneActualite->id],'class' => 'form-horizontal']) !!}
<div class="well">
           <div class="form-group">
      {!! Form::label('titre', 'Titre :',['class' => 'col-lg-2 control-label'])!!}
      <div class="col-lg-10">
          {!! Form::text('titre',$uneActualite->titre, ['placeholder' => 'titre','class' => 'form-control'])!!}
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
           <div class="form-group">
      {!! Form::label('description', 'Texte :',['class' => 'col-lg-2 control-label'])!!}
      <div class="col-lg-10">
          {!! Form::text('description',$uneActualite->description, ['placeholder' => 'description','class' => 'form-control'])!!}
      </div>
      
      
      @if ($errors->has('description'))               
      <div class="alert alert-danger">  
          <!--afficher les erreurs une par une-->
          @foreach ($errors->get('description') as $message)
          <ul>
               
          <li> {{ $message }}</li>
                
          </ul>
          @endforeach
          
      </div>
      @endif
</div>
        <div class="form-group">
        {{ Form::label('categorie', 'Categorie :') }}
        {{ Form::select('categorie',$lesCategories, $uneActualite->categorie->id,['class'=>'form-control']) }}
    </div>
<button type="submit" class=" btn btn-primary center-block">Modifier</button>
</div>
{!! Form::close() !!}
@stop
