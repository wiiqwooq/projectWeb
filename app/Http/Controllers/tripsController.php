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
    public function __construct()
    {
        $this->middleware(['auth','adminOnly']);
    }
    public function index()
    {
        $trips = Trips::join('provinces', 'trips.province_id', '=', 'provinces.province_id')
                ->orderBy('trips.trips_id','DESC')->get();
        return view('Trips.trips', compact('trips'));
    }
    public function create()
    {
        $atts= DB::table('tourist_attractions')->whereIn('tourist_status',['Available','Enable'])->get();
        $pro = Province::all();
        return view("Trips.create_trips", compact('atts', 'pro'));
    }

    public function store(Request $request)
    {
        $trip = new Trips();
        $trip->fill($request->only($trip->getFillable()));
        $trip->save();
        $tourist = $request->tourist_id;
        foreach($tourist as $key => $value) {
            $detail = new Trips_Detail();
            $detail->date = $request->date[$key];
            $detail->time = $request->time[$key];
            $detail->trips_id = $trip->trips_id;
            $detail->tourist_id = $request->tourist_id[$key];
            $detail->save();

            $updatestatus= Tourist_Attraction::findorFail($request->tourist_id[$key]);
            $updatestatus->update([
                'tourist_status' => 'Enable'
            ]);
        }

        return back();
    }

    public function show($id)
    {
        $trips = Trips::join('provinces', 'trips.province_id', '=', 'provinces.province_id')->where('trips_id', $id)->get();
        $details = Trips_Detail::join('tourist_attractions', 'trips_details.tourist_id', '=', 'tourist_attractions.tourist_id')
            ->where('trips_id', $id)->orderBy('trips_details.date', 'ASC')->get();
        return view('Trips.detial_trips', compact('trips', 'details'));
    }

    public function edit($id)
    {
        $trips = Trips::join('provinces','trips.province_id','=','provinces.province_id')
                ->where('trips.trips_id',$id)->first();

        $infodetail = Trips_Detail::join('trips', 'trips.trips_id', '=', 'trips_details.trips_id')
            ->join('tourist_attractions', 'trips_details.tourist_id', '=', 'tourist_attractions.tourist_id')
            ->where('trips_details.trips_id', $id)->orderBy('trips_details.date', 'ASC')->get();

        $atts= DB::table('tourist_attractions')
            ->whereIn('tourist_status',['Available','Enable'])
            ->where('province_id',$infodetail[0]['province_id'])
            ->get();

        return view('Trips.edit_trips', compact('trips', 'atts','infodetail'));
    }

    public function update(Request $request, $id)
    {
        if ($request->tourist_id == null){
            return redirect()->back()->with('fail','กรุณาเพิ่มสถานที่ท่องเที่ยว');
        }else{
        $update = Trips::findorFail($id);
        $update->update($request->all());

        for ($i = 0; $i < count($request->tourist_id); $i++) {
            if (isset($request->detail_id[$i])) {
                DB::table('trips_details')->where('detail_id', $request->detail_id[$i])->update([
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

        return redirect()->back()->with('success','แก้ไขสำเร็จ');
        }
    }

    public function findProvince(Request $request){
         if($request->ajax()){
             $tourist = DB::table('tourist_attractions')
                    ->where('province_id',$request->province_id)
                    ->orderBy('tourist_id','desc')
                    ->get();

            return response()->json($tourist);
         }
    }

    public function destroy($trips)
    {
        Trips_detail::find($trips)->delete();
        return back();
    }

    public function deleteTrip($id)
    {
        $delete = Trips::find($id);
        if($delete->trips_status == "Available"){
            $delete->delete();
            return redirect()->back()->with('success','Deleted trip.');
        }else{
            return redirect()->back()->with('fail','Can not delete this trip.');
        }
    }
}
