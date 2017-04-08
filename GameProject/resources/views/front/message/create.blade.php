@extends ('layouts.front')
@section ('content')
</header>

<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
				<h2 class="section-title">Ecrire un message à {{$destinataire->name}}</h2><!-- /.section-title -->
			</header><!-- /.section-head -->
                        <div class="section-body">
				<div class="features">
					<div class="row">
						
                                            
                                              <div class="col-lg-12">
        <div class="panel panel-default">
                        <div class="panel-heading"> Message à {{$destinataire->name}}</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    

                        {!! Form::open(array('route' => ['message.storeFront', $destinataire->id])) !!}
                         <div class="form-group">
                        {!! Form::label('titre', 'Titre') !!}
                        {!! Form::text('titre', null,['class'=>'form-control', 'required' => 'required']) !!}
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
                        {!! Form::label('description', 'Message') !!}
                        {!! Form::textarea('description', null, ['class'=>'form-control', 'required' => 'required']) !!}
                         </div>
                         @if ($errors->has('description'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('description') as $message) 
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif
                         
                        
                        
                       
                        
                        <button type="submit" class="btn btn-primary col-lg-12"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>
                     
                        {!! Form::close() !!}
                        </div>                      
                            </div>
                        </div>
                    </div>
    </div>
    
                                            
                                            </div><!-- /.row -->
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
</section><!-- /.section section-features -->








  
    
    
    
    
    


@stop