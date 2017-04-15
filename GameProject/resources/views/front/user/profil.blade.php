@extends('layouts.front')
@section('content')





</header><!-- /.header -->
	
	
	
	<!-- page avec texte-->

	<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
                            <h1>{{$unUser->name}}</h1>
                                
				<h5 class="section-title">{{$unUser->statut}}</h5><!-- /.section-title -->
                               
			</header><!-- /.section-head -->
			
                        <div class="section-body">
                                <div class="features">
                                        <div class="row">
                                            
                                            ville si existe
                                            avatar
                                            connecte
                                            bann
                                            
                                            <a href="{{route('message.createFront',$unUser->id)}}"><button type="button" class="btn btn-primary center-block">Envoyer message</button></a>
                                            
                                            
                                            
                                            
                                        </div> <!-- /.row -->
					
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
	</section><!-- /.section section-features -->
        


@stop