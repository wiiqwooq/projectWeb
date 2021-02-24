<?php

namespace App\Http\Controllers;

use App\Selling_trips;
use Illuminate\Http\Request;

class sellController extends Controller
{

    public function index()
    {
        $sell = Selling_trips::join('admins', 'selling_trips.admin_id', '=', 'admins.admin_id')
            ->join('confirmations', 'selling_trips.confirm_id', '=', 'confirmations.confirm_id')
            ->join('booking_trips', 'confirmations.booking_id', '=', 'booking_trips.booking_id')
            ->get();
        return view('history.history', compact('sell'));
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
