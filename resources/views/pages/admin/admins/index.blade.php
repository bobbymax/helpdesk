@extends('layouts.admin')
@section('Title', 'Help Desk | Registered Admins')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Admins</h3>
  </div>
  <div class="col text-right">
    <a href="{{ route('admins.create') }}" class="btn btn-sm btn-primary">+ Create Admin</a>
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($admins->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Role</th>
                      <th>Created At</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($admins as $admin)
                    <tr>
                      <td>{{ $admin->name }}</td>
                      <td>{{ "Role Name" }}</td>
                      <td>/{{ $admin->created_at->format('d M') }}</td>
                      <td>
                        <form action="{{ route('admins.destroy', $admin->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a class="btn btn-sm btn-primary" href="{{ route('admins.edit', $admin->id) }}"><i class="fas fa-edit"></i></a>
                          <button class="btn btn-sm btn-danger" admin="submit"><i class="fas fa-trash"></i></button>
                          <a href="{{ route('assign.role', $admin->id) }}" class="btn btn-success btn-sm">Assign Role</a>
                        </form>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      @else
      <div class="hold">
        <p class="lead">There are no admins at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop