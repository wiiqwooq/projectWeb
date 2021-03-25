<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="fonts/thsarabunnew.css" />
    <style>
        table {
            font-family: 'THSarabunNew',sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-family: 'THSarabunNew',sans-serif;
        }

        td{
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
            font-family:'THSarabunNew',sans-serif;
        }
    </style>
</head>

<body>
    @php
    $i=1;
    @endphp
    <img src="{{ public_path('/images/logo.png') }}" style="width: 40; height: 40; display: inline">
    <center>
        <h2 >Top Trips Selling Report of {{$month}} {{$year}}</h2>
    </center>

    <table style="boder:2px solid black;margin-left:auto;margin-right:auto;width:100%;">
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
</body>

</html>
