@extends('adminlte::page')

@section('title', 'Edit Building')

@section('content_header')
    <h1>Edit Building</h1>
@stop

@section('content')
    <form action="{{route('torres.update',$torre->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row justify-content-center">
                <div class="col-sm-9">
                    <label for="name" class="form-label">Name of Building</label>
                    <input type="text" name="name" id="name" class="form-control text-uppercase" value="{{$torre->name}}" required autofocus autocomplete="name">
                </div>
                <div class="col-sm-3 mt-auto">
                    <button type="submit"><ion-icon name="checkmark-done-outline" class="btn-index"></ion-icon></button>
                </div>
            </div>
        </div>
    </form>
@endsection