@extends('layouts.admin')
@section('Title', 'Help Desk | Services')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Service services</h3>
  </div>
  <div class="col text-right">
    @can('create-services')
    <a href="{{ route('services.create') }}" class="btn btn-sm btn-primary">+ Create Service</a>
    @endcan
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($services->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>Description</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($services as $service)
                    <tr>
                      <td>{{ $service->description }}</td>
                      <td>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          @can('edit-services')
                          <a class="btn btn-sm btn-primary" href="{{ route('services.edit', $service->id) }}"><i class="fas fa-edit"></i></a>
                          @endcan
                          @can('delete-services')
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
        <p class="lead">There are no services at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop