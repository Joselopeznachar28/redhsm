@extends('adminlte::page')

@section('title' , 'Incidences List')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Incidences</h1>
    <a href="{{route('incidences.create')}}"><ion-icon name="add-circle-outline" class="btn-index"></ion-icon></a>
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
                <th>Incidence</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($incidences as $incidence)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$incidence->incidence}}</td>
                    <td class="d-flex justify-content-center">
                        <form action="{{route('incidences.destroy', $incidence)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><ion-icon name="trash-outline" class="btn-index"></ion-icon></button>
                        </form>
                        <a href="{{route('incidences.edit', $incidence)}}"><ion-icon name="create-outline" class="btn-index"></ion-icon></a>
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection