<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="fonts/thsarabunnew.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet"> --}}
    <style>
        @font-face{
            font-family: 'THSarabunNew',sans-serif;
            font-style: normal;
            font-weight: normal;

        }
        table {
            font-family: "THSarabunNew";
            border-collapse: collapse;
            width: 100%;
            font-family: 'THSarabunNew',sans-serif;

        }

        td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
            font-family: 'THSarabunNew',sans-serif;
            font-size: 14;
        }

        th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
            font-family: 'THSarabunNew',sans-serif;
            font-size: 12;
            font-weight: 300;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        body {
            font-family: "THSarabunNew",sans-serif;;
        }

    </style>

</head>

<body>
    @php
    $i=1;
    @endphp
    <img src="{{ public_path('/images/logo.png') }}" style="width: 40; height: 40; display: inline">

    <h3>
    <center>
        {{-- <img src="{{ public_path('/images/logo.png') }}" style="width: 60; height: 60; display: inline"> --}}
        Selling Report of {{$month}} {{$year}}
    </center>
    </h3>

    <table style="boder:2px solid black;margin-left:auto;margin-right:auto;width:100%;">
        <tr>
            <th style="text-align:center">#</th>
            <th style="text-align:center">Trips</th>
            <th style="text-align:center">Date</th>
            <th style="text-align:center">Price</th>
        </tr>
        @foreach ($reportSell as $report)
        <tr>
            <td style="text-align:center">{{$i}}</td>
            <td style="text-align:center;">{{$report->trips_name}}</td>
            <td style="text-align:center;">{{$report->c_date}}</td>
            <td style="text-align:center">{{$report->total_price}}</td>
        </tr>
        {{$i++}}
        @endforeach
        <tr>
            <td style="text-align:center" colspan="3">Summary</td>
            <td style="text-align:center">{{$sum}}</td>
        </tr>
    </table>
</body>

</html>
