@extends('adminlte::page')

@section('tittle' , 'Listado de Pisos')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Devices</h1>
</div>    

@stop

    @php
        $count = 1;        
    @endphp
    
@section('content')
    <table class="table table-striped">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>IP</th>
                <th>Name</th>
                <th>Mark</th>
                <th>Model</th>
                <th>Type</th>
                <th>User Admin</th>
                <th>Password Admin</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($devices as $device)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$device->ip}}</td>
                    <td>{{$device->name}}</td>
                    <td>{{$device->mark}}</td>
                    <td>{{$device->model}}</td>
                    <td>{{$device->type}}</td>
                    <td>{{$device->user_admin}}</td>
                    <td>{{$device->password_admin}}</td>
                    <td class="d-flex justify-content-center">
                        <form action="{{route('devices.destroy', $device->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                        <a href="{{route('devices.edit', $device->id)}}" class="btn btn-outline-warning">Edit</a>
                        <a href="{{route('devices.show',$device)}}" class="btn btn-outline-info">Details</a>
                        <a href="{{route('ports.create', $device->id)}}" class="btn btn-outline-success">Add Ports</a>
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection