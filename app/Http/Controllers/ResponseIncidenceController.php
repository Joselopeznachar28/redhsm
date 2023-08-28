<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ResponseIncidence;
use App\Models\Incidence;
use App\Models\Device;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResponseIncidenceController extends Controller
{
    public function index(){

        $responses = ResponseIncidence::all();

        return view('incidences.responses.index',compact('responses'));
    }

    public function create(Device $device){
        $incidences = Incidence::all();
        return view('incidences.responses.create',compact('incidences','device'));
    }

    public function store(Request $request){
        $response = ResponseIncidence::create([
            'response' => $request->response,
            'device_id' => $request->device_id,
            'incidence_id' => $request->incidence_id,
        ]);
        
        return redirect()->route('responses.index');
    }

    public function edit(ResponseIncidence $response){
        $incidences = Incidence::all();
        return view('incidences.responses.edit',compact('response','incidences'));
    }

    public function update(Request $request, ResponseIncidence $response){
        $newResponse = ResponseIncidence::findOrFail($response->id)->update([
            'response' => $request->response,
            'device_id' => $request->device_id,
            'incidence_id' => $request->incidence_id,
        ]);

        return redirect()->route('responses.index');
    }

    public function destroy(ResponseIncidence $response){
        $response->delete();
        return back();
    }

    public function done(Request $request){
        $response = ResponseIncidence::find($request->response_id);
        $response->done = $request->done;
        $response->save();
        return response()->json(['Good' => 'The problem have done!']);
    }
}
