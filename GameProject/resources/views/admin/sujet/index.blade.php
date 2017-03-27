@extends('layouts.admin')
@section('content')


<h1 class="page-header">Liste des sujets</h1>
    <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                          
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($lesSujets as $sujet)
                                         <tr> 
                                             
                                             <td>{{$sujet["titre"]}}</td>                                                 
                                             
                                             <td> 
                                                 {{ Form::open(['route'=> ['sujet.destroy',$sujet["id"]], 'method' => 'delete']) }}
                                                    {{ Form::submit('Supprimer',['class'=>'btn btn-danger up']) }}
                                                  {{ Form::close() }}
                                                  <a href="{{route('sujet.edit', $sujet->id)}}"><button type="button" class="btn btn-success"><i class="fa fa-lg fa-pencil"></i></button></a>
                                             
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
