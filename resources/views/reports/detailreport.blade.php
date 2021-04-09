<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="fonts/thsarabunnew.css" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @font-face {
            font-family: 'THSarabunNew', sans-serif;
            font-style: normal;
            font-weight: normal;

        }

        #customers {
            font-family: "THSarabunNew", sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-family: "THSarabunNew", sans-serif;
        }

        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
            font-family: "THSarabunNew", sans-serif;
            font-size: 10;
        }

        #customers td {
            border-bottom: 1px solid #ddd;
            padding: 8px;
            font-family: "THSarabunNew", sans-serif;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
            font-family: "THSarabunNew", sans-serif;
        }

        #customers tr:hover {
            background-color: #ddd;
            font-family: "THSarabunNew", sans-serif;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #68976a;
            color: white;
            font-family: "THSarabunNew", sans-serif;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
            font-family: "THSarabunNew", sans-serif;
        }

        body {
            font-family: "THSarabunNew", sans-serif;
        }
    </style>

</head>

<body>
    @php
    $i=1;
    @endphp
    <center>
        <img src="{{ public_path('/images/logo.png') }}" style="width: 40; height: 40; display: inline">
    </center>
    <br>
    <hr>
    <h3>
        <center>
            Selling Report of {{$month}} {{$year}}
        </center>
    </h3>
    <table id="customers">
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
    <br>
    <hr>
    <center>
        <p> @ Take Me Travel Company </p>
    </center>
</body>

</html>
