@extends ('layouts.front')
@section ('content')

</header>
<section class="section section-features" id="section-features">
		<div class="container">
			<header class="section-head">
				
			
				<h2 class="section-title">Modification du commentaire #{{$unCommentaire->id}}</h2><!-- /.section-title -->
			</header><!-- /.section-head -->
			
                        <div class="section-body">
                                <div class="features">
                                        <div class="row">
                                            <div class='info-poste'>
                                                Posté par {{$unCommentaire->user->name}}
                                                le {{$unCommentaire->created_at}}
                                                <br>
                                                Actualité: <a href="{{route('actualite.showFront', $unCommentaire->actualite->id)}}">{{$unCommentaire->actualite->titre}}</a>
                                                @if($unCommentaire->updated_at != null && $unCommentaire->updated_at != $unCommentaire->created_at)
                                                <br>
                                                    Dernière modification: {{$poste->updated_at}}
                                                @endif
                                            </div>

{!! Form::open(array('method' => 'PUT', 'route' => ['commentaire.update', $unCommentaire->id ], 'class' => 'form-horizontal')) !!}

<div class="form-group">
     
      <div class="col-lg-12">
          {!! Form::textarea('commentaire',$unCommentaire->description , ['placeholder' => 'titre','class' => 'form-control'])!!}
      </div>
</div>    
@if ($errors->has('commentaire'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('commentaire') as $message) 
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif
                       
                        
                        
                       
      
<button type="submit" class=" btn btn-primary center-block">Modifier</button>
</div>
{!! Form::close() !!}
</div><!-- /.row -->
				</div><!-- /.features -->
			</div><!-- /.section-body -->
		</div><!-- /.container -->
	</section><!-- /.section section-features -->
@stop


