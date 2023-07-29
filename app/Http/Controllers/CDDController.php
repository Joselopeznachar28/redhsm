<?php

namespace App\Http\Controllers;

use App\Models\CDD;
use App\Models\Floor;
use App\Models\Torre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CDDController extends Controller
{
    public function index(){
        $cdds = CDD::all();
        return view('cdds.index',compact('cdds'));
    }

    public function create(Torre $torre, Floor $floor){
        return view('cdds.create', compact('torre','floor'));
    }

    public function store(Request $request){
        $cdd = CDD::create([
            'name' => $request->name,
            'code' => Str::random(5) ,
            'torre_id' => $request->torre_id,
            'floor_id' => $request->floor_id,
        ]);

        return redirect()->route('cdds.index');
    }

    public function edit($id){
        $torres = Torre::all();
        $floors = Floor::all();
        $cdd = CDD::find($id);
        return view('cdds.edit',compact('cdd','torres','floors'));
    }

    public function update(Request $request, $id){
        $cdd = CDD::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('cdds.index');
    }

    public function destroy($id){
        $cdd = CDD::find($id);
        $cdd->delete();
        return back();
    }
}
