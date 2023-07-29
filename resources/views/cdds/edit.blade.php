@extends('adminlte::page')

@section('title', 'Editar DataRoom')

@section('content_header')
    <h1>Edit DataRoom</h1>
@stop

@section('content')
    <form action="{{route('cdds.update',$cdd->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row">
                <div class="col-sm-3">
                    <label for="name" class="form-label">Name of DataRoom</label>
                    <input type="text" name="name" id="name" class="form-control text-uppercase" value="{{$cdd->name}}">
                </div>
                <input type="hidden" class="form-control text-uppercase" name="torre_id" value="{{$cdd->torre_id}}">
                <input type="hidden" class="form-control text-uppercase" name="floor_id" value="{{$cdd->floor_id}}">
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