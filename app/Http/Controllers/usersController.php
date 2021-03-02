<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Http\Request;

class usersController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminOnly');
    }
    public function index()
    {
        $users = Users::all();
        return view('users.users', compact('users'));
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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
