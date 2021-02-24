<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
            font-family: "Sarabun";
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        body {
            font-family: "Sarabun";
        }
    </style>
</head>

<body>
    @php
    $i=1;
    @endphp
    <center>
        <h2>Top Trips Selling Report of {{$month}} {{$year}}</h2>
    </center>

    <table style="boder:2px solid black;margin-left:auto;margin-right:auto;width:100%;">
        <tr>
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
