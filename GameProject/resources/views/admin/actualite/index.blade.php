@extends('layouts.admin')
@section('content')


<h1 class="page-header">Les Actualites</h1>
<div class="row show-grid" style='text-align: center'>
    {{ Form::open(['route' => 'actualite.create', 'method' => 'get'])}}
        {{ Form::submit('Laisser une actualiter',['class'=>'btn btn-primary']) }}
    {{ Form::close() }}              
</div>
    <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Catégorie</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($lesActualites as $actualite)
                                         <tr> 
                                             
                                             <td>{{$actualite["titre"]}}</td>
                                             <td>{{$actualite["description"]}}</td>
                                             <td>{{$actualite["date"]}}</td>
                                             <td>{{$actualite["categorie"]}}</td>
                                             
                                             
                                             <td> 
                                                 {{ Form::open(['route'=> ['actualite.destroy',$actualite["id"]], 'method' => 'delete']) }}
                                                    {{ Form::submit('Supprimer',['class'=>'btn btn-danger up']) }}
                                                  {{ Form::close() }}
                                                  <button type="button" class="btn btn-success"><i class="fa fa-lg fa-pencil"></i></button>
                                             
                                             </td>
                                         </tr>
                                            @endforeach   
                                    
                                    </tbody>
                                </table>
        
    </div>
    </div>
    @if (Session::has('sucess'))
    {{Session::get('success')}}
    @endif
</html>                         
@stop
