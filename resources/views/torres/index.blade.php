@extends('adminlte::page')

@section('tittle' , 'Listado de Torres')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Buildings</h1>
    <a href="{{route('torres.create')}}" class="btn btn-outline-success">Add</a>
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
                <th>Name</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($torres as $torre)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$torre->name}}</td>
                    <td class="d-flex justify-content-center">
                        <form action="{{route('torres.destroy', $torre->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                        </form>
                        <a href="{{route('torres.edit', $torre->id)}}" class="btn btn-outline-warning">Edit</a>
                        <a href="{{route('floors.create', $torre->id)}}" class="btn btn-outline-warning">Add Floors</a>
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection