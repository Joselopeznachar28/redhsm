<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Incidence;
use App\Models\ResponseIncidence;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ZabbixController extends Controller
{
    public function index()
    {
    /* ----------------------------DATA GRAPH -----------------------------------------------------------------------------------------*/

        $arrayData = [];

        $incidences = Incidence::with('responses')->get();
        
        foreach ($incidences as $incidence){
            $responses = $incidence->responses;
            $object[$incidence->id] = [
                'name' => $incidence->incidence,
                'done' => [],
                'notDone' => [],
                'count' => [],
            ];
            foreach ($responses as $key => $response) {
                $object[$response->incidence_id]['done'] = $responses->where('done',1)->count();
                $object[$response->incidence_id]['notDone'] = $responses->where('done',0)->count();
                $object[$response->incidence_id]['count'] = $responses->count();
            }
        }
        array_push($arrayData,$object);

        // $incidences['incidenceDones']['count'] = $incidenceDone->count();

        // foreach ($incidenceNotDones as  $incidenceNotDone) {
        //     array_push($incidences['incidenceNotDones']['incidenceNotDone'],$incidenceNotDone);

/* ----------------------------API ZABBIX INIT-----------------------------------------------------------------------------------------*/

        $array = [];

        $url = 'http://192.168.1.109/zabbix/api_jsonrpc.php';

        $responseLogin = Http::post($url, [
            "jsonrpc"=> "2.0",
            "method"=> "user.login",
            "params"=> [
                "username"=> "Admin",
                "password"=> "zabbix"
            ],
            "id"=> 1
        ]);
        
        $zapiLogin = $responseLogin->json();
        
        // dd($responseLogin);

        // Obtengo todos los host del grupo HOTEL SAN MIGUEL
        $responseGroupHosts = Http::post($url, [
            "jsonrpc" => "2.0",
            "method" => "hostgroup.get",
            "params"=>[
                "selectHosts" => "extend",
                'filter' => [
                    "name" => 'HOTEL SAN MIGUEL',
                ],
                ],
            "auth"=>$zapiLogin['result'],
            "id"=>$zapiLogin['id']
        ]);
        $zapiGroupHosts = $responseGroupHosts->json();

        //Recorro cada host del grupo para obtener los datos de cada uno.
        foreach ($zapiGroupHosts['result'][0]['hosts'] as $zapiHost) {
            
            $idHost = $zapiHost['hostid'];

            // Realizo la peticion de los graficos de cada host a traves de su id.
            // $responseHostGraphs = Http::post($url, [
            //     "jsonrpc" => "2.0",
            //     "method" => "drule.get",
            //     "params"=>[
            //         "hostids" => [
            //             $idHost
            //         ],
            //     ],
            //     "auth"=>$zapiLogin['result'],
            //     "id"=>$zapiLogin['id']
            // ]);
            // $zapiHostGraphs = $responseHostGraphs->json();

            // Realizo la peticion de las interfaces de cada host a traves de su id.
            $responseHostInterfaces = Http::post($url, [
                "jsonrpc" => "2.0",
                "method" => "hostinterface.get",
                "params"=>[
                    "hostids" => [
                        $idHost
                    ],
                ],
                "auth"=>$zapiLogin['result'],
                "id"=>$zapiLogin['id']
            ]);
            $zapiHostInterfaces = $responseHostInterfaces->json();

            // Realizo la peticion de los problemas de cada host a traves de su id.
            $responseHostProblems = Http::post($url, [
                "jsonrpc" => "2.0",
                "method" => "problem.get",
                "params"=>[
                    "hostids" => [
                        $idHost
                    ],
                ],
                "auth"=>$zapiLogin['result'],
                "id"=>$zapiLogin['id']
            ]);

            $zapiHostProblems = $responseHostProblems->json();

            $objectProblems = [
                'host'          => $idHost,
                'name'          => $zapiHost['name'],
                'problems'      => $zapiHostProblems['result'],
                // 'graphs'        => $zapiHostGraphs['result'], 
                'interfaces'    => $zapiHostInterfaces['result'],
            ];

            array_push($array, $objectProblems);
        }

        return view('zabbix.index',compact('array','arrayData'));
    }  
}
