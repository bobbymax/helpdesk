@extends('layouts.admin')
@section('title', 'Help Desk | Locations')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Locations</h3>
  </div>
  <div class="col text-right">
    <a href="{{ route('locations.create') }}" class="btn btn-sm btn-primary">+ Add an location</a>
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($locations->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>url</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($locations as $location)
                    <tr>
                      <td>{{ $location->name }}</td>
                      <td>/{{ $location->slug }}</td>
                      <td>
                        <form action="{{ route('locations.destroy', $location->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a class="btn btn-sm btn-primary" href="{{ route('locations.edit', $location->id) }}"><i class="fas fa-edit"></i></a>
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
        <p class="lead">There are no locations at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop