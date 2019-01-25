@extends('layouts.admin')
@section('Title', 'Help Desk | Menus')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Menus</h3>
  </div>
  <div class="col text-right">
    <a href="{{ route('menus.create') }}" class="btn btn-sm btn-primary">+ Create Menu</a>
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($menus->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Route</th>
                      <th>Permission</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($menus as $menu)
                    <tr>
                      <td>{{ $menu->name }}</td>
                      <td>{{ $menu->guard }}</td>
                      <td>{{ $menu->permission }}</td>
                      <td>
                        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a class="btn btn-sm btn-primary" href="{{ route('menus.edit', $menu->id) }}"><i class="fas fa-edit"></i></a>
                          <button class="btn btn-sm btn-danger" menu="submit"><i class="fas fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      @else
      <div class="hold">
        <p class="lead">There are no menus to display at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop