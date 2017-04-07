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
                                    

                        {!! Form::open(array('route' => ['user.store'])) !!}
                         <div class="form-group">
                        {!! Form::label('objet', 'Objet') !!}
                        {!! Form::text('objet', null,['class'=>'form-control', 'required' => 'required']) !!}
                        </div>                        
                        @if ($errors->has('objet'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('objet') as $message) 
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif

                         <div class="form-group">
                        {!! Form::label('message', 'Message') !!}
                        {!! Form::textarea('message', null, ['class'=>'form-control', 'required' => 'required']) !!}
                         </div>
                         @if ($errors->has('message'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('message') as $message) 
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