@extends('adminlte::page')

@section('tittle' , 'Ports of Index')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Ports</h1>
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
                <th>Mode</th>
                <th>Type</th>
                <th>Port</th>
                <th>Name</th>
                <th>speed</th>
                <th>Vlan</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($ports as $port)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$port->mode}}</td>
                    <td>{{$port->type}}</td>
                    <td>{{$port->number}}</td>
                    <td>{{$port->name}}</td>
                    <td>{{$port->speed}}</td>
                    <td>{{$port->vlan}}</td>
                    <td class="d-flex justify-content-center">
                        <form action="{{route('ports.destroy', $port->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                        <a href="{{route('ports.edit', $port->id)}}" class="btn btn-outline-warning">Edit</a>
                        <a href="#" class="btn btn-outline-info">Details</a>
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection