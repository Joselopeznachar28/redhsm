@extends('adminlte::page')

@section('title', 'Añadir Pisos')

@section('content_header')
    <h1>Add Floor </h1>
@stop

@section('content')
    <form action="{{route('floors.store')}}" method="post">
        @csrf
        <div class="form-group">
            <input type="hidden" name="torre_id" value="{{$torre->id}}">
            <div class="row">
                <div class="col-sm-4">
                    <label for="name" class="form-label text-uppercase">Building</label>
                    <input type="text" name="name" id="name" class="form-control text-uppercase" value="{{$torre->name}}" disabled>
                </div>
                <div class="col-sm-6 text-center">
                    <label class="form-label text-uppercase">Select Floors</label>
                    <div class="d-flex text-bold text-uppercase">
                        <div class="form-control-sm ml-4 mr-3" style="font-size: 1rem;">
                            <input class="form-check-input" type="checkbox" value="PB" name="floors[]">
                            <label class="form-check-label" for="defaultCheck1">
                                Low Level
                            </label>
                        </div>
                        <div class="form-control-sm mr-3" style="font-size: 1rem;">
                            <input class="form-check-input" type="checkbox" value="P1" name="floors[]">
                            <label class="form-check-label" for="defaultCheck2">
                              Level 1
                            </label>
                        </div>
                        <div class="form-control-sm mr-3" style="font-size: 1rem;">
                            <input class="form-check-input" type="checkbox" value="P2" name="floors[]">
                            <label class="form-check-label" for="defaultCheck2">
                              Level 2
                            </label>
                        </div>
                        <div class="form-control-sm mr-3" style="font-size: 1rem;">
                            <input class="form-check-input" type="checkbox" value="P3"  name="floors[]">
                            <label class="form-check-label" for="defaultCheck2">
                              Level 3
                            </label>
                        </div>
                        <div class="form-control-sm mr-3" style="font-size: 1rem;">
                            <input class="form-check-input" type="checkbox" value="P4" name="floors[]">
                            <label class="form-check-label" for="defaultCheck2">
                              Level 4
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 mt-4">
                    <input type="submit" value="{{ __('Add')}}" class="btn btn-outline-primary">
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