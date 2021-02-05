@extends('layouts.menutrip')

@section('menutrip')
<h3><i class="fa fa-angle-right"></i>Detail Trips
    <ul class="nav pull-right top-menu">
        <a href="/trips">
            <button type="button" class="btn btn-round btn-theme02 btn-sm"><i class="fa fa-angle-left"></i> Back</button>
        </a>
    </ul>
</h3>
<div class="col-lg-12">
    <div class="form-panel form-horizontal style-form">
        @foreach ($trips as $trip)
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Trips Name: </label>
            <div class="col-sm-10">
                <label class="col-sm-2 col-sm-2 control-label">{{$trip->trips_name}}</label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Province: </label>
            <div class="col-sm-10">
                <label class="col-sm-2 col-sm-2 control-label">{{$trip->province_name}}</label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Status: </label>
            <div class="col-sm-10">
                <label class="col-sm-2 col-sm-2 control-label">{{$trip->trips_status}}</label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Start Date: </label>
            <div class="col-sm-10">
                <label class="col-sm-2 col-sm-2 control-label">{{$trip->start_date}}</label>
                <label class="col-sm-2 col-sm-2 control-label">End Date: </label>
                <label class="col-sm-2 col-sm-2 control-label">{{$trip->end_date}}</label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Amount: </label>
            <div class="col-sm-10">
                <label class="col-sm-2 col-sm-2 control-label">{{$trip->amount}}</label>
                <label class="col-sm-2 col-sm-2 control-label">Price: </label>
                <label class="col-sm-2 col-sm-2 control-label">{{$trip->price}} / person</label>
            </div>
        </div>
        @endforeach
        <div class="form-group">
            <label class="col-sm-2 col-sm-2 control-label">Location: </label>
            <div class="col-sm-10">
                @foreach ($details as $det)
                <div class="col-sm-12">
                <label class="col-sm-2 col-sm-2 control-label">{{$det->tourist_name}}</label>
                <label class="col-sm-2 col-sm-2 control-label">Date: </label>
                <label class="col-sm-2 col-sm-2 control-label">{{$det->date}}</label>
                <label class="col-sm-2 col-sm-2 control-label">Time: </label>
                <label class="col-sm-2 col-sm-2 control-label">{{$det->time}}</label>
                </div>
                @endforeach
            </div>

        </div>
    </div>
    </div>

@endsection
