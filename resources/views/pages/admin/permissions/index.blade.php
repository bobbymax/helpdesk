@extends('layouts.admin')
@section('Title', 'Help Desk | Permissions')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">permissions</h3>
  </div>
  <div class="col text-right">
    @can('create-permissions')
    <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary">+ Create Permission</a>
    @endcan
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($permissions->count() > 0)
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
                  @foreach($permissions as $permission)
                    <tr>
                      <td>{{ $permission->name }}</td>
                      <td>
                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          @can('edit-permissions')
                          <a class="btn btn-sm btn-primary" href="{{ route('permissions.edit', $permission->id) }}"><i class="fas fa-edit"></i></a>
                          @endcan
                          @can('delete-permissions')
                          <button class="btn btn-sm btn-danger" permission="submit"><i class="fas fa-trash"></i></button>
                          @endcan
                        </form>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      @else
      <div class="hold">
        <p class="lead">There are no permissions to display at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop