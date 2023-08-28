@extends('adminlte::page')

    @section('content_header')
        <div class="d-flex justify-content-between">
            <h1>Switch Details</h1>
        </div>    
    @stop

    @section('content')
    <div class="switch-box">
        <div class="switch">
            <div class="row justify-content-between text-white">
                <div>
                    <span class="h4">{{$device->mark}}</span>
                    <span class="ml-3 h4">{{$device->model}} </span>
                </div>
                <div>
                    <h4>{{$device->name}}</h4>
                </div>
            </div>
            @php
                $up = 1;   
                $down = 2;   
            @endphp
            <div class="row">
                @foreach ($device->ports as $port)
                    @if ($up % 2 != 0)
                        <button type="button" class="switch__port ml-1 text-center" data-toggle="modal" data-target="#exampleModal{{$up}}">
                            {{$up}}
                        </button>
                    @endif
                    <!-- VENTANA MODAL -->
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$up}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-around">
                                    <h5 class="modal-title">Port Information</h5>
                                    <h5 class="modal-title" id="exampleModalLabel">Port {{$up}}</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="form-label">Port Mode</label>
                                            <input type="text" value="{{$port->mode}}" disabled readonly class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="form-label">Port Type</label>
                                            <input type="text" value="{{$port->type}}" disabled readonly class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="form-label">Port Name</label>
                                            <input type="text" value="{{$port->name}}" disabled readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="form-label">VLAN</label>
                                            <input type="text" value="{{$port->vlan}}" disabled readonly class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="form-label">Port Speed</label>
                                            <input type="text" value="{{$port->speed}}" disabled readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal"><ion-icon name="arrow-undo-outline" class="btn-index"></ion-icon></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $up++;   
                    @endphp
                @endforeach
            </div><br>
            <div class="row">
                @foreach ($device->ports as $port)
                    @if ($down % 2 == 0)
                        <button type="button" class="switch__port ml-1 text-center" data-toggle="modal" data-target="#exampleModal{{$down}}">{{$down}}</button>
                    @endif
                    <!-- VENTANA MODAL -->
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{$down}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header d-flex justify-content-around">
                                    <h5 class="modal-title">Port Information</h5>
                                    <h5 class="modal-title" id="exampleModalLabel">Port {{$down}}</h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="form-label">Port Mode</label>
                                            <input type="text" value="{{$port->mode}}" disabled readonly class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="form-label">Port Type</label>
                                            <input type="text" value="{{$port->type}}" disabled readonly class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="form-label">Port Name</label>
                                            <input type="text" value="{{$port->name}}" disabled readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="form-label">VLAN</label>
                                            <input type="text" value="{{$port->vlan}}" disabled readonly class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="form-label">Port Speed</label>
                                            <input type="text" value="{{$port->speed}}" disabled readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" data-dismiss="modal"><ion-icon name="arrow-undo-outline" class="btn-index"></ion-icon></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php
                        $down ++ ;   
                    @endphp
                @endforeach
            </div>
        </div>
    </div>


    @endsection