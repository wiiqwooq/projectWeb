@extends('layouts.menuuser')

@section('menuuser')
<?php $i = 1; ?>
<h3><i class="fa fa-angle-right"></i>Manage Users</h3>
<div class="row">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$user->fname}}</td>
                        <td>{{$user->lname}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->user_status}}</td>
                        <td>
                            <a href="{{route('users.edit',[$user->user_id])}}">
                                <button class="btn btn-primary btn-xs" type="submit"><i class="fa fa-pencil"></i></button>
                            </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
        <! --/content-panel -->
    </div>
</div>
@endsection
@section('deleteuser')

<script>
    @foreach($users as $user)
    function delete_{{$user->user_id}}() {
        swal({
            title: "Are you sure?",
            text: "Do you would like to delete {{$user->fname}} {{$user->lname}}?",
            icon: "warning",
            buttons: true,
            dangerMode: true
        })
        .then((willDelete) => {
            if (willDelete) {
            swal("{{$user->fname}} {{$user->lname}} is deleted.", {
            icon: "success",
        })
        .then(()=>{
            document.getElementById('deleteUser_{{$user->user_id}}').submit();
        });
        }
        });
    }
    @endforeach

</script>

@endsection
