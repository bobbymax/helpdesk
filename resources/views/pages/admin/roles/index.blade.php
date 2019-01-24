@extends('layouts.admin')
@section('Title', 'Help Desk | Roles')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Roles</h3>
  </div>
  <div class="col text-right">
    <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">+ Create Role</a>
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($roles->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($roles as $role)
                    <tr>
                      <td>{{ $role->name }}</td>
                      <td>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a class="btn btn-sm btn-primary" href="{{ route('roles.edit', $role->id) }}"><i class="fas fa-edit"></i></a>
                          <button class="btn btn-sm btn-danger" role="submit"><i class="fas fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      @else
      <div class="hold">
        <p class="lead">There are no roles to display at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop