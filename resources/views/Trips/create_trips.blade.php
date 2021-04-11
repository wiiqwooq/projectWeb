@extends('layouts.menutrip')

@section('menutrip')
<script>
    $(document).ready(function(){
        $('#start_date').datetimepicker({
            format:'Y-m-d',
            timepicker:false,
            minDate:'+1970-01-06',
            scrollInput:false
        });
        $('#start_date').change(function(){
            $('#end_date').prop('disabled',false);
            $('#end_date').datetimepicker({
                format:'Y-m-d',
                timepicker:false,
                minDate:$('#start_date').val(),
                defaultDate:$('#start_date').val(),
                scrollInput:false
            });
            if($('#end_date').val() != "" && $('#start_date').val() > $('#end_date').val()) {
                $('#end_date').datetimepicker({
                    value:$('#start_date').val()
                });
                $("#date0").datetimepicker({
                    value:$('#start_date').val()
                });
            }
        });
        $('#end_date').change(function(){
            $('#date0').prop('disabled',false);
            $("#date0").datetimepicker({
                format:'Y-m-d',
                timepicker:false,
                minDate:$('#start_date').val(),
                maxDate:$('#end_date').val(),
                defaultDate:$('#start_date').val(),
                value:$('#start_date').val(),
                scrollInput:false
            });
            $('#add-more').prop('disabled',false);
        });

    });
</script>
<h3><i class="fa fa-angle-right"></i>Create Trips
    <ul class="nav pull-right top-menu">
        <a href="/trips">
            <button type="button" class="btn btn-round btn-theme02 btn-sm"><i class="fa fa-angle-left"></i>
                Back</button>
        </a>
    </ul>
</h3>
<div class="col-lg-12">
    <div class="form-panel">
        <form class="form-horizontal style-form" method="post" action="{{route('trips.store')}}"
            enctype="multipart/form-data" autocomplete="off">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Trips Name: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="trips_name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Province:</label>
                <div class="col-sm-10">
                    <select class="form-control round-form" name="province_id" id="province" required>
                        @foreach ($pro as $province)
                        <option value="{{$province->province_id}}">{{$province->province_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Start Date:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="start_date" id="start_date" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">End Date:</label>
                <div class="col-sm-10">
                    <input type="text" disabled class="form-control round-form" name="end_date" id="end_date" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Amount:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control round-form" name="amount" required autocomplete>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Price:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control round-form" name="price" required autocomplete>
                </div>
            </div>
            @php
            $count = 1;
            @endphp
            <div class="form-group" id="form-line-trips">
                <div class="col-sm-12">
                    <button class="btn btn-round btn-theme04 btn-sm" disabled id="add-more" type="button">add
                        attractions</button>
                </div>
                <div class="form-inline">
                    {{-- <div class="form-group">
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-sm-4 control-label">Province:</label>
                        </div>
                    </div> --}}
                    {{-- <div class="form-group">
                        <div class="col-sm-10">
                            <select class="form-control round-form" id="province_att" required>
                                @foreach ($pro as $province)
                                <option value="{{$province->province_id}}">{{$province->province_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-sm-4 control-label">Attractions:</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <select class="form-control round-form tourist_dropdown" name="tourist_id[]" id="tourist" required>
                                @foreach ($atts as $att)
                                <option value="{{$att->tourist_id}}">{{$att->tourist_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-sm-2 control-label">Date:</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="text" class="form-control round-form"
                                name="date[]" required id="date0" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-sm-2 control-label">Time:</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="time" class="form-control round-form" name="time[]" required>
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
    function updateTourist(count = 0) {
                    $.ajax({
                        url:"{{route('trips.find')}}",
                        method: "GET",
                        data: {province_id:$('#province').val()},
                        dataType:"JSON",
                        indexValue: count,
                        success:function(data) {
                            console.log("Here");
                            if(this.indexValue == 0) {
                                $(".tourist_dropdown").empty();
                                if(Object.keys(data).length == 0) $(".tourist_dropdown").prop('disabled',true);
                                else {
                                    $(".tourist_dropdown").prop('disabled',false);
                                    for(var i=0;i<Object.keys(data).length;i++) {
                                        $(".tourist_dropdown").append(
                                            $('<option></option>').attr("value",""+data[i].tourist_id).html(""+data[i].tourist_name)
                                        );
                                    }
                                }
                            }
                            else {
                                $("#tourist_id"+this.indexValue).empty();
                                if(Object.keys(data).length == 0) $("#tourist_id"+this.indexValue).prop('disabled',true);
                                else {
                                    $(".tourist_dropdown").prop('disabled',false);
                                    for(var i=0;i<Object.keys(data).length;i++) {
                                        $("#tourist_id"+this.indexValue).append(
                                            $('<option></option>').attr("value",""+data[i].tourist_id).html(""+data[i].tourist_name)
                                        );
                                    }
                                }
                            }
                        }

                    });
                }
    $(document).ready(function(){
                    var i = 1;
                    $('#add-more').click(function(){

                        $('#form-line-trips').append("<div class=\"form-inline\" id=\"tourist_"+i+"\">"+
                            "<div class=\"form-group\">"+
                            "<div class=\"col-sm-10\">"+
                            "<label class=\"col-sm-2 col-sm-2 control-label\">Attractions:</label>"+
                            "</div>"+
                            "</div>"+
                            "<div class=\"form-group\">"+
                            "<div class=\"col-sm-10\">"+
                            "<select class=\"form-control round-form tourist_dropdown\" name=\"tourist_id[" + i + "] \" id=\"tourist_id"+i+"\" required>"+
                            "</select>"+
                            "</div>"+
                            "</div>"+
                            "<div class=\"form-group\">"+
                            "<div class=\"col-sm-10\">"+
                            "<label class=\"col-sm-2 col-sm-2 control-label\">Date:</label>"+
                            "</div>"+
                            "</div>"+
                            "<div class=\"form-group\">"+
                            "<div class=\"col-sm-10\">"+
                            " <input type=\"text\" class=\"form-control round-form\" name=\"date[" + i + "]\" id=\"date"+i+"\" required>"+
                            "</div>"+
                            "</div>"+
                            "<div class=\"form-group\">"+
                            "<div class=\"col-sm-10\">"+
                            "<label class=\"col-sm-2 col-sm-2 control-label\">Time:</label>"+
                            "</div>"+
                            "</div>"+
                            "<div class=\"form-group\">"+
                            "<div class=\"col-sm-10\">"+
                            " <input type=\"time\" class=\"form-control round-form\" name=\"time[" + i + "] \" required>"+
                            "</div>"+
                            "</div>"+
                            "<div class=\"form-group\">"+
                            "<div class=\"col-sm-10\">"+
                            "<button class=\"btn btn-warning btn-sm\" type=\"button\"onclick=\"$('#tourist_"+i+"').remove();i--;\">"+
                            "<i class=\"fa fa-times\" ></i></button>"+
                            "</div>"+
                            "</div>"+
                            "</div>");
                        $('<script>').attr('type', 'text/javascript')
                            .text(
                                "$('#start_date, #end_date').change(function(){if($('#start_date').val() == $('#end_date').val())setDate"+i+"();}); function setDate"+i+"(min=$('#start_date').val(),max=$('#end_date').val()){$('#date"+i+"').datetimepicker({format:'Y-m-d',timepicker:false,minDate:min,maxDate:max,defaultDate:min,value:min,scrollInput:false});} setDate"+i+"(); updateTourist("+i+");"
                            ).appendTo('head');
                        i++;
                    });
                $('#province').change(function(){
                    updateTourist();
                });

                updateTourist();



            });



</script>
@endsection
