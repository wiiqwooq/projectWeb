<?php

namespace App\Http\Controllers;

use App\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminsController extends Controller
{
    public function index()
    {
        $admins = Admins::all();

        return view('Admins.admins', compact('admins'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $post=$request->all();
        Admins::create($post);
        return view('Admins.create_admins');
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        $admin = Admins::find($id);
        return view('Admins.edit_admins',compact('admin'));
    }
    public function update(Request $request, $id)
    {
        $update=Admins::findorFail($id);
        $update->update($request->all());

        return redirect('/admins');
    }
    public function destroy($id)
    {
        Admins::find($id)->delete();
        return redirect('/admins');
    }
}
