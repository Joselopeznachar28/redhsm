@extends('adminlte::page')

@section('tittle' , 'Listado de Pisos')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Floor</h1>
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
                <th>Building</th>
                <th>Floors</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($floors as $floor)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$floor->torre->name}}</td>
                    <td>{{$floor->name}}</td>
                    <td class="d-flex justify-content-center">
                        <form action="{{route('floors.destroy', $floor->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                        <a href="{{route('cdds.create', [$floor->torre, $floor])}}" class="btn btn-outline-warning">Add DataRoom</a>
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection