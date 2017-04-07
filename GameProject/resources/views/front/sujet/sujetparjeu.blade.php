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
                                            <th>Titre</th>
                                            
                                            <th>Ajoutée le</th>
                                            <th>Dernière réponse</th> <!-- date + user -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lesSujets as $sujet)
                                        <tr>
                                            <td><a href="{{route('sujet.show', $sujet->id)}}">{{$sujet->titre}}</a></td>
                                            <td>{{Carbon\Carbon::parse($sujet->created_at)->format('d-m-Y h:i:s')}} par {{$sujet->postes->first()->user->name}}</td>
                                            <td>{{Carbon\Carbon::parse($sujet->postes->last()->created_at)->format('d-m-Y h:i:s')}} par {{$sujet->postes->last()->user->name}}</td>                                            
                                            
                                                                                        
                                            <td>
                                                @if(Auth::user()->statut == "Admin" || Auth::user()->statut == "Moderateur")
                                                    @if($sujet->ferme == false)
                                                
                                                        {!! Form::open(['route' => ['sujet.fermer', $sujet->id], 'method' => 'put']) !!}
                                                           <button type="submit" class=" btn btn-primary btn-statut-sujet">Fermer le sujet</button>
                                                       {!! Form::close() !!}   
                                                    @else
                                                    
                                                        {!! Form::open(['route' => ['sujet.ouvrir', $sujet->id], 'method' => 'put']) !!}
                                                            <button type="submit" class=" btn btn-primary btn-statut-sujet">Ouvrir le sujet</button>
                                                        {!! Form::close() !!} 
                                                    @endif
                                            @endif
                                               
                                                
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