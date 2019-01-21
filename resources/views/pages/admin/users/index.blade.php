@extends('layouts.admin')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Users</h3>
  </div>
  <div class="col text-right">
    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">+ Create User</a>
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($users->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td>
                        <a href="#" onclick="return false;" class="btn btn-sm btn-primary">
                          {{ $user->name }}
                        </a>
                      </td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->profile->department->name }}</td>
                      <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a class="btn btn-sm btn-primary" href="{{ route('users.edit', $user->id) }}"><i class="fas fa-edit"></i></a>
                          <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      @else
      <div class="hold">
        <p class="lead">There are no users at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop