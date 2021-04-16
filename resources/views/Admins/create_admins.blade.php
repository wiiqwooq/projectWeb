@extends('layouts.menuadmin')

@section('menuadmin')
<h3><i class="fa fa-angle-right"></i>Create Admins
    <ul class="nav pull-right top-menu">
        <a href="/admins">
            <button type="button" class="btn btn-round btn-theme02 btn-sm"><i class="fa fa-angle-left"></i>
                Back</button>
        </a>
    </ul>
</h3>
<div class="col-lg-12">
    <div class="form-panel">
        <form class="form-horizontal style-form" method="post" action="{{route('admins.store')}}"
            enctype="multipart/form-data" autocomplete="off">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">First Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="fname" oninvalid="this.setCustomValidity('Please fill in the correct information.')" oninput="this.setCustomValidity('')" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Last Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="lname" oninvalid="this.setCustomValidity('Please fill in the correct information.')" oninput="this.setCustomValidity('')" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="username" oninvalid="this.setCustomValidity('Please fill in the correct information.')" oninput="this.setCustomValidity('')" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Password:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control round-form" name="password" oninvalid="this.setCustomValidity('Please fill in the correct information.')" oninput="this.setCustomValidity('')" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Phone:</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control round-form" name="phone" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" placeholder="0812345678" oninvalid="this.setCustomValidity('Please fill in the correct information.')" oninput="this.setCustomValidity('')" required>
                </div>
            </div>
            <center>
                <button type="submit" onclick="StatusCreate()" class="btn btn-theme03">Create</button>
            </center>
        </form>
    </div>
</div>
<script>
    function StatusCreate() {
    }
    @if (session('fail'))
    swal({
  title: "{{session('fail')}}",
  icon: "error",
  text: "Please use new username.",
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
