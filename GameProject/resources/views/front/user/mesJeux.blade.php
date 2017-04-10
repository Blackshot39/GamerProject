@extends('layouts.front')
@section('content')    

</header>

<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
				<h2 class="section-title">Mes jeux</h2><!-- /.section-title -->
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
                                            <th>Activité</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                         @foreach ($user->jeus as $jeu)
                                         <tr> 
                                             <td>
                                                 <div class="baguetteBoxFive gallery">
                                                    <a href="{{url('/').'/images/jeu/normal/'.$jeu->photo}}"><img src="{{url('/').'/images/jeu/mini/'.$jeu->photo}}" class="img-responsive"></a> 
                                                 </div>
                                             </td>
                                             <td><a href="{{route('jeu.showJeu',$jeu->id)}}">{{$jeu->nom}}</a></td>
                                              @if($jeu->pivot->actif == true)
                                             <td>Je joue encore à ce jeu</td>
                                             @else
                                             <td>Je ne joue plus à ce jeu</td>
                                              @endif
<!--                                             <td>btn retirer +btn je ne joue plus/je joue</td>-->
                                             <td>
                                                {!! Form::open(['route' => ['jeu.retirer', $jeu->id], 'method' => 'put']) !!}
                                                {!! Form::submit('Supprimer',['class'=>'btn btn-danger']) !!} 
                                                {!! Form::close() !!}
                                                
                                               
                                               {!! Form::open(['route' => ['jeu.activite', $jeu->id], 'method' => 'put']) !!}
                                                @if($jeu->pivot->actif == true)
                                               {!! Form::submit("Je n'y joue plus",['class'=>'btn btn-primary']) !!} 
                                                @else
                                                {!! Form::submit("J'y rejoue",['class'=>'btn btn-primary']) !!} 
                                                @endif
                                               {!! Form::close() !!}
                                               
                                                
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