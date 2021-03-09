@extends('layouts.menutrip')

@section('menutrip')
<?php $count = 1; ?>
@foreach ($infodetail as $info)
<form  method="post" action="{{route('trips.destroy',[$info->detail_id])}}" style="display: none;"
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
        <form id="editTrips" class="form-horizontal style-form" method="post" action="{{route('trips.update',[$trips->trips_id])}}">
            {{ csrf_field() }}
            @method("put")
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Trips Name: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="trips_name" value="{{$trips->trips_name}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Province:</label>
                <div class="col-sm-10">
                    <select class="form-control round-form" name="province_id">
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
                            <input type="radio" name="trips_status" value="Available" checked>
                            Available
                        </label>
                    </div>
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
                            <input type="radio" name="trips_status" value="Available">
                            Available
                        </label>
                    </div>
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
                            <input type="radio" name="trips_status" value="Available">
                            Available
                        </label>
                    </div>
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
                    <input type="date" class="form-control round-form" name="start_date" value="{{$trips->start_date}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">End Date:</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control round-form" name="end_date" value="{{$trips->end_date}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Amount:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control round-form" name="amount" value="{{$trips->amount}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Price:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control round-form" name="price" value="{{$trips->price}}">
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
                            <label class="col-sm-2 col-sm-4 control-label">Attractions{{$count}}:</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <select class="form-control round-form" name="tourist_id[]">
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
                            <label class="col-sm-2 col-sm-2 control-label">Date{{$count}}:</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="date" class="form-control round-form" name="date[]" value="{{$info->date}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <label class="col-sm-2 col-sm-2 control-label">Time{{$count}}:</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="time" class="form-control round-form" name="time[]" value="{{$info->time}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-theme04 btn-sm" type="button"
                                onclick="deleteTrips_{{$info->detail_id}}()"><i
                                    class="fa fa-trash-o "></i></button>
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
        var i = {{count($infodetail)}};
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

    function checkEdit() {
        swal({
  title: "Are you sure?",
  text: "Do you would like to edit {{$trips->trips_name}} ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then((willDelete) => {
  if (willDelete) {
    swal("{{$trips->trips_name}} is edited.", {
      icon: "success",
    }).then(()=>{
        document.getElementById('editTrips').submit();
    });
  }
});
}

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
