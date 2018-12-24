@extends('layouts.master')
@section('content')
<!-- Table -->
<div class="row">
<div class="col">
  <div class="card shadow">
    <div class="card-header border-0">
    	<div class="row align-items-center">
    		<div class="col">
	    		<h3 class="mb-0">Directorates</h3>
	    	</div>
	    	<div class="col text-right">
	    		<a href="{{ route('directorates.create') }}" class="btn btn-sm btn-primary">+ Add Directorate</a>
	    	</div>
    	</div>
    </div>
    @if($directorates->count() > 0)
    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Directorate</th>
            <th scope="col">Code</th>
            <th scope="col">URL</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($directorates as $directorate)
          <tr>
            <th scope="row">
              <div class="media align-items-center">
                <a href="#" class="avatar rounded-circle mr-3">
                  <img style="width:90%;" alt="Image placeholder" src="/assets/img/brand/director.png">
                </a>
                <div class="media-body">
                  <span class="mb-0 text-sm">{{ $directorate->name }}</span>
                </div>
              </div>
            </th>
            <td>
              {{ $directorate->abv }}
            </td>
            <td>
            	/{{ $directorate->slug }}
            </td>
            <td class="text-right">
              <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <a class="dropdown-item" href="{{ route('directorates.edit', $directorate->id) }}">Edit</a>
                  <form action="{{ route('directorates.destroy', $directorate->id) }}" method="POST">
                  	@csrf
                  	@method('DELETE')
                  	<button class="dropdown-item" type="submit">Delete</button>
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
    		<p class="lead">There are no directorates at the moment</p>
    	</div>
	@endif
  </div>
</div>
</div>
@stop