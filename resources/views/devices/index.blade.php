@extends('adminlte::page')

@section('title' , 'Devices List')

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
                            <button type="submit"><ion-icon name="trash-outline" class="btn-index"></button>
                        </form>
                        <a href="{{route('devices.edit', $device->id)}}"><ion-icon name="create-outline" class="btn-index"></ion-icon></a>
                        <a href="{{route('devices.show',$device)}}"><ion-icon name="information-circle-outline" class="btn-index"></ion-icon></a>
                        <a href="{{route('ports.create', $device->id)}}"><ion-icon name="duplicate-outline" class="btn-index"></ion-icon></a>
                        <a href="{{route('responses.create', $device)}}"><ion-icon name="warning-outline" class="btn-index"></ion-icon></a>
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection