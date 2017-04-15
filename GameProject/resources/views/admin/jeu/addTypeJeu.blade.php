@extends ('layouts.admin')
@section ('content')
<h2> ajouter type au jeu : {{$unJeu->nom}}</h2>

{!! Form::open(['method'=>'put','route' => ['jeu.storeTypeJeu', $unJeu->id ]]) !!}
<div class="form-group">
         {!! Form::label('titre','titre')!!}
      {!! Form::select('typeJeu',$lesTypes->pluck('titre','id'), null, array('class' => 'form-control'))!!}
</div>
<button type="submit" class=" btn btn-primary center-block">ajouter</button>
{!! Form::close() !!}

@stop