@extends('layouts.admin')
@section('content')


<h1 class="page-header">Les types de jeu</h1>
    <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach ($lesTypeJeux as $typejeu)
                                         <tr> 
                                             
                                             <td>{{$typejeu["titre"]}}</td>                                                 
                                             
                                             <td> 
                                                 {{ Form::open(['route'=> ['typejeu.destroy',$typejeu["id"]], 'method' => 'delete']) }}
                                                    {{ Form::submit('Supprimer',['class'=>'btn btn-danger up']) }}
                                                  {{ Form::close() }}
                                                  <a href="{{route('typejeu.edit', $typejeu->id)}}"><button type="button" class="btn btn-success"><i class="fa fa-lg fa-pencil"></i></button></a>
                                             
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
