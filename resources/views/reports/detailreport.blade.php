<!DOCTYPE html>
<html>

<head>
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
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    @php
    $i=1;
    @endphp
    <center>
        <h2>Selling Report of {{$month}} {{$year}}</h2>
    </center>

    <table style="boder:2px solid black;margin-left:auto;margin-right:auto;width:100%;">
        <tr>
            <th style="text-align:center">#</th>
            <th style="text-align:center">Date</th>
            <th style="text-align:center">Price</th>
        </tr>
        @foreach ($reportSell as $report)
        <tr>
            <td style="text-align:center">{{$i}}</td>
            <td style="text-align:center">{{$report->c_date}}</td>
            <td style="text-align:center">{{$report->total_price}}</td>
        </tr>
        {{$i++}}
        @endforeach
        <tr>
            <td style="text-align:center" colspan="2">Summary</td>
            <td style="text-align:center">{{$sum}}</td>
        </tr>
    </table>
</body>

</html>
