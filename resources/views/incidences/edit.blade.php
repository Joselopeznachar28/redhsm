@extends('adminlte::page')

@section('title', 'Edit Incidence')

@section('content_header')
    <h1>Edit Incidence</h1>
@stop

@section('content')
    <form action="{{route('incidences.update',$incidence)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <label for="incidence" class="form-label">Description of the Incidence</label>
                    <input name="incidence" id="incidence" placeholder="Insert a description of the Response" required autofocus autocomplete="response" class="form-control" value="{{ $incidence->incidence }}"/>
                </div>
                <div class="col-sm-6 mt-auto">
                    <button type="submit"><ion-icon name="checkmark-done-outline" class="btn-index"></ion-icon></button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop