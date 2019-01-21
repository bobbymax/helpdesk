@extends('layouts.admin')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Directorates</h3>
  </div>
  <div class="col text-right">
    <a href="{{ route('directorates.create') }}" class="btn btn-sm btn-primary">+ Add Directorate</a>
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($directorates->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>directorate</th>
                      <th>code</th>
                      <th>url</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($directorates as $directorate)
                    <tr>
                      <td>{{ $directorate->name }}</td>
                      <td>{{ $directorate->abv }}</td>
                      <td>/{{ $directorate->slug }}</td>
                      <td>
                        <form action="{{ route('directorates.destroy', $directorate->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a class="btn btn-sm btn-primary" href="{{ route('directorates.edit', $directorate->id) }}"><i class="fas fa-edit"></i></a>
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
        <p class="lead">There are no directorates at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop