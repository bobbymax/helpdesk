@extends('layouts.admin')
@section('Title', 'Help Desk | Service Types')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Service Types</h3>
  </div>
  <div class="col text-right">
    @can('create-types')
    <a href="{{ route('types.create') }}" class="btn btn-sm btn-primary">+ Create Service Type</a>
    @endcan
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($types->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>Position</th>
                      <th>Name</th>
                      <th>Slug</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($types as $type)
                    <tr>
                      <td>{{ $type->position }}</td>
                      <td>{{ $type->name }}</td>
                      <td>/{{ $type->slug }}</td>
                      <td>
                        <form action="{{ route('types.destroy', $type->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          @can('edit-types')
                          <a class="btn btn-sm btn-primary" href="{{ route('types.edit', $type->id) }}"><i class="fas fa-edit"></i></a>
                          @endcan
                          @can('delete-types')
                          <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
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
        <p class="lead">There are no types at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop