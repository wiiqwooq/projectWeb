@extends('layouts.menuadmin')

@section('menuadmin')
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
                        <th>Admin_id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td>{{$admin->admin_id}}</td>
                        <td>{{$admin->fname}}</td>
                        <td>{{$admin->lname}}</td>
                        <td>{{$admin->phone}}</td>
                        <td>{{$admin->username}}</td>
                        <td>{{$admin->admin_status}}</td>
                        <td>
                            <a href="{{route('admins.edit',[$admin->admin_id])}}"><button
                                    class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                            {{-- <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i></button> --}}
                        </td>
                        <td>
                            <form class="form-inline" method="post"
                                action="{{route('admins.destroy',[$admin->admin_id])}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-xs"><i
                                        class="fa fa-trash-o "></i></button>
                            </form>
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
