<?php

namespace App\Http\Controllers;

use Cron\MonthField;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function index()
    {
        // return MonthField
        return view('repotrs.report');
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
