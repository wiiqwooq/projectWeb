@extends('layouts.menutrip')

@section('menutrip')

<script>
    $(document).ready(function(){
        $('#start_date').datetimepicker({
            format:'Y-m-d',
            timepicker:false,
            minDate:'+1970-01-01',
            scrollInput:false
        });
        $('#start_date').change(function(){
            $('#end_date').prop('disabled',false);

            if($('#end_date').val() != "" && $('#start_date').val() > $('#end_date').val()) {
                $('#end_date').datetimepicker({
                    value:$('#start_date').val()
                });
                <?php $count = 1;?>
                @foreach($infodetail as $info)
                $("#date{{$count}}").datetimepicker({
                    value:$('#start_date').val()
                });
                @endforeach
            }
        });
        $('#end_date').datetimepicker({
                format:'Y-m-d',
                timepicker:false,
                minDate:$('#start_date').val(),
                defaultDate:$('#start_date').val(),
                scrollInput:false
            });
        $('#end_date').change(function(){
            initdate();
            $('#add-more').prop('disabled',false);
        });
        function initdate(){
            <?php $count = 1;?>
            @foreach($infodetail as $info)
            $("#date{{$count}}").datetimepicker({
                format:'Y-m-d',
                timepicker:false,
                minDate:$('#start_date').val(),
                maxDate:$('#end_date').val(),
                defaultDate:$('#start_date').val(),
                scrollInput:false
            });
            <?php $count++; ?>
            @endforeach
        }
        initdate();
    });
</script>
<?php $count = 1; ?>
@foreach ($infodetail as $info)
<form method="post" action="{{route('trips.destroy',[$info->detail_id])}}" style="display: none;"
    id="delete_{{$info->detail_id}}">
    @method('DELETE')
    @csrf
</form>
<?php $count++; ?>
@endforeach
<h3><i class="fa fa-angle-right"></i>Edit Trips
    <ul class="nav pull-right top-menu">
        <a href="/trips">
            <button type="button" class="btn btn-round btn-theme02 btn-sm"><i class="fa fa-angle-left"></i>
                Back</button>
        </a>
    </ul>
</h3>
<div class="col-lg-12">
    <div class="form-panel">
        {{-- @foreach ($trips as $trip) --}}
        <form id="editTrips" class="form-horizontal style-form" method="post"
            action="{{route('trips.update',[$trips->trips_id])}}">
            {{ csrf_field() }}
            @method("put")
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Trips Name: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="trips_name" value="{{$trips->trips_name}}"
                        required autocomplete>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Province:</label>
                <div class="col-sm-10">
                    <select class="form-control round-form" name="province_id" id="province" required>
                        @foreach ($pro as $province)
                        <option value="{{$province->province_id}}"
                            {{($trips->province_id == $province->province_id?'selected':'')}}>
                            {{$province->province_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Trips Status:</label>
                <div class="col-sm-10">
                    @if ($trips->trips_status == "Available")
                    <div class="radio">
                        <label>
                            <input type="radio" name="trips_status" value="Enable">
                            Enable
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="trips_status" value="Disable">
                            Disable
                        </label>
                    </div>
                    @endif
                    @if ($trips->trips_status == "Enable")
                    <div class="radio">
                        <label>
                            <input type="radio" name="trips_status" value="Enable" checked>
                            Enable
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="trips_status" value="Disable">
                            Disable
                        </label>
                    </div>
                    @endif
                    @if($trips->trips_status == "Disable")
                    <div class="radio">
                        <label>
                            <input type="radio" name="trips_status" value="Enable">
                            Enable
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="trips_status" value="Disable" checked>
                            Disable
                        </label>
                    </div>
                    @endif

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Start Date:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="start_date" id="start_date"
                        value="{{$trips->start_date}}" required autocomplete>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">End Date:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="end_date" id="end_date"
                        value="{{$trips->end_date}}" required autocomplete>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Amount:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control round-form" name="amount" value="{{$trips->amount}}"
                        required autocomplete>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Price:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control round-form" name="price" value="{{$trips->price}}" required
                        autocomplete>
                </div>
            </div>
            {{-- @endforeach --}}

            <div class="form-group" id="form-line-trips">
                <div class="col-sm-12">
                    <button class="btn btn-round btn-info btn-sm" id="add-more" type="button">add attractions</button>
                </div>
                @php
                $count = 1;
                @endphp

                @foreach ($infodetail as $info)
                <div class="form-inline">
                    <input type="hidden" name="detail_id[]" value="{{$info->detail_id}}">
                    <div class="form-group">
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-sm-4 control-label">Attractions:</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <select class="form-control round-form" name="tourist_id[]" id="tourist" required>
                                @foreach ($atts as $att)
                                <option value="{{$att->tourist_id}}"
                                    {{($info->tourist_id == $att->tourist_id?'selected':'')}}>{{$att->tourist_name}}
                                </option>
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
                            <input type="text" class="form-control round-form" name="date[]" id="date{{$count}}"
                                value="{{$info->date}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-sm-2 control-label">Time:</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="time" class="form-control round-form" name="time[]" value="{{$info->time}}"
                                required autocomplete>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-theme04 btn-sm" type="button"
                                onclick="deleteTrips_{{$info->detail_id}}()"><i class="fa fa-trash-o "></i></button>
                        </div>
                    </div>
                </div>
                <?php $count++; ?>
                @endforeach
            </div>
            <center>
                <button type="button" onclick="checkEdit()" class="btn btn-warning">Edit</button>
            </center>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        var i = {{count($infodetail) + 1}};
        $('#add-more').click(function(){
            $('#form-line-trips').append("<div class=\"form-inline\" id=\"tourist_"+i+"\">"+
                "<div class=\"form-group\">"+
                "<div class=\"col-sm-10\">"+
                "<label class=\"col-sm-2 col-sm-2 control-label\">Attractions:</label>"+
                "</div>"+
                "</div>"+
                "<div class=\"form-group\">"+
                "<div class=\"col-sm-10\">"+
                "<select class=\"form-control round-form tourist_dropdown\" name=\"tourist_id[] \">"+
                "@foreach ($atts as $att)"+
                "<option value=\"{{$att->tourist_id}}\">{{$att->tourist_name}}</option>"+
                "@endforeach"+
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
                " <input type=\"text\" class=\"form-control round-form\" name=\"date[]\" id=\"date"+i+"\">"+
                "</div>"+
                "</div>"+
                "<div class=\"form-group\">"+
                "<div class=\"col-sm-10\">"+
                "<label class=\"col-sm-2 col-sm-2 control-label\">Time:</label>"+
                "</div>"+
                "</div>"+
                "<div class=\"form-group\">"+
                "<div class=\"col-sm-10\">"+
                " <input type=\"time\" class=\"form-control round-form\" name=\"time[] \">"+
                "</div>"+
                "</div>"+
                "<div class=\"form-group\">"+
                "<div class=\"col-sm-10\">"+
                "<button class=\"btn btn-warning btn-sm\" type=\"button\"onclick=\"$('#tourist_"+i+"').remove();i--;\">"+
                "<i class=\"fa fa-times\" ></i></button>"+
                "</div>"+
                "</div>"+
                "</div>");
                $('<script>')
                .attr('type', 'text/javascript')
                .text(
                    "$('#start_date, #end_date').change(function(){if($('#start_date').val() == $('#end_date').val())setDate"+i+"();}); function setDate"+i+"(min=$('#start_date').val(),max=$('#end_date').val()){$('#date"+i+"').datetimepicker({format:'Y-m-d',timepicker:false,minDate:min,maxDate:max,defaultDate:min,value:min,scrollInput:false});} setDate"+i+"();"
                )
                .appendTo('head');
            i++;
            //updateTourist();
        });

        $('#province').change(function(){
                    updateTourist();
                });

                updateTourist();
                function updateTourist() {
                    $.ajax({
                        url:"{{route('trips.find')}}",
                        method: "GET",
                        data: {province_id:$('#province').val()},
                        dataType:"JSON",
                        success:function(data) {
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
                    });
                }
    });

    function checkEdit() {
        swal({
  title: "Are you sure?",
  text: "Do you would like to edit {{$trips->trips_name}} ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then((willDelete) => {
  if (willDelete) {
    swal("กำลังตรวจสอบ", {
      icon: false,
      buttons: false,
      timer:1000,
    }).then(()=>{
        document.getElementById('editTrips').submit();
    });
  }
});
}
@if (session('fail'))
    swal({
  title: "{{session('fail')}}",
  icon: "error",
  button: "OK",
});
@endif
@if (session('success'))
    swal({
  title: "{{session('success')}}",
  icon: "success",
  button: "OK",
});
@endif

@foreach ($infodetail as $info)
function deleteTrips_{{$info->detail_id}}() {
        swal({
  title: "Are you sure?",
  text: "Do you would like to delete this attraction ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then((willDelete) => {
  if (willDelete) {
    swal("Attraction is deleted.", {
      icon: "success",
    }).then(()=>{
        document.getElementById('delete_{{$info->detail_id}}').submit();
    });
  }
});
}
@endforeach





</script>
@endsection
