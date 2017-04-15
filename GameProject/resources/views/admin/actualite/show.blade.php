@extends('layouts.admin')
@section('content') 

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h2 class="text-center text-uppercase"><u><em>{{$uneActualite->titre}}</em></u></h2><br>
        </div>
        <div class="col-md-12">
            <div class="well">
                <blockquote>
                    <p class="lead text-justify">{!! $uneActualite->description !!}</p>
                
                    <p>Categorie : {{$uneActualite->categorie->libelle}}  </p>
                    <p>Créer : {{$uneActualite->created_at}}</p>
                
                                                                 
        
                </blockquote>
           </ul>
            </div>  
        </div>
    </div>
</div>
@stop

