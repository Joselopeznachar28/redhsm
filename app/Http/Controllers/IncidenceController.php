<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Incidence;
use App\Models\ResponseIncidence;
use Illuminate\Http\Request;

class IncidenceController extends Controller
{
    public function index(){
        $incidences = Incidence::all();
        return view('incidences.index',compact('incidences'));
    }

    public function create(){
        return view('incidences.create');
    }

    public function store(Request $request){
        $incidence = Incidence::create([
            'incidence' => $request->incidence,
        ]);

        return redirect()->route('incidences.index');
    }

    public function edit(Incidence $incidence){
        return view('incidences.edit',compact('incidence'));
    }

    public function update(Request $request, Incidence $incidence){
        $newIncidence = Incidence::findOrFail($incidence->id)->update([
            'incidence' => $request->incidence,
        ]);

        return redirect()->route('incidences.index');
    }

    public function destroy(Incidence $incidence){
        $incidence->delete();
        return back();
    }
}
