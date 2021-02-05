@extends('layouts.app')

@section('content')

<div id="login-page">
    <div class="container">

        <form class="form-login"  method="POST" action="{{ route('login') }}">
            @csrf
          <h2 class="form-login-heading">sign in</h2>
          <div class="login-wrap">
              <input type="text" class="form-control" placeholder="Username" id="username" name="username" autofocus>
              @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              <br>
              <input type="password" class="form-control" placeholder="Password" id="password"  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              @error('password')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
              <br>
              <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i>  {{ __('Login') }}</button>
        </form>
    </div>
</div>
@endsection
