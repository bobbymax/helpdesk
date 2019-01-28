@extends('layouts.admin')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Divisions</h3>
  </div>
  <div class="col text-right">
    @can('create-divisions')
    <a href="{{ route('divisions.create') }}" class="btn btn-sm btn-primary">+ Add a Division</a>
    @endcan
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($divisions->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>Directorate</th>
                      <th>Name</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($divisions as $division)
                    <tr>
                      <td>{{ $division->directorate->name }}</td>
                      <td>{{ $division->name }}</td>
                      <td>
                        <form action="{{ route('divisions.destroy', $division->id) }}" method="POST">
                          @csrf
                          @method('DELETE')

                          @can('edit-divisions')
                          <a class="btn btn-sm btn-primary" href="{{ route('divisions.edit', $division->id) }}"><i class="fas fa-edit"></i></a>
                          @endcan
                          @can('delete-divisions')
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
        <p class="lead">There are no divisions at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop