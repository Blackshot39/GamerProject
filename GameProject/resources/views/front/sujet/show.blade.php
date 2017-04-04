@extends('layouts.front')
@section('content')





	</header><!-- /.header -->
	
	
	
	<!-- page avec texte-->

	<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
			
				<h2 class="section-title">{{$unSujet->titre}}</h2><!-- /.section-title -->
			</header><!-- /.section-head -->
			
                        <div class="section-body">
                                <div class="features">
                                        <div class="row">

                                            <div class="col-md-12 col-sm-12">
							<div class="plan">
								<div class="plan-head">
									<h3 class="plan-title">Quel sont les meilleur citation du jeu ?</h3><!-- /.plan-title -->
									Par Requetor le 31/03/2017 10h50
								</div><!-- /.plan-head -->
								Dernier message par Blackshot39 le 31/03/2017 11h14
                                                                <br>
                                                                37 réponses
								
							</div><!-- /.plan -->
						</div><!-- /.col-md-3 col-sm-6 -->
                                           
                                        <!--foreach ($unSujet->postes as $poste)-->
<!--                                        <div class="well"> 
                                            <div class="bloc-user">
                                                $poste->users()->name}}
                                                <img src="$poste->users()->avatar">
                                                Nombre de messages : xxx
                                            </div>
                                            <div class="message-poste">
                                                Salut tout le monde
                                                comment
                                                ca
                                                va
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="well"> dd($poste)}}
                                            <div class="bloc-user">
                                                $poste->users()->name}}
                                                <img src="$poste->users()->avatar">
                                                Nombre de messages : xxx
                                            </div>
                                        </div>
                                        
                                        <div class="well"> dd($poste)}}
                                            <div class="bloc-user">
                                                $poste->users()->name}}
                                                <img src="$poste->users()->avatar">
                                                Nombre de messages : xxx
                                            </div>
                                        </div>-->
                                          
                                            
                                           
                                        <!--endforeach
                                   
    
    {{ $lesPostes->links() -->
                                                          
                                            
					</div><!-- /.row -->
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
	</section><!-- /.section section-features -->
        
        
        
        
        
        

        
        
@stop