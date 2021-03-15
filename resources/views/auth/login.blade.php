@extends('layouts.app')

@section('content')

<div id="login-page">
    <div class="container">

        <form class="form-login" method="POST" action="{{ route('login') }}">
            @csrf
            <h2 class="form-login-heading">sign in</h2>
            <div class="login-wrap">
                <input type="text" class="form-control" placeholder="Username" id="username" name="username" required autocomplete autofocus>
                <br>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password" required autocomplete>
                <br>
                <button class="btn btn-theme btn-block" href="index.html" type="submit" onclick="StatusLogin()"><i
                        class="fa fa-lock"></i> {{ __('Login') }}</button>
        </form>
    </div>
</div>
<script>
    function StatusLogin() {
    }
    @if (session('fail'))
    swal({
  title: "{{session('fail')}}",
  icon: "error",
  text: "คุณไม่มีสิทธิ์ในการเข้าใช้งาน",
  button: "OK",
});
    @endif

    @if (session('wrongPassword'))
    swal({
  title: "{{session('wrongPassword')}}",
  icon: "info",
  text: "กรุณาตรวจสอบความถูกต้องของข้อมูล",
  button: "OK",
});
    @endif
</script>
@endsection
