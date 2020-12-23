<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function show(Request $request)
    {
        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $date = $request->input('date');

        $response = Http::post('http://testapi.vivaair.com/otatest/api/values', [
            'Origin' => $origin,
            'Destination' => $destination,
            'From' => $date,
        ]);

        $flights = $response->json();

        // var_dump($flights);

        $flights_array = array();

        if(gettype($flights)=="string"){

            $flights = json_decode($flights);

            for ($i = 0; $i <= count($flights)-1; $i++) {

                $flight = json_encode($flights[$i]);
                $array = explode(",", $flight);
                $flight_array = array();

                for ($j = 0; $j <= count($array)-1; $j++) {
                    $array_internal = explode(":", $array[$j]);
                    $key = str_replace(array('"','{'), '', $array_internal[0]);
                    $value = str_replace('"', '', $array_internal[1]);
                    
                    switch ($value) {
                        case "ADZ":
                            $value = "San Andrés";
                            break;
                        case "BAQ":
                            $value = "Barranquilla";
                            break;
                        case "BOG":
                            $value = "Bogotá";
                            break;
                        case "CLO":
                            $value = "Cali";
                            break;
                        case "CTG":
                            $value = "Cartagena";
                            break;   
                        case "MDE":
                            $value = "Medellin";
                            break; 
                        case "PEI":
                            $value = "Pereira";
                            break; 
                        case "SMR":
                            $value = "Santa Marta";
                            break; 
                    }
                    $flight_array[$key] = $value;
                }

                array_push($flights_array, $flight_array);
            }
        }
        

        return view('show',compact('flights_array'));
    }
}
