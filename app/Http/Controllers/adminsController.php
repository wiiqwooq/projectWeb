<?php

namespace App\Http\Controllers;

use App\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'adminOnly']);
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
        $chkusername = Admins::all();
        foreach ($chkusername as $chk) {
            $username[] = $chk->username;
        }
        $count = count($username);
        $check = 0;

        for ($i = 0; $i < $count; $i++) {
            if (strtolower($request->username)== strtolower($username[$i])) {
                $check += 1;
            }
        }
        if ($check == 1) {
           return redirect()->back()->with('fail', 'Cannot use this username.');
        } else {
            Admins::create([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'phone' =>  $request->phone,
                'username' =>  $request->username,
                'password' => bcrypt($request->password),
                'admin_status' => "Enable"
            ]);
            return redirect()->back()->with('success', 'Success register.');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $admin = Admins::find($id);
        if($admin == null){
            return redirect('/admins')->with('null', 'Do not have this value.');
        }
        return view('Admins.edit_admins', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $update = Admins::find($id);
        if($update == null){
            return redirect('/admins')->with('null', 'Do not have this value.');
        }
        
        if($request->fname == null || $request->lname == null || $request->phone == null){
            return redirect()->back()->with('fail','Incorect data.');

        }else{
        $update->update($request->all());
        return redirect()->back()->with('success','Edit data admin success.');
        }
    }
    public function editPassword($id)
    {

        $admin = Admins::find($id);
        if($admin == null){
            return redirect('/admins')->with('null', 'Do not have this value.');
        }
        return view('Admins.edit_password', compact('admin'));
    }

    public function updatePassword(Request $request, $id)
    {
        $admin = Admins::find($id);
        if($admin == null){
            return redirect('/admins')->with('null', 'Do not have this value.');
        }

        if (Hash::check($request->oldpassword, $admin->password)) {
            $admin->update([
                'password' => bcrypt($request->newpassword),
            ]);
            return redirect()->back()->with('success','Edited password.');
        }else{
            return redirect()->back()->with('fail','Old password is incorrect.');
        }
    }

    public function destroy($id)
    {
        if(Admins::find($id) == null){
            return redirect('/admins')->with('null', 'Do not have this value.');
        }
        Admins::find($id)->delete();
        return redirect('/admins');
    }
}
