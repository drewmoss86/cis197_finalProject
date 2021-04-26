@extends('layouts.app')

@section('pageTitle', 'Login')

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="{{ asset('/assets/css/login.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="container col-md-6">
        @include('includes/message')
        <form class="form-signin mt-5 text-center col" form method="POST" action="{{ route('login')}}">
          {{-- {!! Form::open(['class' => 'form-signin mt-5 text-center col', 'method' => 'POST', 'action' => 'LoginController@login]) !!} --}}
          @csrf
          <h1 class="h3 mb-3 pb-5">CERT Incident Management Tool</h1>
          <h2 class="h5 mb-3 font-weight-normal">Please sign in</h2>

          <div class="form-group row">
            <div class="col">
              <input id="username" type="username" placeholder="Username" class="login-form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
              @if ($errors->has('username'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('username') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <div class="col">
              <input id="password" type="password" placeholder="Password" class="login-form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
              @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col offset">
              <button type="submit" class="btn btn-lg btn-primary mt-5 btn-center sign-in">
                {{ __('Sign In') }}
              </button>
              <br>
                {{-- @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif --}}
            </div>
          </div>
          <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
        </form>
      </div>
    </div>
  </div>
@stop
