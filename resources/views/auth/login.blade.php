@extends('layouts.login')

@section('content')
<div class="container mt--8 pb-5">
  <div class="row justify-content-center">
    <div class="col-lg-5 col-md-7">
      <div class="card bg-secondary shadow border-0">
        <div class="card-header bg-transparent pb-5">
          <div class="text-muted text-center mt-2 mb-3"><h2>Welcome to Help Desk Portal</h2></div>
        </div>
        <div class="card-body px-lg-5 py-lg-5">

          <form role="form" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group mb-3">
              <div class="input-group input-group-alternative">

                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" type="email" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

              </div>
            </div>


            <div class="form-group">
              <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" type="password" name="password">

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
            </div>


            <div class="custom-control custom-control-alternative custom-checkbox">
              <input class="custom-control-input" id=" customCheckLogin" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <label class="custom-control-label" for=" customCheckLogin">
                <span class="text-muted">Remember me</span>
              </label>
            </div>


            <div class="text-center">
              <button type="submit" class="btn btn-primary my-4">Sign in</button>
            </div>
          </form>


        </div>
      </div>
      <div class="row mt-3">
        <div class="col-6">
            @if (Route::has('password.request'))
                <a class="text-light" href="{{ route('password.request') }}">
                    <small>{{ __('Forgot Password?') }}</small>
                </a>
            @endif
        </div>
      </div>
    </div>
  </div>
</div>
@stop
