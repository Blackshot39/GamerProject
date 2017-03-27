@extends ('layouts.admin')
@section ('content')


<h1 style="text-align: center;">Création d'une catégorie</h1>
<div class="well">
{!! Form::open(array('route' => 'categorie.store','class' => 'form-horizontal','files'=>true)) !!}

<div class="form-group">
      {!! Form::label('libelle', 'Libelle :',['class' => 'col-lg-2 control-label'])!!}
      <div class="col-lg-10">
          {!! Form::text('libelle','', ['placeholder' => 'libelle','class' => 'form-control'])!!}
      </div>
      
      
      @if ($errors->has('libelle'))               
      <div class="alert alert-danger">  
          <!--afficher les erreurs une par une-->
          @foreach ($errors->get('libelle') as $message)
          <ul>
               
          <li> {{ $message }}</li>
                
          </ul>
          @endforeach
          
      </div>
      @endif
</div>

<div class="form-group">
    
      {!! Form::label('tag','Tag :',['class' => 'col-lg-2 control-label'])!!}
      <div class="col-lg-10">
      {!! Form::text('tag','',['placeholder' => 'tag','class' => 'form-control', 'rows' => 3])!!}
      </div>
       @if ($errors->has('tag'))
       <div class="alert alert-danger">
            @foreach ($errors->get('tag') as $message)
           <ul>
               
                <li>{{ $message }}</li>
           </ul>
            @endforeach
       </div>
@endif
</div>
<button type="submit" class=" btn btn-primary center-block">Créer</button>
</div>
{!! Form::close() !!}

@stop


