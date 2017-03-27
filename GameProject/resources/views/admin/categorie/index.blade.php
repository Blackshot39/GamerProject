@extends('layouts.admin')
@section('content')


<h1 class="page-header">Les Categories</h1>
    <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Libelle</th>
                                            <th>Tag</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($lesCategories as $categorie)
                                         <tr> 
                                             
                                             <td>{{$categorie["libelle"]}}</td>                                                 
                                             <td>{{$categorie["tag"]}}</td>   
                                             <td> 
                                                 {{ Form::open(['route'=> ['categorie.destroy',$categorie["id"]], 'method' => 'delete']) }}
                                                    {{ Form::submit('Supprimer',['class'=>'btn btn-danger up']) }}
                                                  {{ Form::close() }}
                                                  <a href="{{route('categorie.edit', $categorie->id)}}"><button type="button" class="btn btn-success"><i class="fa fa-lg fa-pencil"></i></button></a>
                                             
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
