@extends('layouts.admin')
@section('title', 'Help Desk | Departments')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Departments</h3>
  </div>
  <div class="col text-right">
    <a href="{{ route('departments.create') }}" class="btn btn-sm btn-primary">+ Add department</a>
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($departments->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>department</th>
                      <th>code</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($departments as $department)
                    <tr>
                      <td>{{ $department->name }}</td>
                      <td>{{ $department->abv }}</td>
                      <td>
                        <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a class="btn btn-sm btn-primary" href="{{ route('departments.edit', $department->id) }}"><i class="fas fa-edit"></i></a>
                          <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
          </table><br>

          {{ $departments->links() }}
      </div>
      @else
      <div class="hold">
        <p class="lead">There are no departments at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop