@extends('adminlte::page')

@section('title', 'Create Device')

@section('content_header')
    <h1>Create Device</h1>
@stop

@section('content')
    <form action="{{route('devices.store')}}" method="post">
        @csrf
        <input type="hidden" name="cdd_id" value="{{$cdd->id}}">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="ip" class="form-label">Device IP</label>
                    <input type="text" name="ip" id="ip" class="form-control" placeholder="Insert a unique IP" autofocus autocomplete="ip">
                </div>
                <div class="col-sm-6">
                    <label for="mark" class="form-label">Mark</label>
                    <input type="text" name="mark" id="mark" class="form-control" placeholder="Insert a Mark" required autofocus autocomplete="mark">
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-6">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" name="model" id="model" class="form-control" placeholder="Insert a Model" required autofocus autocomplete="model">
                </div>
                <div class="col-sm-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Insert a Name" required autofocus autocomplete="name">
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-6">
                    <label for="user_admin" class="form-label">User Name</label>
                    <input type="text" name="user_admin" id="user_admin" class="form-control" placeholder="Insert a User Admin"  autofocus autocomplete="user_admin">
                </div>
                <div class="col-sm-6">
                    <label for="password_admin" class="form-label">Password Name</label>
                    <input type="text" name="password_admin" id="password_admin" class="form-control" placeholder="Insert a password admin" autofocus autocomplete="password_admin">
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-6">
                    <label for="type" class="form-label">Device Type</label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="">-- Select a Option --</option>
                        <option value="Manageable">Manageable</option>
                        <option value="Unmanageable">Unmanageable</option>
                    </select>
                </div>
                <div class="col-sm-6 mt-auto">
                    <button type="submit"><ion-icon name="checkmark-done-outline" class="btn-index"></ion-icon></button>
                </div>
            </div>
        </div>
    </form>
@endsection