<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class usersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','adminOnly']);
    }
    public function index()
    {
        $users = Users::all();
        return view('Users.users', compact('users'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = Users::findorFail($id);
        return view('Users.edit_user', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $update = Users::findorFail($id);
        $update->update($request->all());

        return redirect('/users');
    }

    public function destroy($id)
    {
        return $id;
        Users::find($id)->delete();
        return back();
    }
}
