<?php

namespace App\Http\Controllers;

use App\Selling_trips;
use Cron\MonthField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Illuminate\Support\Facades\App;

class reportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','adminOnly']);
    }

    public function index()
    {
        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        return view('reports.report', compact('months'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
    public function createSellingPDF(Request $request)
    {
        $reportSell = Selling_trips::join('confirmations', 'selling_trips.confirm_id', '=', 'confirmations.confirm_id')
            ->join('booking_trips', 'confirmations.booking_id', '=', 'booking_trips.booking_id')
            ->join('trips','booking_trips.trips_id','=','trips.trips_id')
            ->whereMonth('selling_trips.c_date', $request->month)
            ->whereYear('selling_trips.c_date', $request->year)
            ->select('trips.trips_name','selling_trips.c_date','booking_trips.total_price')
            ->get();

        $sum = 0;
        foreach ($reportSell as $price) {
            $sum += $price['total_price'];
        }

        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        $month = $months[$request->month - 1];


        $year = $request->year;

        $pdf = App::make('dompdf.wrapper');
        $html = view('reports.detailreport', compact('reportSell', 'sum', 'month', 'year'))->render();
        $pdf->loadHTML($html);
        return $pdf->stream();
    }
    public function createTopTripPDF(Request $request)
    {
        //return $request;
        $reportTop = Selling_trips::join('confirmations', 'selling_trips.confirm_id', '=', 'confirmations.confirm_id')
            ->join('booking_trips', 'confirmations.booking_id', '=', 'booking_trips.booking_id')
            ->join('trips', 'booking_trips.trips_id', '=', 'trips.trips_id')
            ->whereMonth('selling_trips.c_date', $request->month)
            ->whereYear('selling_trips.c_date', $request->year)
            ->select(DB::raw('trips.trips_name, SUM(booking_trips.total) as top_amount'))
            ->groupBy('trips.trips_name')
            ->orderBy('top_amount', 'desc')
            //->paginate(5),
            ->take(5)
            ->get();

        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];
        $month = $months[$request->month - 1];


        $year = $request->year;

        $pdf = App::make('dompdf.wrapper');
        $html = view('reports.detailtopreport', compact('reportTop', 'month', 'year'))->render();
        $pdf->loadHTML($html);
        return $pdf->stream();
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
    public function getTopReport(Request $request)
    {
        if ($request->ajax()) {
            $reportTop = Selling_trips::join('confirmations', 'selling_trips.confirm_id', '=', 'confirmations.confirm_id')
                ->join('booking_trips', 'confirmations.booking_id', '=', 'booking_trips.booking_id')
                ->join('trips', 'booking_trips.trips_id', '=', 'trips.trips_id')
                ->whereMonth('selling_trips.c_date', $request->month)
                ->whereYear('selling_trips.c_date', $request->year)
                ->select(DB::raw('trips.trips_name,SUM(booking_trips.total) as top_amount'))
                ->groupBy('trips.trips_name')
                ->orderBy('top_amount', 'desc')
                //->paginate(5),
                ->take(5)
                ->get();
            $output = "";
            $output .= "<div class=row><div class=col-md-12><table class=table>";
            $output .= "<thead>
                            <tr>
                                <th>Trips</th>
                                <th>Amount</th>
                            </tr>
                        </thead><tbody>";
            foreach ($reportTop as $top) {
                $output .= "
                            <tr>
                                <td>" . $top->trips_name . "</td>
                                <td>" . $top->top_amount . "</td>
                            </tr>
                ";
            }
            $output .= "</tbody></table></div></div>";
            $data = ['data' => $output];
            echo json_encode($data);
        }
    }
    public function getSellReport(Request $request)
    {
        if ($request->ajax()) {
            $reportSell = Selling_trips::join('confirmations', 'selling_trips.confirm_id', '=', 'confirmations.confirm_id')
                ->join('booking_trips', 'confirmations.booking_id', '=', 'booking_trips.booking_id')
                ->join('trips','booking_trips.trips_id','=','trips.trips_id')
                ->whereMonth('selling_trips.c_date', $request->month)
                ->whereYear('selling_trips.c_date', $request->year)
                ->get();
            $sum = 0;
            $output = "";
            $output .= "<div class=row><div class=col-md-12><table class=table>";
            $output .= "<thead>
                            <tr>
                                <th>Trips</th>
                                <th>Date</th>
                                <th>Price</th>
                            </tr>
                        </thead><tbody>";
            foreach ($reportSell as $price) {
                $sum += $price['total_price'];
                $output .= "
                            <tr>
                                <td>" . $price->trips_name . "</td>
                                <td>" . $price->c_date . "</td>
                                <td>" . $price->total_price . "</td>
                            </tr>
                ";
            }
            $output .= "
                            <tr>
                                <td>SUM</td>
                                <td></td>
                                <td>" . $sum . "</td>
                            </tr>
            ";
            $output .= "</tbody></table></div></div>";
            $data = ['data' => $output];
            echo json_encode($data);
        }
    }
}
