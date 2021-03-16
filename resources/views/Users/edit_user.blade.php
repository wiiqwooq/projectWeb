@extends('layouts.menuuser')

@section('menuuser')
<h3><i class="fa fa-angle-right"></i>Edit Users
    <ul class="nav pull-right top-menu">
        <a href="/users">
            <button type="button" class="btn btn-round btn-theme02 btn-sm"><i class="fa fa-angle-left"></i>
                Back</button>
        </a>
    </ul>
</h3>
<div class="col-lg-12">
    <div class="form-panel">
        <form id="editUser" class="form-horizontal style-form" method="post" action="{{ route('users.update', [$user->user_id])}}">
            {{ csrf_field() }}
            @method('put')
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">First Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="fname" value="{{$user->fname}}" required disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Last Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="lname" value="{{$user->lname}}"required disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Username:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="username" value="{{$user->username}}"required disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Address:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="username" value="{{$user->address}}"required disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Phone:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="phone" value="{{$user->phone}}"required disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">User Status:</label>
                <div class="col-sm-10">
                    @if ($user->user_status == "Enable")
                    <div class="radio">
                        <label>
                            <input type="radio" name="user_status" value="Enable" checked >
                            Enable
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="user_status" value="Disable">
                            Disable
                        </label>
                    </div>
                    @else
                    <div class="radio">
                        <label>
                            <input type="radio" name="user_status" value="Enable">
                            Enable
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="user_status" value="Disable" checked>
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

@section('deleteuser')

<script>
    function checkEdit() {
        swal({
  title: "Are you sure?",
  text: "Do you would like to edit {{$user->fname}} {{$user->lname}}?",
  icon: "warning",
  buttons: true,
  dangerMode: true,
  }).then((willDelete) => {
  if (willDelete) {
    swal("{{$user->fname}} {{$user->lname}} is edited.", {
      icon: "success",
    }).then(()=>{
        document.getElementById('editUser').submit();
    });
  }
});
}
</script>

@endsection
