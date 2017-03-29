@extends('layouts.admin')
@section('content')


<h1 class="page-header">Editer une catégorie</h1>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">

                        {!! Form::open(array('method' => 'PUT', 'route' => ['categorie.update', $uneCategorie->id])) !!}
                        <div class="form-group">
                        {!! Form::label('libelle', 'Libelle') !!}
                        {!! Form::text('libelle', $uneCategorie->libelle,['class'=>'form-control', 'required' => 'required']) !!}
                        </div>      
                         @if ($errors->has('libelle'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('libelle') as $message) 
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif

                         <div class="form-group">
                        {!! Form::label('tag', 'Tag') !!}
                        {!! Form::text('tag', $uneCategorie->tag, ['class'=>'form-control', 'required' => 'required']) !!}
                         </div>
                          @if ($errors->has('tag'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                        @foreach ($errors->get('tag') as $message) 
                            <li>{{$message}}</li>
                        @endforeach
                        </ul>
                        </div>
                        @endif
                        
                        

                        <button type="submit" class="btn btn-primary col-lg-12"><span class="fa fa-check" aria-hidden="true"></span></button>
                        {!! Form::close() !!}
                                </div>
                            </div>
    </div>
                                
    
    
    
    
    
    


@stop