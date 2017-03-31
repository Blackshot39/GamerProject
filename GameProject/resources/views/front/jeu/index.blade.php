@extends('layouts.front')
@section('content')    

</header>

<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
				<h2 class="section-title">List des jeux</h2><!-- /.section-title -->
			</header><!-- /.section-head -->
                        <div class="section-body">
				<div class="features">
					<div class="row">
						<div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Description</th>
                                            <th>Date de sortie</th>
                                            <th>Photo</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($lesJeux as $jeu)
                                         <tr> 
                                             
                                             <td>{{$jeu["nom"]}}</td>                                                 
                                             <td>{{$jeu["description"]}}</td>
                                             <td>{{$jeu["dateSortie"]}}</td>
                                             <td><img src="{{url('/').'/images/jeu/mini/'.$jeu->photo}}"> </td>
                                             <td> 
                                                
                                                  <a href="#"><button type="button" class="btn btn-primary"><i class="fa fa-lg fa-plus"></i></button></a>
                                             
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