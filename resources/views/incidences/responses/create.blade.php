@extends('adminlte::page')

@section('title', 'Create Response')

@section('content_header')
    <h1>Response to Incidences</h1>
@stop

@section('content')
    <form action="{{route('responses.store')}}" method="post">
        @csrf
        <div class="form-group">
            <input type="hidden" value="{{ $device->id }}" name="device_id">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <label for="response" class="form-label">Description a Response to Incidence</label>
                    <textarea class="form-control" name="response" id="response" cols="30" rows="2" placeholder="Insert a description for the response to Incidenct" required autofocus autocomplete="incidence">{{ old('response') }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <label for="incidence_id" class="form-label">Select of the Incidence</label>
                    <select name="incidence_id" id="incidence_id" required class="form-control">
                        <option value=""> -- Seleccione una Opcion --</option>
                        @foreach ($incidences as $incidence)
                            <option value="{{$incidence->id}}">{{$incidence->incidence}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3 mt-auto">
                    <button type="submit"><ion-icon name="checkmark-done-outline" class="btn-index"></ion-icon></button>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop