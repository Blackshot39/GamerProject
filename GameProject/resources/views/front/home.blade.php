@extends('layouts.front')
@section('content')


<div class="jumbotron"> <!-- truc d'accueil -->
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="jumbotron-content">
							<h1>Site web consacrée au jeux vidéo</h1>
							
							<h5>Partagez et jouez ensemble</h5>
							
							<p>Ainsi que la possibilité de trouver des amis. </p>
													

						</div><!-- /.jumbotron-content -->
					</div><!-- /.col-md-6 -->
					
					<div class="col-md-6">
						
							<img src="images/site/img2.jpg" width="700" alt="" class="img-responsive">
						<!-- /.jumbotron-image -->
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.jumbotron -->
	</header><!-- /.header -->
	
	
	
	<!-- page avec texte-->

	<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
			
				<h2 class="section-title">Dernières actualités</h2><!-- /.section-title -->
			</header><!-- /.section-head -->
			
			<div class="section-body">
				<div class="features">
					<div class="row">
						
                                                <div class="container">
                         
                        
					</div><!-- /.row -->
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
	</section><!-- /.section section-features -->
        
        
        
 	<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
			
				<h2 class="section-title">Dernier sujet</h2><!-- /.section-title -->
			</header><!-- /.section-head -->
			
			<div class="section-body">
				<div class="features">
					<div class="row">					
                                                <div class="container">
                         
                         @foreach ($lesSujets as $sujet)
<div class="col-md-4 col-sm-4">

        <p><hcom>Titre : </hcom>
        <hblanc>{{ $sujet->titre }}</hblanc></p>

        

</div>
   
@endforeach
</div>                                               
                                            
                                            
                                            
					</div><!-- /.row -->
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
	</section><!-- /.section section-features -->       

        
@stop
