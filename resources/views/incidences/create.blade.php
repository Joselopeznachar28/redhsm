@extends('adminlte::page')

@section('title', 'Create Incidence')

@section('content_header')
    <h1>Create Incidence</h1>
@stop

@section('content')
    <form action="{{route('incidences.store')}}" method="post">
        @csrf
        <div class="form-group">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <label for="incidence" class="form-label">Description of the Incidence</label>
                    <input name="incidence" id="incidence" placeholder="Insert a description of the Response" required autofocus autocomplete="response" class="form-control" value="{{ old('incidence') }}"/>
                </div>
                <div class="col-sm-6 mt-auto">
                    <input type="submit" value="{{ __('Save')}}" class="btn btn-outline-primary">
                </div>
            </div>
        </div>
    </form>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop