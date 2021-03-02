@extends('layouts.menutrip')

@section('menutrip')
<?php $i = 1; ?>
<h3><i class="fa fa-angle-right"></i>Manage Trips
    <ul class="nav pull-right top-menu">
        <a href="{{ route('trips.create') }}">
            <button type="button" class="btn btn-round btn-success btn-sm"><i class="fa fa-plus"></i> Add trips</button>
        </a>
    </ul>
</h3>
<div class="row">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Trip Name</th>
                        <th>Province</th>
                        <th>Start_date</th>
                        <th>End_date</th>
                        <th>Amount</th>
                        <th>Price/person</th>
                        <th>Status</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trips as $trip)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$trip->trips_name}}</td>
                        <td>{{$trip->province_name}}</td>
                        <td>{{$trip->start_date}}</td>
                        <td>{{$trip->end_date}}</td>
                        <td>{{$trip->amount}}</td>
                        <td>{{$trip->price}}</td>
                        <td>{{$trip->trips_status}}</td>
                        <td>
                            <a href="{{route('trips.show',[$trip->trips_id])}}"><button
                                    class="btn btn-warning btn-xs"><i class="fa fa-info-circle"></i></button></a>
                        </td>
                        <td>
                            <a href="{{route('trips.edit',[$trip->trips_id])}}"><button
                                    class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                        </td>
                        <td>
                            <form id="form_{{$trip->trips_id}}" class="form-inline"
                                action="{{route('trips.delete',['id' => $trip->trips_id])}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-xs" type="button"
                                    onclick="delete_{{$trip->trips_id}}()"><i class="fa fa-trash-o "></i></button>
                            </form>
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

@section('deletetrip')
<script>
    @foreach($trips as $trip)
    function delete_{{$trip->trips_id}}() {
        swal({
  title: "Are you sure?",
  text: "Do you would like to delete {{$trip->trips_name}} ?",
  icon: "warning",
  buttons: true,
  dangerMode: true
})
.then((willDelete) => {
  if (willDelete) {
    swal("{{$trip->trips_name}} is deleted.", {
      icon: "success",
    }).then(()=>{
        document.getElementById('form_{{$trip->trips_id}}').submit();
    });
  }
});
    }
    @endforeach

</script>
@endsection
