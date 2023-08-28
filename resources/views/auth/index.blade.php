@extends('adminlte::page')

@section('title' , 'Users List')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Users</h1>
    <a href="{{route('users.create')}}"><ion-icon name="add-circle-outline" class="btn-index"></ion-icon></a>
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
                <th>Email</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($users as $user)
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td class="d-flex justify-content-center">
                        <form action="{{route('users.destroy',$user)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><ion-icon name="trash-outline" class="btn-index"></ion-icon></button>
                        </form>
                        <a href="{{route('users.edit',$user)}}"><ion-icon name="create-outline" class="btn-index"></ion-icon></a>
                    </td>
                </tr>
                @php
                    $count++;        
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection