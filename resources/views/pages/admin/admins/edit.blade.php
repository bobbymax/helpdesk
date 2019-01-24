@extends('layouts.admin')
@section('title', 'Help Desk | Edit Admin')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('Add Roles for Admin') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('admins.update', $admin->id) }}">
                    @csrf
                    @method('PATCH')

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $admin->name }}" required autofocus>

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
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $admin->email }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row form-group">
                        <label for="" class="col-md-4 col-form-label text-md-right">Roles</label>
                        <div class="col-md-6">
                          <div class="form-check">
                            <div class="row">
                              @foreach($roles as $role)
                                <?php 
                                  $values = $admin->roles->toArray();
                                  $role_id = [];
                                  if($values) {
                                    foreach($values as $value) {
                                      $role_id[] = $value['id'];
                                    }
                                  }
                                ?>
                                <div class="col-md-4">
                                  <div class="checkbox">
                                    <label for="roles[]" class="form-check-label">
                                      <input type="checkbox" class="form-check-input" id="roles" name="roles[]" value="{{ $role->id }}" {{ in_array($role->id, $role_id) ? ' checked' : '' }}> {{ $role->name }}
                                    </label>
                                  </div>
                                </div>
                              @endforeach
                            </div>
                          </div>
                        </div>  
                      </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Records') }}
                            </button>
                            <a href="{{ route('admins.index') }}" class="btn btn-success">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop