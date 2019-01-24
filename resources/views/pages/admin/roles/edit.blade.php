@extends('layouts.admin')
@section('title', 'Help Desk Admin | Create Role')
@section('content')
<div class="row">

  <div class="col-lg-12">
    <form action="{{ route('roles.update', $role->id) }}" method="POST" class="form-horizontal">
            @csrf
            @method('PATCH')

      <div class="card">
        <div class="card-header">
            <strong>Edit this</strong> Role
        </div>
        <div class="card-body card-block">
            

              <div class="row form-group">
                  <div class="col col-md-3">
                      <label for="name" class=" form-control-label">Role Name</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <input type="text" id="name" name="name" class="form-control" value="{{ $role->name }}">
                  </div>
              </div>

              <div class="row form-group">
                <div class="col col-md-3">
                  <label for="" class="form-control-label">Permissions</label>
                </div>
                <div class="col-12 col-md-9">
                  <div class="form-check">
                    <div class="row">
                      @foreach($permissions as $permission)
                        <?php 
                          $values = $role->permissions->toArray();
                          $permission_id = [];
                          if($values) {
                            foreach($values as $value) {
                              $permission_id[] = $value['id'];
                            }
                          }
                        ?>
                        <div class="col-md-4">
                          <div class="checkbox">
                            <label for="permissions[]" class="form-check-label">
                              <input type="checkbox" class="form-check-input" id="permissions" name="permissions[]" value="{{ $permission->id }}" {{ in_array($permission->id, $permission_id) ? ' checked' : '' }}> {{ $permission->name }}
                            </label>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>  
              </div>


        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            <a href="{{ route('roles.index') }}" class="btn btn-danger btn-sm">
              <i class="fa fa-ban"></i> Cancel
            </a>
        </div>
      </div>
    </div>
  </form>
</div>
@stop