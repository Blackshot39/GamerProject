@extends ('layouts.admin')
@section ('content')


<h1 style="text-align: center;">Création d'une news</h1>
<div class="well">
{!! Form::open(array('route' => 'actualite.store','class' => 'form-horizontal')) !!}

<div class="form-group">
      {!! Form::label('titre', 'Titre :',['class' => 'col-lg-2 control-label'])!!}
      <div class="col-lg-10">
          {!! Form::text('titre','', ['placeholder' => 'titre','class' => 'form-control'])!!}
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
          {!! Form::text('description','', ['placeholder' => 'titre','class' => 'form-control'])!!}
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
        {{ Form::select('lesCategories',$lesCategories,'',['class'=>'form-control']) }}
    </div>
<button type="submit" class=" btn btn-primary center-block">Créer</button>
</div>
{!! Form::close() !!}

@stop


