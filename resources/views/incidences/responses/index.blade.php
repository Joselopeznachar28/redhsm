@extends('adminlte::page')

@section('title' , 'Responses List')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Responses To Incidences</h1>
</div>    

@stop

    @php
        $count = 1;        
    @endphp
    
@section('content')
    <table class="table table-striped">
        <thead class="text-center">
            <tr>
                <th>#</th>
                <th>DataRoom</th>
                <th>Device</th>
                <th>Incidence</th>
                <th>Response</th>
                <th>Done</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($responses as $response)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$response->device->cdd->name}}</td>
                    <td>{{$response->device->name}}</td>
                    <td>{{$response->incidence->incidence}}</td>
                    <td>{{$response->response}}</td>
                    <td class="text-center">
                        <div class="form-chex form-switch">
                            <input type="checkbox" data-id="{{$response->id}} "class="toggle-class form-check-input" data-toggle="toggle" data-on="Enviado" data-off="Enviar" data-style="slow" {{$response->done == True ? 'checked' : ''}}>
                        </div>
                    </td>
                    <td class="d-flex justify-content-center">
                        <form action="{{route('responses.destroy', $response)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><ion-icon name="trash-outline" class="btn-index"></ion-icon></button>
                        </form>
                        <a href="{{route('responses.edit', $response)}}"><ion-icon name="create-outline" class="btn-index"></ion-icon></a>
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection
@section('adminlte_js')
    
    <script>
        $('.toggle-class').on('change', function () {
            var done = $(this).prop('checked') == true ? 1 : 0;
            var response_id = $(this).data('id');
            $.ajax({
                type : 'GET',
                dataType : 'JSON',
                url : '{{route('responses.done')}}',
                data : {
                    'done' : done,
                    'response_id' : response_id,
                },
                success:function(data) {
                    console.log('The problem have done!');
                }
            });
        });
    </script>
@endsection