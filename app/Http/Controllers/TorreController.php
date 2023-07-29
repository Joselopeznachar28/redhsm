<?php

namespace App\Http\Controllers;

use App\Models\Torre;
use Illuminate\Http\Request;

class TorreController extends Controller
{
    
    public function index(){
        $torres = Torre::all();
        return view('torres.index',compact('torres'));
    }

    public function create(){
        return view('torres.create');
    }

    public function store(Request $request){
        $torre = Torre::create([
            'name' => $request->name
        ]);

        return redirect()->route('torres.index');
    }

    public function edit($id){
        $torre = Torre::find($id);
        return view('torres.edit',compact('torre'));
    }

    public function update(Request $request, $id){
        $torre = Torre::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('torres.index');
    }

    public function destroy($id){
        $torre = Torre::find($id);
        $torre->delete();
        return back();
    }
}
