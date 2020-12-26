<?php

namespace App\Http\Controllers;

use App\Trips;
use App\Tourist_Attraction;
use Illuminate\Http\Request;

class tripsController extends Controller
{
    public function index()
    {
        $trips = Trips::all();
        return view('Trips.trips', compact('trips'));
    }
    public function create()
    {
        $atts = Tourist_Attraction::all();
        return view("Trips.create_trips", compact('atts'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Trips $trips)
    {
        //
    }

    public function edit(Trips $trips)
    {
        //
    }

    public function update(Request $request, Trips $trips)
    {
        //
    }

    public function destroy(Trips $trips)
    {
        //
    }
}
