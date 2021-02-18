@extends('layouts.menutrip')

@section('menutrip')
            <h3><i class="fa fa-angle-right"></i>Create Trips
                <ul class="nav pull-right top-menu">
                    <a href="/trips">
                        <button type="button" class="btn btn-round btn-theme02 btn-sm"><i class="fa fa-angle-left"></i> Back</button>
                    </a>
                </ul>
            </h3>
            <div class="col-lg-12">
            <div class="form-panel">
            <form class="form-horizontal style-form" method="post" action="{{route('trips.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Trips Name: </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control round-form" name="trips_name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Province:</label>
                    <div class="col-sm-10">
                        <select class="form-control round-form" name="province_id">
                            @foreach ($pro as $province)
                            <option value="{{$province->province_id}}">{{$province->province_name}}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Start Date:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control round-form" name="start_date">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">End Date:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control round-form" name="end_date">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Amount:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control round-form" name="amount">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Price:</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control round-form" name="price">
                    </div>
                </div>
                @php
                $count = 1;
                @endphp
                <div class="form-group" id="form-line-trips">
                    <div class="col-sm-12">
                        <button class="btn btn-round btn-theme04 btn-sm" id="add-more" type="button">add attractions</button>
                    </div>
                    <div class="form-inline">
                        {{-- <input type="hidden" name="detail_id[]" value="{{$info->detail_id}}"> --}}
                        <div class="form-group">
                        <div class="col-sm-10">
                        <label class="col-sm-2 col-sm-4 control-label">Attractions{{$count}}:</label>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-10">
                            <select class="form-control round-form" name="tourist_id[]" >
                                @foreach ($atts as $att)
                                <option value="{{$att->tourist_id}}">{{$att->tourist_name}}</option>
                                @endforeach
                              </select>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-10">
                        <label class="col-sm-2 col-sm-2 control-label">Date{{$count}}:</label>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-10">
                            <input type="date" class="form-control round-form" min="2021-02-07" max="2021-02-07" name="date[]">
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-10">
                        <label class="col-sm-2 col-sm-2 control-label">Time{{$count}}:</label>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-sm-10">
                            <input type="time" class="form-control round-form" name="time[]">
                        </div>
                        </div>
                    </div>
                </div>
                <center>
                        <button type="submit" class="btn btn-theme03">Create</button>
                </center>
            </form>
            </div>
            </div>
            <script>
                $(document).ready(function(){
                    var i = 1;
                    $('#add-more').click(function(){
                        $('#form-line-trips').append("<div class=\"form-inline\">"+
                "<div class=\"form-group\">"+
                "<div class=\"col-sm-10\">"+
                "<label class=\"col-sm-2 col-sm-2 control-label\">Attractions"+(i+1)+":</label>"+
                "</div>"+
                "</div>"+
                "<div class=\"form-group\">"+
                "<div class=\"col-sm-10\">"+
                "<select class=\"form-control round-form\" name=\"tourist_id[" + i + "] \">"+
                "@foreach ($atts as $att)"+
                "<option value=\"{{$att->tourist_id}}\">{{$att->tourist_name}}</option>"+
                "@endforeach"+
                "</select>"+
                "</div>"+
                "</div>"+
                "<div class=\"form-group\">"+
                "<div class=\"col-sm-10\">"+
                "<label class=\"col-sm-2 col-sm-2 control-label\">Date"+(i+1)+":</label>"+
                "</div>"+
                "</div>"+
                "<div class=\"form-group\">"+
                "<div class=\"col-sm-10\">"+
                " <input type=\"date\" class=\"form-control round-form\" name=\"date[" + i + "]\">"+
                "</div>"+
                "</div>"+
                "<div class=\"form-group\">"+
                "<div class=\"col-sm-10\">"+
                "<label class=\"col-sm-2 col-sm-2 control-label\">Time"+(i+1)+":</label>"+
                "</div>"+
                "</div>"+
                "<div class=\"form-group\">"+
                "<div class=\"col-sm-10\">"+
                " <input type=\"time\" class=\"form-control round-form\" name=\"time[" + i + "] \">"+
                "</div>"+
                "</div>")+
                "</div>";
                i++;
                    });
                });
            </script>
@endsection


