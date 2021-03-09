<?php

namespace App\Http\Controllers;

use App\Booking_trips;
use App\Confirmations;
use App\Selling_trips;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class confirmsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','adminOnly']);
    }

    public function index()
    {
        $confirms = Confirmations::join('booking_trips', 'confirmations.booking_id', '=', 'booking_trips.booking_id')
            ->where('booking_trips.Payment_status', 'Pending payment')
            ->orderBy('confirmations.confirm_id', 'DESC')->get();
        return view('comfirm.confirm', compact('confirms'));
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
    public function update($id)
    {
        Selling_trips::create([
            'c_date' => today(),
            'admin_id' => Auth::user()->admin_id,
            'confirm_id' =>  $id,
        ]);

        $sell = Confirmations::join('booking_trips', 'confirmations.booking_id', '=', 'booking_trips.booking_id')
            ->where('confirmations.confirm_id', $id)->first();

        $update = Booking_trips::find($sell['booking_id']);
        $update->update([
            'Payment_status' => 'Complete'
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $sell = Confirmations::join('booking_trips', 'confirmations.booking_id', '=', 'booking_trips.booking_id')
            ->where('confirmations.confirm_id', $id)->first();

        $update = Booking_trips::find($sell['booking_id']);
        $update->update([
            'Payment_status' => 'Cancelled'
        ]);

        return redirect()->back();
    }
}
