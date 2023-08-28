@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
    <form action="{{route('users.update',$user)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control text-uppercase" placeholder="Insert a name for the User" required autofocus autocomplete="name" value="{{ $user->name }}">
                    @error('name')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control text-uppercase" placeholder="Insert a email for the User" required autofocus autocomplete="email" value="{{ $user->email }}">
                    @error('email')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-6">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="INGRESE UNA CONTRASEÑA" autofocus autocomplete="password" required>
                    @error('password')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
                <div class="col-sm-6">
                    <label for="password" class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="REPITA LA CONTRASEÑA" autofocus autocomplete="password" required>
                    @error('password')
                        <span style="color: red;"> • {{ $message }} </span><br/>
                    @enderror
                </div>
            </div><br>
            <div class="col-sm-3 mt-auto">
                <button type="submit"><ion-icon name="checkmark-done-outline" class="btn-index"></ion-icon></button>
            </div>
        </div>
    </form>
@endsection