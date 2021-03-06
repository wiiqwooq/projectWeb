@extends('layouts.menuconfirm')

@section('menuconfirm')
<?php $i = 1; ?>
<h3><i class="fa fa-angle-right"></i>Confirm Payments</h3>
<div class="row">

    <div class="col-md-12">
        <div class="content-panel">

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Account_number</th>
                        <th>Receipt</th>
                        <th>Date</th>
                        <th>Total price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($confirms as $confirm)
                    <tr>

                        <td>{{$i}}</td>
                        <td>{{$confirm->account_number}}</td>
                        <td><a href="/images/{{$confirm->reciept}}" data-fancybox="slip"><img
                                    src="/images/{{$confirm->reciept}}" width="60"></a></td>
                        <td>{{$confirm->date}}</td>
                        <td>{{$confirm->total_price}}</td>
                        <td>
                            <form id="formconfirm_{{$confirm->confirm_id}}" class="form-inline" method="post"
                                action="{{ route('confirm.update',[$confirm->confirm_id])}}">
                                {{ csrf_field() }}
                                @method("put")
                                <button class="btn btn-success btn-xs" type="button"
                                    onclick="confirm_{{$confirm->confirm_id}}()"><i>
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                                        </svg>
                                    </i></button>
                            </form>
                        </td>
                        <td>
                            <form id="formdelete_{{$confirm->confirm_id}}" class="form-inline" method="post"
                                action="{{route('confirm.destroy',[$confirm->confirm_id])}}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('delete')
                                <button class="btn btn-danger btn-xs"type="button" onclick="delete_{{$confirm->confirm_id}}()"><i>
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg>
                                    </i></button>
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

@section('manageconfirm')
<script>
    @foreach($confirms as $confirm)
    function confirm_{{$confirm->confirm_id}}() {
        swal({
  title: "Are you sure?",
  text: "Do you would like to confirm this confirmation?",
  icon: "info",
  buttons: true,
  dangerMode: true
})
.then((willDelete) => {
  if (willDelete) {
    swal("Confirmation is confirmed.", {
      icon: "success",
    }).then(()=>{
        document.getElementById('formconfirm_{{$confirm->confirm_id}}').submit();
    });
  }
});
    }
    function delete_{{$confirm->confirm_id}}() {
        swal({
  title: "Are you sure?",
  text: "Do you would like to delete this confirmation?",
  icon: "warning",
  buttons: true,
  dangerMode: true
})
.then((willDelete) => {
  if (willDelete) {
    swal("Confirmation is deleted.", {
      icon: "success",
    }).then(()=>{
        document.getElementById('formdelete_{{$confirm->confirm_id}}').submit();
    });
  }
});
    }
    @endforeach

</script>

@endsection
