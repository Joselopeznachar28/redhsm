<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Torre;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function index(){
        $floors = Floor::all();
        return view('floors.index',compact('floors'));
    }

    public function create(Torre $torre){
        return view('floors.create', compact('torre'));
    }

    public function store(Request $request){
        $hasFloors = $request->has('floors');
        
        $floors = $request->floors;
        
        if ($hasFloors){
            
            foreach ($floors as $floor) {
                // dd($floor);

                $newFloor = Floor::create([
                    'name' => $floor,
                    'torre_id' => $request->torre_id,
                ]);
            }
        }


        return redirect()->route('floors.index');
    }

    public function edit($id){
        $torres = Torre::all();
        $floor = Floor::find($id);
        return view('floors.edit',compact('floor','torres'));
    }

    public function update(Request $request, $id){
        $floor = Floor::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('floors.index');
    }

    public function destroy($id){
        $floor = Floor::find($id);
        $floor->delete();
        return back();
    }
}
