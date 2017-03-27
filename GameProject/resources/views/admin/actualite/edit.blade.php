@extends('layouts.admin')
@section('content')


<h2> Modifier un produit : {{$uneActualite->titre}} </h2>

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
      {!! Form::label('description', 'Description :',['class' => 'col-lg-2 control-label'])!!}
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
        {{ Form::label('Categorie') }}
        {{ Form::select('categorie',$lesCategories,'',['class'=>'form-control']) }}
    </div>
<button type="submit" class=" btn btn-primary center-block">Créer</button>
</div>
{!! Form::close() !!}
@stop
