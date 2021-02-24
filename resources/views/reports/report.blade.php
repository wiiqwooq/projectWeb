@extends('layouts.menureport')

@section('menurep')
@php
$i=1;
$j=1;
@endphp
<h3><i class="fa fa-angle-right"></i>Reports</h3>
<div class="col-lg-12">
    <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> รายงานข้อมูลรายได้</h4>
        <form action="{{route('export.selling')}}" method="post">
            @csrf
            <div class="form-inline">
                <div class="form-group">
                    <div class="col-sm-12">
                        <select class="form-control round-form" name="month" id="month">
                            @foreach ($months as $month)
                            <option value="{{$i}}">{{$month}}</option>
                            {{$i++}}
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <select class="form-control round-form" name="year" id="year">
                            @for ($year=2021; $year >= 1900; $year--)
                            <option value="{{$year}}">{{$year}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-round btn-warning btn-md" id="export">Export PDF</button>
                    </div>
                </div>
            </div>
        </form>
        <div id="showReport"></div>

    </div>
</div>
<br>
<div class="col-lg-12">
    <div class="form-panel">
        <h4><i class="fa fa-angle-right"></i> รายงานแผนการท่องเที่ยวยอดนิยม</h4>
        <form action="{{route('export.toptrips')}}" method="post">
            @csrf
            <div class="form-inline">
                <div class="form-group">
                    <div class="col-sm-12">
                        <select class="form-control round-form" name="month" id="month1">
                            @foreach ($months as $month)
                            <option value="{{$j}}">{{$month}}</option>
                            {{$j++}}
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <select class="form-control round-form" name="year" id="year1">
                            @for ($year=2021; $year >= 1900; $year--)
                            <option value="{{$year}}">{{$year}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-round btn-warning btn-md" id="export">Export PDF</button>
                    </div>
                </div>
            </div>
        </form>
        <div id="showTopTripReport"></div>

    </div>
</div>

@endsection
@section('js')
<script>
    $(document).ready(function(){
        function getReport() {
            var month = $('#month').val();
            var year = $('#year').val();
            $.ajax({
                url: "{{route('get.report')}}",
                method: "GET",
                data: {month:month, year:year},
                dataType: "JSON",
                success:function(data){
                    $('#showReport').html(data.data);
                }
            });
        }
        $('#month, #year').change(function(){
            getReport();
        });
        function gettopReport() {
            var month = $('#month1').val();
            var year = $('#year1').val();
            $.ajax({
                url: "{{route('get.topreport')}}",
                method: "GET",
                data: {month:month, year:year},
                dataType: "JSON",
                success:function(data){
                    $('#showTopTripReport').html(data.data);
                }
            });
        }
        $('#month1, #year1').change(function(){
            gettopReport();
        });

        getReport();
        gettopReport();
    });
</script>

@endsection
