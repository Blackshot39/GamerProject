@extends('layouts.front')
@section('content')


<div class="jumbotron"> <!-- truc d'accueil -->
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="jumbotron-content">
							<h5>Site web consacrée au jeux vidéo</h5>
							
							<h1>Toutes les news sur les jeux vidéo</h1>
							
							<p>Ainsi que la possibilité de trouver des amis de la meme plateforme pour jouer ensemble. </p>
													

						</div><!-- /.jumbotron-content -->
					</div><!-- /.col-md-6 -->
					
					<div class="col-md-6">
						
							<img src="images/site/img2.jpg" height="450" width="450" alt="">
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
				
			
				<h2 class="section-title">Dernier actualiter</h2><!-- /.section-title -->
			</header><!-- /.section-head -->
			
			<div class="section-body">
				<div class="features">
					<div class="row">
						
                                                <div class="container">
                         
                         @foreach ($lesActualites as $actualite)
    @if ($actualite->id == 1)
<div class="col-md-4 col-sm-4">

        <p><hcom>Titre : </hcom>
        <hblanc>{{ $actualite->titre }}</hblanc></p>
        <p><hcom>Description : </hcom>
        <hblanc>{{ $actualite->description}}</hblanc></p>
        <p><hcom>Date : </hcom>
        <hblanc>{{ $actualite->date }}</hblanc></p>
        <p><hcom>Categorie : </hcom>
        <hblanc>{{ $actualite->categorie }}</hblanc></p>
        

</div>
    @endif


    @if ($actualite>id == 2)
<div class="col-md-4 col-sm-4">

        <p><hcom>Titre : </hcom>
        <hblanc>{{ $actualite->titre }}</hblanc></p>
        <p><hcom>Description : </hcom>
        <hblanc>{{ $actualite->description}}</hblanc></p>
        <p><hcom>Date : </hcom>
        <hblanc>{{ $actualite->date }}</hblanc></p>
        <p><hcom>Categorie : </hcom>
        <hblanc>{{ $actualite->categorie }}</hblanc></p>
        

</div>
    @endif
                       
        @if ($actualite->id == 3)
<div class="col-md-4 col-sm-4">

        <p><hcom>Titre : </hcom>
        <hblanc>{{ $actualite->titre }}</hblanc></p>
        <p><hcom>Description : </hcom>
        <hblanc>{{ $actualite->description}}</hblanc></p>
        <p><hcom>Date : </hcom>
        <hblanc>{{ $actualite->date }}</hblanc></p>
        <p><hcom>Categorie : </hcom>
        <hblanc>{{ $actualite->categorie }}</hblanc></p>
        

</div>
    @endif

@endforeach
</div>                          
                                            
                                            
                                            {{$lesActualites->links()}}
					</div><!-- /.row -->
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
	</section><!-- /.section section-features -->
        
        
        
        
        
        
@stop