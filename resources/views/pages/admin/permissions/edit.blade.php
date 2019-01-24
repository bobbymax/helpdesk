@extends('layouts.admin')
@section('title', 'Help Desk Admin | Create Permission')
@section('content')
<div class="row">

  <div class="col-lg-12">
    <form action="{{ route('permissions.update', $permission->id) }}" method="POST" class="form-horizontal">
            @csrf
            @method('PATCH')

      <div class="card">
        <div class="card-header">
            <strong>Edit this</strong> Permission
        </div>
        <div class="card-body card-block">
            

              <div class="row form-group">
                  <div class="col col-md-3">
                      <label for="name" class=" form-control-label">Permission Name</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <input type="text" id="name" name="name" class="form-control" value="{{ $permission->name }}">
                  </div>
              </div>


        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            <a href="{{ route('permissions.index') }}" class="btn btn-danger btn-sm">
              <i class="fa fa-ban"></i> Cancel
            </a>
        </div>
      </div>
    </div>
  </form>
</div>
@stop