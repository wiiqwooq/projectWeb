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
    public function __construct()
    {
        $this->middleware(['auth', 'adminOnly']);
    }

    public function index()
    {
        $att = Tourist_Attraction::join('provinces', 'tourist_attractions.province_id', '=', 'provinces.province_id')
            ->orderBy('tourist_attractions.tourist_id', 'DESC')->get();
        return view('Attractions.attractions', compact('att'));
    }

    public function create()
    {
        $pro = Province::all();
        return view('Attractions.create_attraction', compact('pro'));
    }

    public function store(Request $request)
    {
        $att = new Tourist_Attraction;
        $att->fill($request->only($att->getFillable()));
        $att->save();


        if ($file = $request->file('image_name')) {
            foreach ($file as $files) {
                $name = $files->getClientOriginalName();
                $files->move('images', time() . $name);
                $img = new Image_Tourist_Attraction;
                $img->image_name = time() . "" . $name;
                $img->tourist_id = $att->tourist_id;
                $img->save();
            }
        }
        return redirect()->back()->with('addsuccess','Add Data Tourist Attraction Success.');
    }

    public function show($id)
    {
        //

    }

    public function edit($id)
    {
        $atts = Tourist_Attraction::find($id);
        if ($atts == null) {
            return redirect('/attractions')->with('null', 'Do not have this value.');
        }
        $pro = Province::all();
        $imgs = DB::select('select * from image_tourist_attractions where tourist_id = :tourist_id', ['tourist_id' => $id]);
        return view('Attractions.edit_attraction', compact('atts', 'imgs', 'pro'));
    }

    public function update(Request $request, $id)
    {

        $update = Tourist_Attraction::find($id);
        if($update == null){
            return redirect('/attractions')->with('null', 'Do not have this value.');
        }
        if ($request->tourist_name == null){
            return redirect()->back()->with('fail','Incorect data.');
        }else{
        $update->update($request->all());

        if ($file = $request->file('image_name')) {
            foreach ($file as $files) {
                $name = $files->getClientOriginalName();
                $files->move('images', time() . $name);
                $img = new Image_Tourist_Attraction;
                $img->image_name = time() . "" . $name;
                $img->tourist_id = $update->tourist_id;
                $img->save();
            }
        }
    }


        return redirect()->back()->with('success','Update Data Tourist Attraction Success.');
    }
    public function destroy($id)
    {
        $delete = Tourist_Attraction::find($id);

        if($delete == null){
            return redirect('/attractions')->with('null', 'Do not have this value.');
        }

        if ($delete->tourist_status == "Available") {
            $delete->delete();
            return redirect()->back()->with('success', 'Deleted tourist attraction success.');
        } else {
            return redirect()->back()->with('fail', 'Cannot delete this attraction.');
        }
    }

    public function destroyImage($id)
    {
        Image_Tourist_Attraction::find($id);
        if(Image_Tourist_Attraction::find($id) == null){
            return redirect('/attractions')->with('null', 'Do not have this value.');
        }else{
            Image_Tourist_Attraction::find($id)->delete();
        }
        return back();
    }
}
