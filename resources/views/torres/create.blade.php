@extends('adminlte::page')

@section('title', 'Create Building')

@section('content_header')
    <h1>Create Building</h1>
@stop

@section('content')
    <form action="{{route('torres.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="row justify-content-center">
                <div class="col-sm-9">
                    <label for="name" class="form-label">Name of Building</label>
                    <input type="text" name="name" id="name" class="form-control text-uppercase" placeholder="Insert a name for the Building" required autofocus autocomplete="name">
                </div>
                <div class="col-sm-3 mt-auto">
                    <button type="submit"><ion-icon name="checkmark-done-outline" class="btn-index"></ion-icon></button>
                </div>
            </div>
        </div>
    </form>
@endsection