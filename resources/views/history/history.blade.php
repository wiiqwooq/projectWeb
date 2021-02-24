@extends('layouts.menuhistory')

@section('menuhis')
<h3><i class="fa fa-angle-right"></i>Sells History</h3>
<div class="row">

    <div class="col-md-12">
        <div class="content-panel">

            <table class="table">
                <thead>
                    <tr>
                        <th>history_id</th>
                        <th>Admin</th>
                        <th>Price</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sell as $his)
                    <tr>
                        <td>{{$his->selling_id}}</td>
                        <td>{{$his->fname}}</td>
                        <td>{{$his->total_price}}</td>
                        <td>{{$his->c_date}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <! --/content-panel -->
    </div>
</div>
@endsection
