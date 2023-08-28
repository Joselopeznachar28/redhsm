@extends('adminlte::page')

@section('title' , 'Buildings List')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Buildings</h1>
    <a href="{{route('torres.create')}}"><ion-icon name="add-circle-outline" class="btn-index"></ion-icon></a>
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
                            <button type="submit"><ion-icon name="trash-outline" class="btn-index"></ion-icon></button>
                        </form>
                        <a href="{{route('torres.edit', $torre->id)}}"><ion-icon name="create-outline" class="btn-index"></ion-icon></a>
                        <a href="{{route('floors.create', $torre->id)}}"><ion-icon name="layers-outline" class="btn-index"></ion-icon></a>
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection