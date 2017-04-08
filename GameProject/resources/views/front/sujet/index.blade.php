@extends('layouts.front')
@section('content')





	</header><!-- /.header -->
	
	
	
	<!-- page avec texte-->

	<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
			
				<h2 class="section-title">Forum</h2><!-- /.section-title -->
			</header><!-- /.section-head -->
			
                        <div class="section-body">
                                <div class="features">
                                        <div class="row">

                                            
                                            <a href="{{route('sujet.create')}}"><button type="button" class=" btn btn-primary btn-statut-sujet">Créer un sujet</button></a>
                                            
                                            
                                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>                                           
                                            <th>Jeux</th>
                                            
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                       

                                        @foreach ($lesSujets as $jeu)
                                        
                                        @if($jeu->sujets->count() > 0)
                                        <tr>
                                            <td><a href="{{route('sujet.sujetsUnJeu', $jeu->id)}}">{{$jeu->nom}}</a></td>
                                            <td>Dernière réponse le {{Carbon\Carbon::parse($jeu->sujets->last()->postes->last()->created_at)->format('d-m-Y h:i:s')}} par {{$jeu->sujets->last()->postes->last()->user->name}}</td>                                            
                                           
                                        </tr>
                                        @endif
                                        @endforeach



                                    </tbody>
                                </table>
    </div>   
                                            
                                          
                                     
            
    {{ $lesSujets->links() }}
                                                          
                                            
					</div><!-- /.row -->
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
	</section><!-- /.section section-features -->
        
        
        
        
        
        

        
        
@stop