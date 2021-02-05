@extends('layouts.menuattraction')

@section('menuatts')
            <h3><i class="fa fa-angle-right"></i>Manage Attractions
                <ul class="nav pull-right top-menu">
                    <a href="{{ route('attractions.create') }}">
                        <button type="button" class="btn btn-round btn-success btn-sm"><i class="fa fa-plus"></i> Add attractions</button>
                    </a>
                </ul>
            </h3>
              <div class="row">

                    <div class="col-md-12">
                          <div class="content-panel">

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Tourist_id</th>
                                    <th>Tourist Name</th>
                                    <th>Position</th>
                                    <th>Tourist_Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($att as $atts)
                                    <tr>
                                        <td>{{$atts->tourist_id}}</td>
                                        <td>{{$atts->tourist_name}}</td>
                                        <td>{{$atts->province_name}}</td>
                                        <td>{{$atts->tourist_status}}</td>
                                        <td>
                                            <a href="{{route('attractions.edit',[$atts->tourist_id])}}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        </td>
                                        <td>
                                        <form class="form-inline" method="post" action="{{route('attractions.destroy',[$atts->tourist_id])}}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                        </form>
                                    </td>
                                    </tr>
                                        @endforeach

                                </tbody>
                            </table>
                        </div><! --/content-panel -->
                    </div>
                </div>
        @endsection
