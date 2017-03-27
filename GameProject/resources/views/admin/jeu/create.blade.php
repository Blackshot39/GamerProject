@extends ('layouts.admin')
@section ('content')


<h1 style="text-align: center;">Création d'un jeu</h1>
<div class="well">
{!! Form::open(array('route' => 'jeu.store','class' => 'form-horizontal','files'=>true)) !!}

<div class="form-group">
      {!! Form::label('nom', 'Nom :',['class' => 'col-lg-2 control-label'])!!}
      <div class="col-lg-10">
          {!! Form::text('nom','', ['placeholder' => 'nom','class' => 'form-control'])!!}
      </div>
      
      
      @if ($errors->has('nom'))               
      <div class="alert alert-danger">  
          <!--afficher les erreurs une par une-->
          @foreach ($errors->get('nom') as $message)
          <ul>
               
          <li> {{ $message }}</li>
                
          </ul>
          @endforeach
          
      </div>
      @endif
</div>

<div class="form-group">
    
      {!! Form::label('description','Description',['class' => 'col-lg-2 control-label'])!!}
      <div class="col-lg-10">
      {!! Form::textarea('description','',['placeholder' => 'description','class' => 'form-control', 'rows' => 3])!!}
      </div>
       @if ($errors->has('description'))
       <div class="alert alert-danger">
            @foreach ($errors->get('description') as $message)
           <ul>
               
                <li>{{ $message }}</li>
           </ul>
            @endforeach
       </div>
@endif
</div>

<div class="form-group">
    
    
      {!! Form::label('dateSortie','Date de sortie',['class' => 'col-lg-2 control-label'])!!}
      <div class="col-lg-10">
      {!! Form::date('dateSortie','\Carbon\Carbon::now()',['class' => 'form-control'])!!}
      </div>
       @if ($errors->has('dateSortie'))
       <div class="alert alert-danger">
            @foreach ($errors->get('dateSortie') as $message)
           <ul>
               
                <li>{{ $message }}</li>
           </ul>
            @endforeach
       </div>
@endif
</div>


<div class="form-group">
    
    
   
            <div class="col-lg-10">
            {!! Form::label('image', "Image du jeu",['class' => 'col-lg-2 control-label']) !!}
            {!! Form::file('image', array('class' => 'form-control')) !!}
            </div>
        </div>

<button type="submit" class=" btn btn-primary center-block">Créer</button>
</div>
{!! Form::close() !!}

@stop


