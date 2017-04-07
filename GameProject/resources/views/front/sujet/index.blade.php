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

                                            
                                            <a href="{{route('sujet.create')}}">Creer</a>
                                            
                                            
                                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>                                           
                                            <th>Jeu</th>
                                            <th>Par</th>
                                            <th>Ajoutée le</th>
                                            <th>Dernière réponse</th> <!-- date + user -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lesSujets as $sujet)
                                        <tr>
                                            <td>{{$sujet->titre}}</td>
                                            <td>{{$sujet->postes->users->first()}}</td>
                                            <td>{{Carbon\Carbon::parse($sujet->created_at)->format('d-m-Y h:i:s')}}</td>                                            
                                            
                                            <td>Par </td>
                                            
                                            <td></td>
                                            
                                            <td>
                                               <a href="#"><button type="button" class="btn btn-primary">Fermer</button></a>
                                                 
                                            </td>
                                        </tr>
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