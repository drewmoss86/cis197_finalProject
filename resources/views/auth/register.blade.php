@extends('layouts.app')

@section('pageTitle', 'Register')

<!-- Scripts -->
<script src="{{ asset('/assets/js/register.js') }}" async></script>

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      @include('includes/message')
      <div class="card">
        <div class="card-header">{{ __('Register') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
          {{-- {!! Form::open(['action' => 'RegisterController@register', 'method' => 'POST']) !!} --}}
            @csrf
            {{-- Enter Full Name --}}
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

              <div class="col-md-6">
                <input id="name" type="text" placeholder="Full name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            {{-- Enter Username --}}
            <div class="form-group row">
              <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

              <div class="col-md-6">
                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                <div id="uname_response" class="response" style="display: none;"></div>
                @if ($errors->has('username'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('username') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            {{-- Upload user icon image --}}
            <div class="form-group row">
              <label for="user_icon" class="col-md-4 col-form-label text-md-right">{{ __('User Icon') }}</label>

              <div class="col-md-6">
                <input name="user_icon" id="userImage-id" type="file" autofocus>
                {{-- <input id="userImage-id" type="file" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus> --}}

                {{-- @if ($errors->has('username'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('username') }}</strong>
                  </span>
                @endif --}}
              </div>
            </div>

            {{-- Select User type --}}
            <div class="form-group row">
              <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>

              <div class="col-md-6">
                <select class="btn btn-secondary dropdown-toggle" id="inlineFormCategory" aria-expanded="false" name="user_type" required>
                  <option value="" selected>Choose...</option>
                  <option value="cimtUser">CIMT User</option>
                  <option value="resourceProvider">Resource Provider</option>
                  <option value="admin">Admin</option>
                </select>
              </div>
            </div>

            {{-- Enter Address --}}
            <div class="form-group row">
              <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

              <div class="col-md-6">
                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" autofocus>

                @if ($errors->has('address'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('address') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            {{-- Enter Phone --}}
            <div class="form-group row">
              <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
              {{-- regex for phone nnn-nnn-nnnn  ^[2-9]\d{2}-\d{3}-\d{4}$ --}}
              <div class="col-md-6">
                <input id="phone" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" maxlength="10" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" autofocus>

                @if ($errors->has('phone'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('phone') }}</strong>
                  </span>
                @endif
              </div>
            </div>

           <!-- TODO: Set correct user field requirements -->
           {{-- Enter Email --}}
            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            {{-- Enter Password --}}
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" placeholder="Min 5-character password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

              <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Register') }}
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
