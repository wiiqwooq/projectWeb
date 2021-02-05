@extends('layouts.menuadmin')

@section('menuadmin')
            <h3><i class="fa fa-angle-right"></i>Create Admins
                <ul class="nav pull-right top-menu">
                    <a href="/admins">
                        <button type="button" class="btn btn-round btn-theme02 btn-sm"><i class="fa fa-angle-left"></i> Back</button>
                    </a>
                </ul>
            </h3>
            <div class="col-lg-12">
            <div class="form-panel">
            <form class="form-horizontal style-form" method="post" action="{{route('admins.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">First Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control round-form" name="fname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Last Name:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control round-form" name="lname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Username:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control round-form" name="username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Password:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control round-form" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Phone:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control round-form" name="phone">
                    </div>
                </div>
                <center>
                        <button type="submit" class="btn btn-theme03">Create</button>
                </center>
            </form>
            </div>
            </div>
       @endsection
