@extends('adminlte::page')

    @section('title' , 'Zabbix Params')

    @section('content_header')
        <div class="d-flex justify-content-between">
            <h1>Zabbix Information</h1>
        </div>
    @stop

    @section('content')

        {{-- <div class="img-topologia">
        </div> --}}

        <div class="display-grid-graphics">

            <div>
                <canvas id="myGraficNovedades"></canvas>
            </div>
            <div>
                <canvas id="myGraficDone"></canvas>
            </div>
            <div>
                <canvas id="myGraficNotDone"></canvas>
            </div>

        </div>

        <table class="table table-striped">
            <thead class="text-center">
                <tr>
                    <th>#</th>
                    <th>Host ID</th>
                    <th>Host Name</th>
                    <th>Status</th>
                    <th>IP</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @php
                    $count = 1;
                    $problems = 1;       
                @endphp
                @foreach ($array as $a)
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$a['host']}}</td>
                        <td>{{$a['name']}}</td>
                        @foreach ($a['interfaces'] as $interface)
                            <td>{{$interface['interfaces'][0]['available'] = 1 ? 'Available' : 'Unavailable'}}</td>
                            <td>
                                <button type="button" class="btn-index" style="font-size: 1.5rem !important;" data-toggle="modal" data-target="#exampleModal{{$problems}}">
                                    {{$interface['ip']}}
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$problems}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header d-flex justify-content-around">
                                                <h5 class="modal-title">{{$a['name']}}</h5>
                                                <h5 class="modal-title">{{$interface['ip']}}</h5>
                                            </div>
                                            <div class="modal-body">
                                                <h2 class="d-flex justify-content-start">Problems</h2>
                                                @foreach ($a['problems'] as $problem)
                                                    <div class="row">
                                                        <p style="text-align: left;"> {{ $problems . '-) ' . $problem['name'] }}</p>
                                                    </div>
                                                    @php
                                                        $problems++;        
                                                    @endphp
                                                @endforeach
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn-index" data-dismiss="modal"><ion-icon name="arrow-undo-outline" class="btn-index"></ion-icon></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        @endforeach
                        {{--<td>{{$torre->name}}</td>
                        <td class="d-flex justify-content-center">
                            <form action="{{route('torres.destroy', $torre->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                            <a href="{{route('torres.edit', $torre->id)}}" class="btn btn-outline-warning">Edit</a>
                            <a href="{{route('floors.create', $torre->id)}}" class="btn btn-outline-warning">Add Floors</a>
                        </td> --}}
                    </tr>
                    @php
                        $count++;        
                    @endphp
                @endforeach
            </tbody>
        </table>
        
    @endsection

    @section('adminlte_js')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>const arrayData = @json($arrayData);</script>
        <script src="{{ asset('js/data.js') }}"></script>
    @stop