@extends('layouts.menuhistory')

@section('menuhis')
<?php $i=1; ?>
<h3><i class="fa fa-angle-right"></i>Sells History</h3>
<div class="row">

    <div class="col-md-12">
        <div class="content-panel">

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Admin</th>
                        <th>Trips Name</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sell as $his)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$his->fname}}</td>
                        <td>{{$his->trips_name}}</td>
                        <td>{{$his->total_price}}</td>
                        <td>{{$his->c_date}}</td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        <! --/content-panel -->
    </div>
</div>
@endsection
