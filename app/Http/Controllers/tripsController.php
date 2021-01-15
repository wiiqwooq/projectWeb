<?php

namespace App\Http\Controllers;

use App\Trips;
use App\Tourist_Attraction;
use App\Trips_Detail;
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
        $trip = new Trips();
        $trip->fill($request->only($trip->getFillable()));
        //$trip->save();

        $detail = new Trips_Detail();
        $detail->fill($request->only($detail->getFillable()));
        foreach($detail as $det){
            return $det;
        }


        // if($file=$request->file('image_name')){
        //     foreach($file as $files){
        //         $name=$files->getClientOriginalName();
        //         $files->move('images',time().$name);
        //         $img = new Image_Tourist_Attraction;
        //         $img->image_name=time()."".$name;
        //         $img->tourist_id=$att->tourist_id;
        //         $img->save();
        //     }
        // }
       return view('Attractions.create_attraction');
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
