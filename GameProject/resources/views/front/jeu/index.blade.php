@extends('layouts.front')
@section('content')    

</header>

<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
				<h2 class="section-title">Liste des jeux</h2><!-- /.section-title -->
			</header><!-- /.section-head -->
                        <div class="section-body">
				<div class="features">
					<div class="row">
						<div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nom</th>
                                            <th>Description</th>
                                            <th>Date de sortie</th>
                                            
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($lesJeux as $jeu)
                                         <tr> 
                                             <td><img src="{{url('/').'/images/jeu/mini/'.$jeu->photo}}"> </td>
                                             <td>{{$jeu["nom"]}}</td>                                                 
                                             <td>{{$jeu["description"]}}</td>
                                             <td>{{$jeu["dateSortie"]}}</td>
                                            
                                             <td> 
                                                 <!--If pour si l'attach existe-->
                                             
                                               
                                             
                                               {!! Form::open(['route' => ['jeu.retirer', $jeu->id], 'method' => 'put']) !!}
                                               {!! Form::submit('retirer',['class'=>'btn btn-warning']) !!} 
                                               {!! Form::close() !!}
                                              
                                               {!! Form::open(['route' => ['jeu.ajouter', $jeu->id], 'method' => 'put']) !!}
                                               {!! Form::submit('ajouter',['class'=>'btn btn-warning']) !!}
                                               {!! Form::close() !!}
                                              
                                               <a href="{{route('jeu.showUser',$jeu->id)}}"><button type="button" class="btn btn-success">Voir joueur</button></a>
                                               <a href="{{route('jeu.showJeu',$jeu->id)}}"><button type="button" class="btn btn-primary">Voir plus</button></a>
                                             
                                             </td>
                                         </tr>
                                            @endforeach   
                                    
                                    </tbody>
                                </table>
        
    </div>
					</div><!-- /.row -->
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
</section><!-- /.section section-features -->
@stop