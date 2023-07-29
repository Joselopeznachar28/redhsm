@extends('adminlte::page')

@section('tittle' , 'Listado de Pisos')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>DataRoom</h1>
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
                <th>DataRoom</th>
                <th>Building</th>
                <th>Floor</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($cdds as $cdd)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$cdd->name}}</td>
                    <td>{{$cdd->torre->name}}</td>
                    <td>{{$cdd->floor->name}}</td>
                    <td class="d-flex justify-content-center">
                        <form action="{{route('cdds.destroy', $cdd->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                        <a href="{{route('cdds.edit', $cdd->id)}}" class="btn btn-outline-warning">Edit</a>
                        <a href="{{route('devices.create', $cdd)}}" class="btn btn-outline-warning">Add Device</a>
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection