@extends('layouts.admin')
@section('title', 'Help Desk | Profile')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('My Profile') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('update.profile') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Upload Avatar') }}</label>

                        <div class="col-md-6">
                            <input type="file" id="avatar" name="avatar" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" autofocus>

                            @if ($errors->has('avatar'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('avatar') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Records') }}
                            </button>
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-success">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop