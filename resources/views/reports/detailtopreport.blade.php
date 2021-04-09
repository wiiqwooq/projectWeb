<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="fonts/thsarabunnew.css" />
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
    <center>
        <h3>Top Trips Selling Report of {{$month}} {{$year}}</h3>
    </center>
    <table id="customers">
        <tr class="w3-green">
            <th style="text-align:center">#</th>
            <th style="text-align:center">Trips Name</th>
            <th style="text-align:center">Amount</th>
        </tr>
        @foreach ($reportTop as $top)
        <tr>
            <td style="text-align:center">{{$i}}</td>
            <td style="text-align:center">{{$top->trips_name}}</td>
            <td style="text-align:center">{{$top->top_amount}}</td>
        </tr>
        {{$i++}}
        @endforeach
    </table>
    <br>
    <hr>
    <center>
        <p> @ Take Me Travel Company </p>
    </center>
</body>

</html>
