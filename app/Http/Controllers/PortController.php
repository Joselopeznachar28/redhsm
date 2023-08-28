<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Port;
use Illuminate\Http\Request;

class PortController extends Controller
{
    public function index(){
        $ports = Port::all();
        return view('ports.index',compact('ports'));
    }

    public function create(Device $device){
        return view('ports.create', compact('device'));
    }

    public function store(Request $request){
        $port = Port::create([
            'name' => $request->name,
            'mode' => $request->mode,
            'type' => $request->type,
            'number' => $request->number,
            'speed' => $request->speed,
            'vlan' => $request->vlan,
            'device_id' => $request->device_id,
        ]);

        $device = Device::find($port->device_id);

        return view('ports.create',compact('device'));
    }

    public function edit($id){
        $devices = Device::all();
        $port = Port::find($id);
        return view('ports.edit',compact('port','devices'));
    }

    public function update(Request $request, $id){
        $port = Port::findOrFail($id)->update([
            'name' => $request->name,
            'mode' => $request->mode,
            'type' => $request->type,
            'number' => $request->number,
            'speed' => $request->speed,
            'vlan' => $request->vlan,
            'device_id' => $request->device_id,
        ]);

        return redirect()->route('ports.index');
    }

    public function destroy($id){
        $port = Port::find($id);
        $port->delete();
        return back();
    }
}
