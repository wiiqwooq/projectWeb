@extends('layouts.menuattraction')

@section('menuatts')
<h3><i class="fa fa-angle-right"></i>Create Attractions
    <ul class="nav pull-right top-menu">
        <a href="/attractions">
            <button type="button" class="btn btn-round btn-theme02 btn-sm"><i class="fa fa-angle-left"></i>
                Back</button>
        </a>
    </ul>
</h3>
<div class="col-lg-12">
    <div class="form-panel">
        <form class="form-horizontal style-form" method="post" action="{{route('attractions.store')}}"
            enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Tourist Name: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-form" name="tourist_name">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Position:</label>
                <div class="col-sm-10">

                    <select class="form-control round-form" name="province_id">
                        @foreach ($pro as $province)
                        <option value="{{$province->province_id}}">{{$province->province_name}}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label">Image:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control round-form" name="image_name[]" multiple>
                </div>
            </div>

            <center>
                <button type="submit" class="btn btn-theme03">Create</button>
            </center>
        </form>
    </div>
</div>
@endsection
