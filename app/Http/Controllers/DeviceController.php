<?php

namespace App\Http\Controllers;

use App\Models\CDD;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index(){
        $devices = Device::all();
        return view('devices.index',compact('devices'));
    }

    public function create(CDD $cdd){
        return view('devices.create', compact('cdd'));
    }

    public function store(Request $request){
        // dd($request->all());
        $device = Device::create([
            'name' => $request->name,
            'mark' => $request->mark,
            'model' => $request->model,
            'ip' => $request->ip,
            'user_admin' => $request->user_admin,
            'password_admin' => $request->password_admin,
            'type' => $request->type,
            'cdd_id' => $request->cdd_id,
        ]);

        return redirect()->route('devices.index');
    }

    public function edit($id){
        $cdds = CDD::all();
        $device = Device::find($id);
        return view('devices.edit',compact('device','cdds'));
    }

    public function update(Request $request, $id){
        $newDevice = Device::findOrFail($id)->update([
            'name' => $request->name,
            'mark' => $request->mark,
            'model' => $request->model,
            'ip' => $request->ip,
            'user_admin' => $request->user_admin,
            'password_admin' => $request->password_admin,
            'type' => $request->type,
            'cdd_id' => $request->cdd_id,
        ]);

        return redirect()->route('devices.index');
    }

    public function destroy($id){
        $device = Device::find($id);
        $device->delete();
        return back();
    }

    public function show(Device $device){
        // dd($device->ports);
        return view('devices.show',compact('device'));
    }
}
