@extends('layouts.menuuser')

@section('menuuser')
<h3><i class="fa fa-angle-right"></i>Manage Users</h3>
<div class="row">

    <div class="col-md-12">
        <div class="content-panel">

            <table class="table">
                <thead>
                    <tr>
                        <th>User_id</th>
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
                        <td>{{$user->user_id}}</td>
                        <td>{{$user->fname}}</td>
                        <td>{{$user->lname}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->addreess}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->user_status}}</td>
                        <td>
                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <! --/content-panel -->
    </div>
</div>
@endsection
