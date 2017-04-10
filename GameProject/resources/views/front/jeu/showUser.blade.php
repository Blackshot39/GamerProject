@extends ('layouts.front')
@section ('content')
</header>

<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
				<h2 class="section-title">Liste des joueurs jouant à {{$unJeu->nom}}</h2><!-- /.section-title -->
			</header><!-- /.section-head -->
                        <div class="section-body">
				<div class="features">
					<div class="row">
                                            <p>Seul les joueurs n'ayant pas désactiver ce jeu sont affiché.</p>
						<div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nom du joueur</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        @foreach ($lesUsers as $user)
                            @if($user->pivot->actif == true)
                            <tr>                           
                                <td> <a href="{{route('user.profilFront', $user->id)}}">{{$user->name}}</a></td>                                                 
                            </tr>
                            @endif
                            @endforeach 
                                </tbody>
                                </table>
</div>       
                                            </div><!-- /.row -->
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
</section><!-- /.section section-features -->
           <a href="{{url()->previous()}}"><button type="button" class="btn btn-primary center-block">Retour</button></a>

@stop


