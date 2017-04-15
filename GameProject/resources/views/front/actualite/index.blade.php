@extends('layouts.front')
@section('content')





	</header><!-- /.header -->
	
	
	
	<!-- page avec texte-->

	<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
			
				<h2 class="section-title">Actualités</h2><!-- /.section-title -->
			</header><!-- /.section-head -->
			
                        <div class="section-body">
                                <div class="features">
                                        <div class="row">

                                            
                                            

                                        @foreach ($lesActus as $uneActu)
                                        
                                        <div class="bloc-actu col-xs-12 col-md-12 col-lg-12">
                                                
                                           <h3 class='titre-actu'> <a href="{{route('actualite.showFront', $uneActu->id)}}">{{$uneActu->titre}}</a></h3>
                                                    <div class="date-actu">{{$uneActu->created_at}} par <a href="{{route('user.profilFront', $uneActu->user->id)}}">{{$uneActu->user->name}}</a></div>
                                                    <div class="categorie-actu">{{$uneActu->categorie->libelle}}</div>
                                                    @if($uneActu->commentaires->count() > 1)
                                                    <div class="nb-commentaire-actu">{{$uneActu->commentaires->count()}} commentaires</div>
                                                    @else
                                                    <div class="nb-commentaire-actu">{{$uneActu->commentaires->count()}} commentaire</div>
                                                    @endif
                                               
								
                                            </div><!-- /.actu -->
                                         
                                             
                                               
								
                                          
                                        
                                         
                                       
                                        @endforeach
                                            
                                      
                                  {{$lesActus->links()}}      
                                            

                                    </tbody>
                                </table>
    </div>   
                                            
                                          
                                     
            
    
                                                          
                                            
					</div><!-- /.row -->
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
	</section><!-- /.section section-features -->
        
        
        
        
        
        

        
        
@stop