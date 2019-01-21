@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-xl-12 order-xl-1">
	  <div class="card bg-secondary shadow">
	    <div class="card-header bg-white border-0">
	      <div class="row align-items-center">
	        <div class="col-8">
	          <h3 class="mb-0">Edit Service Category</h3>
	        </div>
	        <div class="col-4 text-right">
	          <a href="{{ route('categories.index') }}" class="btn btn-sm btn-danger">Cancel Creation</a>
	        </div>
	      </div>
	    </div>
	    <div class="card-body">
	    	{{-- Form to create new directorate --}}
	      <form action="{{ route('categories.update', $category->id) }}" method="POST">
	      	@csrf
	      	@method('PATCH')

	        <h6 class="heading-small text-muted mb-4">Service Category information</h6>
	        <div class="pl-lg-4">
	          <div class="row">
	            <div class="col-lg-12">
	              <div class="form-group">
	                <label class="form-control-label" for="name">Name</label>
	                <input type="text" id="name" name="name" class="form-control form-control-alternative" value="{{ $category->name }}">
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="pl-lg-4">
	          <div class="row">
	          	<div class="col">
	          		<div class="form-group">
		            	<button type="submit" class="btn btn-primary">Edit Service Category</button>
		            </div>
	          	</div>
	            
	          </div>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
</div>
@stop