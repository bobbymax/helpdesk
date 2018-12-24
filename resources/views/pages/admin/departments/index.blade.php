@extends('layouts.master')
@section('title', 'Help Desk | Departments')
@section('content')
<!-- Table -->
<div class="row">
<div class="col">
  <div class="card shadow">
    <div class="card-header border-0">
    	<div class="row align-items-center">
    		<div class="col">
	    		<h3 class="mb-0">Departments</h3>
	    	</div>
	    	<div class="col text-right">
	    		<a href="{{ route('departments.create') }}" class="btn btn-sm btn-primary">+ Add A Department</a>
	    	</div>
    	</div>
    </div>
    @if($departments->count() > 0)
    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Department</th>
            <th scope="col">Directorate</th>
            <th scope="col">Code</th>
            <th scope="col">URL</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($departments as $department)
          <tr>
            <th scope="row">
              <div class="media align-items-center">
                <a href="#" class="avatar rounded-circle mr-3">
                  <img style="width:90%;" alt="Image placeholder" src="/assets/img/brand/director.png">
                </a>
                <div class="media-body">
                  <span class="mb-0 text-sm">{{ $department->name }}</span>
                </div>
              </div>
            </th>
            <td>
              {{ $department->directorate->name }}
            </td>
            <td>
              {{ $department->abv }}
            </td>
            <td>
            	/{{ $department->slug }}
            </td>
            <td class="text-right">
              <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <a class="dropdown-item" href="{{ route('departments.edit', $department->id) }}"><i class="fas fa-edit"></i> Edit</a>
                  <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
                  	@csrf
                  	@method('DELETE')
                  	<button class="dropdown-item" type="submit"><i class="fas fa-trash"></i> Delete</button>
                  </form>
                </div>
              </div>
            </td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
    @else
    	<div class="hold">
    		<p class="lead">There are no departments at the moment</p>
    	</div>
	@endif
  </div>
</div>
</div>
@stop