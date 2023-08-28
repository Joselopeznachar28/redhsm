@extends('adminlte::page')

@section('title', 'Create Port')

@section('content_header')
    <h1>Create Port</h1>
@stop

@section('content')
    <form action="{{route('ports.update',$port)}}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="device_id" value="{{$port->device_id}}">
        <div class="form-group">
            <div class="row">
                <div class="col-sm-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Insert a Port Name" autofocus autocomplete="name" value="{{ $port->name }}">
                </div>
                <div class="col-sm-6">
                    <label for="mode" class="form-label">Mode</label>
                    <select name="mode" id="mode" class="form-control" required autofocus autocomplete="mode">
                        <option value="">-- Select an Option --</option>
                        <option value="Trunk">Trunk</option>
                        <option value="Access">Access</option>
                    </select>
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-6">
                    <label for="type" class="form-label">Type</label>
                    <select name="type" id="type" class="form-control" required autofocus autocomplete="type">
                        <option value="">-- Select an Option --</option>
                        <option value="Ethernet">Ethernet</option>
                        <option value="Fiber">Fiber</option>
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="number" class="form-label">Number</label>
                    <input type="number" min="1" max="60" step="1" name="number" id="number" class="form-control" placeholder="Insert a Number Port" required autofocus autocomplete="number" value="{{ $port->number }}">
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-6">
                    <label for="speed" class="form-label">Speed</label>
                    <input type="number" name="speed" id="speed" class="form-control" placeholder="Insert a Speed Port" required autofocus autocomplete="speed" value="{{ $port->speed }}">
                </div>
                <div class="col-sm-6">
                    <label for="vlan" class="form-label">Vlan</label>
                    <input type="text" name="vlan" id="vlan" class="form-control" placeholder="Insert a Vlan Port" autofocus autocomplete="vlan" value="{{ $port->vlan }}">
                </div>
            </div><br>
            <div class="row">
                <div class="col-sm-6 mt-auto">
                    <button type="submit"><ion-icon name="checkmark-done-outline" class="btn-index"></ion-icon></button>
                </div>
            </div>
        </div>
    </form>
@endsection