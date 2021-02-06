<?php

namespace App\Http\Controllers;

use App\Trips;
use App\Tourist_Attraction;
use App\Trips_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Province;

class tripsController extends Controller
{
    public function index()
    {
        $trips = Trips::join('provinces','trips.province_id','=','provinces.province_id')->get();
        return view('Trips.trips', compact('trips'));
    }
    public function create()
    {
        $atts = Tourist_Attraction::all();
        $pro = Province::all();
        return view("Trips.create_trips", compact('atts','pro'));
    }

    public function store(Request $request)
    {
        $trip = new Trips();
        $trip->fill($request->only($trip->getFillable()));
        $trip->save();

        $tourist = $request->tourist_id;
        for($i = 0; $i < count($tourist); $i++){
            $detail = new Trips_Detail();
            $detail->date = $request->date[$i];
            $detail->time = $request->time[$i];
            $detail->trips_id = $trip->trips_id;
            $detail->tourist_id = $request->tourist_id[$i];
            $detail->save();
        }
       return back();
    }

    public function show($id)
    {
        $trips = Trips::join('provinces','trips.province_id','=','provinces.province_id') ->where('trips_id',$id)->get();
        $details = Trips_Detail::join('tourist_attractions','trips_details.tourist_id','=','tourist_attractions.tourist_id')
                    ->where('trips_id',$id)->orderBy('trips_details.date','ASC')->get();
        return view('Trips.detial_trips',compact('trips','details'));
    }

    public function edit($id)
    {
        $trips = Trips::find($id);
        $atts = Tourist_Attraction::all();
        $pro = Province::all();
        $infopro = Trips::join('provinces','trips.province_id','=','provinces.province_id')->where('trips.trips_id',$id)->get();
        $infodetail = Trips_Detail::join('trips','trips.trips_id','=','trips_details.trips_id')
                    ->join('tourist_attractions','trips_details.tourist_id','=','tourist_attractions.tourist_id')
                    ->where('trips_details.trips_id',$id)->orderBy('trips_details.date','ASC')->get();

        return view('Trips.edit_trips',compact('trips','atts','pro','infopro','infodetail'));
    }

    public function update(Request $request,$id)
    {
        // return $request;
        $update=Trips::findorFail($id);
        $update->update($request->all());

        for($i = 0; $i < count($request->tourist_id); $i++){
            if(isset($request->detail_id[$i])){
            //return $request;
                DB::table('trips_details')->where('detail_id',$request->detail_id[$i])->update([
                'tourist_id' => $request->tourist_id[$i],
                'date' => $request->date[$i],
                'time' => $request->time[$i],
                ]);
            } else {
                Trips_Detail::create([
                    'tourist_id' => $request->tourist_id[$i],
                    'date' => $request->date[$i],
                    'time' => $request->time[$i],
                    'trips_id' => $id,
                    ]);
            }

        }

       return redirect()->back();
    }

    public function destroy($trips)
    {
        Trips_detail::find($trips)->delete();
        return back();
    }

    public function deleteTrip($id) {
        Trips::find($id)->delete();
        return back();
    }
}
