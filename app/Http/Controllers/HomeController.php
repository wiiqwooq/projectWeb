<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','adminOnly']);
    }

    public function index()
    {
        $post =$this->getLoggedinAdmin();
        return redirect('/users');
    }

    public function getLoggedinAdmin()
    {
        return Auth::user();
    }
}
