<?php

namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$flights = Flight::paginate(5);
        $response = Http::post('http://testapi.vivaair.com/otatest/api/values', [
            'Origin' => 'BOG',
            'Destination' => 'CTG',
            'From' => '2020-12-21',
        ]);
        $flights = $response->json();
        return view('home',compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flight = new Flight();
        $flight->departureStation = $request->departureStation;
        $flight->arrivalStation = $request->arrivalStation;
        $flight->departureDate = $request->departureDate;
        $flight->transport = $request->transport;
        $flight->price = $request->price;
        $flight->currency = $request->currency;
        $flight->save();

        return back()->with('success', 'Vuelo Guardado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        //
    }
}
