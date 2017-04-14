@extends ('layouts.front')
@section ('content')
</header>

<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
				<h2 class="section-title">Information sur {{$unJeu->nom}}</h2>
                                <!-- /.section-title -->
                                <div class="baguetteBoxFive gallery">
                                                    <a href="{{url('/').'/images/jeu/normal/'.$unJeu->photo}}"><img src="{{url('/').'/images/jeu/mini/'.$unJeu->photo}}" class="img-responsive"></a> 
                                </div>
			</header><!-- /.section-head -->
                        <div class="section-body">
				<div class="features">
					<div class="row">
                                           Type du jeu : 
                                      @foreach ($unJeu->typeJeus as $type)
                                                    {{$type->titre}};     
                                      @endforeach <br/>
                                     Date de sortie : {{$unJeu["dateSortie"]}}<br/>
                                     Description : <br/>
                                  
                                     
                                     <div class="col-md-12 col-sm-12">
                                        <div class="panel panel-default">
                                        <div class=" panel-body text-justify">    
                                      {{$unJeu["description"]}}
                                        </div>
                                        </div>
                                     </div>
                                        </div><!-- /.row -->
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
</section><!-- /.section section-features -->
@stop