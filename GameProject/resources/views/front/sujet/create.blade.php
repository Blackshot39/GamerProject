@extends ('layouts.front')
@section ('content')

</header>
<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
			
				<h2 class="section-title">Ajout d'un sujet</h2><!-- /.section-title -->
			</header><!-- /.section-head -->
			
                        <div class="section-body">
                                <div class="features">
                                        <div class="row">
                                            

{!! Form::open(array('route' => 'sujet.store','class' => 'form-horizontal','files'=>true)) !!}

<div class="form-group">
      {!! Form::label('titre', 'Titre :',['class' => 'col-lg-2 control-label'])!!}
      <div class="col-lg-10">
          {!! Form::text('titre',null, ['placeholder' => 'titre','class' => 'form-control'])!!}
      </div>
</div>    
@if ($errors->has('titre'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('titre') as $message) 
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif
                       
                        
                        
                        <div class="form-group">
                             {!! Form::label('jeu', 'Jeu :',['class' => 'col-lg-2 control-label'])!!}
                            <div class="col-lg-10">
                        {!! Form::select('jeu',$lesJeux, null, ['class' => 'form-control'])!!}
                        </div>
                      </div>
                        
                        
      <div class="form-group">
      {!! Form::label('desc', 'Message :',['class' => 'col-lg-2 control-label'])!!}
      <div class="col-lg-10">
          {!! Form::textarea('desc',null, ['placeholder' => 'Votre message...','class' => 'form-control'])!!}
      </div>
      </div>
                        @if ($errors->has('desc'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('desc') as $message) 
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif
      
      
      
<button type="submit" class=" btn btn-primary center-block">Créer</button>
</div>
{!! Form::close() !!}
</div><!-- /.row -->
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
	</section><!-- /.section section-features -->
@stop


