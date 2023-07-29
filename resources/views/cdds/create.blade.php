@extends('adminlte::page')

@section('title', 'Crear DataRoom')

@section('content_header')
    <h1>Create DataRoom</h1>
@stop

@section('content')
    <form action="{{route('cdds.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3">
                    <label for="name" class="form-label text-uppercase">Name of DataRoom</label>
                    <input type="text" name="name" id="name" class="form-control text-uppercase" placeholder="Insert a name" required autofocus autocomplete="name">
                </div>
                <input type="hidden" class="form-control text-uppercase" name="torre_id" value="{{$torre->id}}">
                <input type="hidden" class="form-control text-uppercase" name="floor_id" value="{{$floor->id}}">
                <div class="col-sm-3 mt-auto">
                    <input type="submit" value="{{ __('Save')}}" class="btn btn-outline-primary">
                </div>
            </div>
        </div>
    </form>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop