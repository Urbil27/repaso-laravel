<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use \App\Models\User;
class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flights = Flight::All();
        $flightsToShow = [];
        foreach($flights as $flight){
            if($flight->date < new DateTime('now')){
                array_push($flightsToShow,$flight);
            }
        }
        return view('flights.index')->with('flights',$flights);
    }
    //En esta funcion le paso solo el vuelo numero 2 para luego acceder a los usuarios que han alquilado ese vuelo mediante la pivot en la view
    /*public function flightPassenger(){
        $flight = Flight::findOrFail(2);
        
        return view('passengers.index')->with('flight',$flight);
    }*/
    public function flightPassenger(){
        $flights = Flight::all();
        return view('passengers.index')->with('flights',$flights);
    }
    public function flightUsers($id){
        $flight = Flight::findOrFail($id);
        $users = $flight->users;
       
        return response()->json($users);
    }
    public function reserve(Request $request){
        
        $flight=Flight::findOrFail($request->id);
        $flight->available_seats= $flight->available_seats-$request->numberOfSeats;
        $flight->save();
        $user= User::findOrFail(Auth::user()->id);
        $user->flights()->attach($request->id);
        return redirect('/');
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($seats, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
