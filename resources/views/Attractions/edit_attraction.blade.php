@extends('layouts.menuattraction')

@section('menuatts')
<h3><i class="fa fa-angle-right"></i>Edit Attractions
    <ul class="nav pull-right top-menu">
        <a href="/attractions">
            <button type="button" class="btn btn-round btn-theme02 btn-sm"><i class="fa fa-angle-left"></i>
                Back</button>
        </a>
    </ul>
</h3>
<div class="col-lg-12">
    <div class="form-panel">
        <form id="editAttraction" class="form-horizontal style-form" method="post"
            action="{{route('attractions.update', [$atts->tourist_id])}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method("put")
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Tourist Name: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="tourist_name"
                        value="{{$atts->tourist_name}}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Position:</label>
                <div class="col-sm-10">
                    <select class="form-control round-form" name="province_id" disabled>
                        @foreach ($pro as $position)
                        <option value="{{$position->province_id}}"
                            {{($atts->province_id == $position->province_id?'selected':'')}}>
                            {{$position->province_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Attraction Status:</label>
                <div class="col-sm-10">
                    @if ($atts->tourist_status == "Available")
                    <div class="radio">
                        <label>
                            <input type="radio" name="tourist_status" value="Enable">
                            Enable
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="tourist_status" value="Disable">
                            Disable
                        </label>
                    </div>
                    @endif
                    @if ($atts->tourist_status == "Enable")
                    <div class="radio">
                        <label>
                            <input type="radio" name="tourist_status" value="Enable" checked>
                            Enable
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="tourist_status" value="Disable">
                            Disable
                        </label>
                    </div>
                    @endif
                    @if($atts->tourist_status == "Disable")
                    <div class="radio">
                        <label>
                            <input type="radio" name="tourist_status" value="Enable">
                            Enable
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="tourist_status" value="Disable" checked>
                            Disable
                        </label>
                    </div>
                    @endif

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Image:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control round-form" name="image_name[]" multiple>
                    </br>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>image</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($imgs as $img)
                            <tr>
                                <td><img src="/images/{{$img->image_name}}" width="50" height="50"></td>
                                <td>
                                    <button form="deleteForm" onclick="deleteImage_{{$img->image_id}}()"
                                        class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>

                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <center>
                <button type="button" onclick="checkEdit();" class="btn btn-theme03">Edit</button>
            </center>
        </form>
    </div>
</div>
@foreach ($imgs as $img)
<form id="deleteForm_{{$img->image_id}}" class="form-inline" method="post" action="/deleteimg/{{$img->image_id}}">
    {{ csrf_field() }}
    @method('DELETE')
</form>
@endforeach
@endsection
@section('deletetourist')
<script>
    function checkEdit() {
        swal({
  title: "Are you sure?",
  text: "Do you would like to edit {{$atts->tourist_name}} ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then((willDelete) => {
  if (willDelete) {
    swal("{{$atts->tourist_name}} is edited.", {
      icon: "success",
    }).then(()=>{
        document.getElementById('editAttraction').submit();
    });
  }
});
}

@foreach ($imgs as $img)
function deleteImage_{{$img->image_id}}() {
        swal({
  title: "Are you sure?",
  text: "Do you would like to delete this picture ?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then((willDelete) => {
  if (willDelete) {
    swal("picture is deleted.", {
      icon: "success",
    }).then(()=>{
        document.getElementById('deleteForm_{{$img->image_id}}').submit();
    });
  }
});
}
@endforeach
</script>

@endsection
