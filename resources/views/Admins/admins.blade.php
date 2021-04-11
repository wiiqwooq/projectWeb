@extends('layouts.menuadmin')

@section('menuadmin')
<?php $i = 1; ?>
<h3><i class="fa fa-angle-right"></i>Manage Admins
    <ul class="nav pull-right top-menu">
        <a href="{{ route('admins.create')}}">
            <button type="button" class="btn btn-round btn-success btn-sm"><i class="fa fa-plus"></i> Add admin</button>
        </a>
    </ul>
</h3>
<div class="row">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Username</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$admin->fname}}</td>
                        <td>{{$admin->lname}}</td>
                        <td>{{$admin->phone}}</td>
                        <td>{{$admin->username}}</td>
                        <td>{{$admin->admin_status}}</td>
                        {{-- <td>
                            <a href="{{route('admins.edit',[$admin->admin_id])}}"><button
                                    class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                        </td> --}}
                        {{-- <td>
                            <form id="form_{{$admin->admin_id}}" class="form-inline" method="post"
                                action="{{route('admins.destroy',[$admin->admin_id])}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('delete')
                                <button type="button" class="btn btn-danger btn-xs"
                                    onclick="delete_{{$admin->admin_id}}()"><i class="fa fa-trash-o "></i></button>
                            </form>
                        </td> --}}
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('deleteadmin')
<script>
    @foreach($admins as $admin)
    function delete_{{$admin->admin_id}}() {
        swal({
  title: "Are you sure?",
  text: "Do you would like to delete {{$admin->username}} ?",
  icon: "warning",
  buttons: true,
  dangerMode: true
})
.then((willDelete) => {
  if (willDelete) {
    swal("{{$admin->username}} is deleted.", {
      icon: "success",
    }).then(()=>{
        document.getElementById('form_{{$admin->admin_id}}').submit();
    });
  }
});
    }
    @endforeach

</script>

@endsection
