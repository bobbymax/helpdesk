@extends('layouts.login')

@section('content')
<div class="login-wrap">
  <div class="login-content">
      <div class="login-logo">
          <a href="#">
              <img src="/images/icon/logo.png" alt="CoolAdmin">
          </a>
      </div>
      <div class="login-form">
          <form role="form" action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group">
                  <label>Email Address</label>
                  <input class="au-input au-input--full{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" placeholder="Email">

                  @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                  @endif
              </div>

              <div class="form-group">
                  <label>Password</label>
                  <input class="au-input au-input--full{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Password">
                  @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                  @endif
              </div>
              <div class="login-checkbox">
                  <label>
                      <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
                  </label>
                  <label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                    @endif
                  </label>
              </div>
              <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
          </form>
      </div>
  </div>
</div>
@stop
