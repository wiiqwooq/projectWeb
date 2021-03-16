@extends('layouts.menuadmin')

@section('menuadmin')

<h3><i class="fa fa-angle-right"></i>Edit Password Admins
    <ul class="nav pull-right top-menu">
        <a href="/admins">
            <button type="button" class="btn btn-round btn-theme02 btn-sm"><i class="fa fa-angle-left"></i>
                Back</button>
        </a>
    </ul>
</h3>
<div class="col-lg-12">
    <div class="form-panel">
        <form id="editAdmin" class="form-horizontal style-form" method="post" action="{{ route('admins.updatepassword', [$admin->admin_id])}}" >
            {{ csrf_field() }}
            @method('put')
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Old Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control round-form" name="oldpassword" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">New Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control round-form" name="newpassword" required>
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
  text: "Do you would like to edit password?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}).then((willDelete) => {
  if (willDelete) {
    swal("Processing...", {
      icon: false,
      buttons: false,
      timer: 1000,
    }).then(()=>{
        document.getElementById('editAdmin').submit();
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

</script>
@endsection
