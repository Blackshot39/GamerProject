@extends('layouts.admin')
@section('content')    
    <h2 class="page-header"> Liste des messages</h2>

    <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Description</th>
                                                                                       
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($lesMessages as $message)
                                         <tr> 
                                             
                                             <td>{{$message["titre"]}}</td>                                                 
                                             <td>{{$message["description"]}}</td>
                                             <td> 
                                                 {{ Form::open(['route'=> ['message.destroy',$message["id"]], 'method' => 'delete']) }}
                                                    {{ Form::submit('Supprimer',['class'=>'btn btn-danger up']) }}
                                                  {{ Form::close() }}
                                                  <a href="{{route('message.edit', $message->id)}}"><button type="button" class="btn btn-success"><i class="fa fa-lg fa-pencil"></i></button></a>
                                             
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

