<?php

namespace App\Http\Controllers;

use App\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class adminsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','adminOnly']);
    }

    public function index()
    {
        $admins = Admins::all();
        return view('Admins.admins', compact('admins'));
    }

    public function create()
    {
        return view('Admins.create_admins',);
    }

    public function store(Request $request)
    {
        Admins::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'phone' =>  $request->phone,
            'username' =>  $request->username,
            'password' => bcrypt($request->password),
            'admin_status' => "Enable"
        ]);
        return view('Admins.create_admins');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $admin = Admins::find($id);
        return view('Admins.edit_admins', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $update = Admins::findorFail($id);
        $update->update($request->all());

        return redirect('/admins');
    }

    public function destroy($id)
    {
        Admins::find($id)->delete();
        return redirect('/admins');
    }
}
