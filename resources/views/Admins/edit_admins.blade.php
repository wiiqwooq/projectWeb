@extends('layouts.menuadmin')

@section('menuadmin')
<h3><i class="fa fa-angle-right"></i>Edit Admins
    <ul class="nav pull-right top-menu">
        <a href="/admins">
            <button type="button" class="btn btn-round btn-theme02 btn-sm"><i class="fa fa-angle-left"></i>
                Back</button>
        </a>
    </ul>
</h3>
<div class="col-lg-12">
    <div class="form-panel">
        <form id="editAdmin" class="form-horizontal style-form" method="post" action="{{ route('admins.update', [$admin->admin_id])}}">
            {{ csrf_field() }}
            @method('put')
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">First Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="fname" value="{{$admin->fname}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Last Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="lname" value="{{$admin->lname}}"required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="username" value="{{$admin->username}}"required disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Phone:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="phone" value="{{$admin->phone}}"required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Admin Status:</label>
                <div class="col-sm-10">
                    @if ($admin->admin_status == "Enable")
                    <div class="radio">
                        <label>
                            <input type="radio" name="admin_status" value="Enable" checked >
                            Enable
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="admin_status" value="Disable">
                            Disable
                        </label>
                    </div>
                    @else
                    <div class="radio">
                        <label>
                            <input type="radio" name="admin_status" value="Enable">
                            Enable
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="admin_status" value="Disable" checked>
                            Disable
                        </label>
                    </div>

                    @endif

                </div>
            </div>
            <center>
                <button type="button" onclick="checkEdit()" class="btn btn-theme03 ">Edit</button>
            </center>
        </form>
    </div>
</div>
@endsection

@section('editadmin')
<script>
     
    function checkEdit() {
        swal({
  title: "Are you sure?",
  text: "Do you would like to edit {{$admin->fname}} {{$admin->lname}}?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then((willDelete) => {
  if (willDelete) {
    swal("{{$admin->fname}} {{$admin->lname}} is edited.", {
      icon: "success",
      buttons: false,
      timer: 2000,
    }).then(()=>{
        document.getElementById('editAdmin').submit();
    });
  }
});
}

</script>
@endsection
