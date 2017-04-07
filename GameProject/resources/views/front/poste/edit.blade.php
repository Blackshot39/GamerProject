@extends ('layouts.front')
@section ('content')

</header>
<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
			
				<h2 class="section-title">Modification du poste #{{$poste->id}}</h2><!-- /.section-title -->
			</header><!-- /.section-head -->
			
                        <div class="section-body">
                                <div class="features">
                                        <div class="row">
                                            <div class='info-poste'>
                                                Posté par {{$poste->user->name}}
                                                le {{$poste->created_at}}
                                                @if($poste->updated_at != null && $poste->updated_at != $poste->created_at)
                                                <br>
                                                    Dernière modification: {{$poste->updated_at}}
                                                @endif
                                            </div>

{!! Form::open(array('method' => 'PUT', 'route' => ['poste.update', $poste->id ], 'class' => 'form-horizontal')) !!}

<div class="form-group">
      {!! Form::label('desc', 'Message :',['class' => 'col-lg-2 control-label'])!!}
      <div class="col-lg-10">
          {!! Form::textarea('desc',$poste->description , ['placeholder' => 'titre','class' => 'form-control'])!!}
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
                       
                        
                        
                       
      
<button type="submit" class=" btn btn-primary center-block">Modifier</button>
</div>
{!! Form::close() !!}
</div><!-- /.row -->
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
	</section><!-- /.section section-features -->
@stop


