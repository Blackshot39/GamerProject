@extends('layouts.admin')
@section('content') 

<div class="container">
    
    <div class="row">
        <h2 class="text-center text-uppercase"><u><em>Information sur le jeu: {{$unJeu->nom}}</em></u></h2><br>
        <div class="col-md-2">
            
        <div class="baguetteBoxFive gallery">
            <a href="{{url('/').'/images/jeu/normal/'.$unJeu->photo}}"><img src="{{url('/').'/images/jeu/mini/'.$unJeu->photo}}"> </a>
        </div>
            <div class="text-center">
                {{$unJeu->dateSortie}}
            </div>
        </div>
        
   
    
        <div class="col-md-10">
            <div class="well">
                <blockquote>
                    <p class="lead text-justify">{!! $unJeu->description !!}</p>
                
                <ul class="list-inline"> Les types : 
                 @foreach ($unJeu->typeJeus as $type)
                 <li><u>{{$type->titre}}</u></li>                                                     
                @endforeach
                </blockquote>
           </ul>
            </div>
            
            
           
           

            
        </div>
            
    </div>
</div>





@stop

