<?php

namespace App\Http\Controllers;

use App\Tourist_Attraction;
use App\Image_Tourist_Attraction;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class attractionsController extends Controller
{
    public function index()
    {
        $att = Tourist_Attraction::join('provinces','tourist_attractions.province_id','=','provinces.province_id')->get();
        return view('Attractions.attractions', compact('att'));
    }

    public function create()
    {
        $pro = Province::all();
        return view('Attractions.create_attraction',compact('pro'));
    }

    public function store(Request $request)
    {
        $att = new Tourist_Attraction;
        $att->fill($request->only($att->getFillable()));
        $att->save();


        if($file=$request->file('image_name')){
            foreach($file as $files){
                $name=$files->getClientOriginalName();
                $files->move('images',time().$name);
                $img = new Image_Tourist_Attraction;
                $img->image_name=time()."".$name;
                $img->tourist_id=$att->tourist_id;
                $img->save();
            }
        }
       return back();
    }

    public function show($id)
    {
        // Image_Tourist_Attraction::find($id)->delete();
        // return back();

    }

    public function edit($id)
    {
        $atts = Tourist_Attraction::find($id);
        $imgs= DB::select('select * from image_tourist_attractions where tourist_id = :tourist_id',['tourist_id' => $id]);
        return view('Attractions.edit_attraction',compact('atts','imgs'));
    }

    public function update(Request $request, $id)
    {
        $update=Tourist_Attraction::findorFail($id);
        $update->update($request->all());

        if($file=$request->file('image_name')){
            foreach($file as $files){
                $name=$files->getClientOriginalName();
                $files->move('images',time().$name);
                $img = new Image_Tourist_Attraction;
                $img->image_name=time()."".$name;
                $img->tourist_id=$update->tourist_id;
                $img->save();
            }
        }


        return redirect('/attractions');
    }
    public function destroy($id)
    {
        Tourist_Attraction::find($id)->delete();
        return redirect("/attractions");
    }

    public function destroyImage($id)
    {
        Image_Tourist_Attraction::find($id)->delete();
        return back();
    }

}
