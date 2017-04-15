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
                                            
                                             @if(Auth::check())
                                             <th></th>
                                             @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($lesJeux as $jeu)
                                         <tr> 
                                             <td>
                                                 <div class="baguetteBoxFive gallery">
                                                    <a href="{{url('/').'/images/jeu/normal/'.$jeu->photo}}"><img src="{{url('/').'/images/jeu/mini/'.$jeu->photo}}" class="img-responsive"></a> 
                                                 </div>
                                             </td>
                                             <td><a href="{{route('jeu.showJeu',$jeu->id)}}">{{$jeu["nom"]}}<a/></td>                                                 
                                             <td>{{$jeu["description"]}}</td>
                                             <td>{{$jeu["dateSortie"]}}</td>
                                             <td>
                                                 @foreach ($jeu->typeJeus as $type)
                                                    
                                                    {{$type->titre}};
                                                    
                                                 @endforeach
                                             </td>
                                            @if(Auth::check())
                                             <td> 
                                                 <!--If pour si l'attach existe-->
                                            
                                           @if($jeu->users->contains(Auth::user()->id) == true)   
                                            
                                               {!! Form::open(['route' => ['jeu.retirer', $jeu->id], 'method' => 'put']) !!}
                                               {!! Form::submit('retirer',['class'=>'btn btn-warning']) !!} 
                                               {!! Form::close() !!}
                                            @else
                                               {!! Form::open(['route' => ['jeu.ajouter', $jeu->id], 'method' => 'put']) !!}
                                               {!! Form::submit('ajouter',['class'=>'btn btn-warning']) !!}
                                               {!! Form::close() !!}
                                            @endif
                                               <a href="{{route('jeu.showUser',$jeu->id)}}"><button type="button" class="btn btn-primary">Voir joueur</button></a>
                                              
                                            
                                             </td>
                                              @endif
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