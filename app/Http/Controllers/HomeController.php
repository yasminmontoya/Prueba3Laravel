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
        
        return view('show',compact('flights'));
    }
}
