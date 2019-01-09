@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-xl-12 order-xl-1">
	  <div class="card bg-secondary shadow">
	    <div class="card-header bg-white border-0">
	      <div class="row align-items-center">
	        <div class="col-8">
	          <h3 class="mb-0">Generate Report for Ticket</h3>
	        </div>
	        <div class="col-4 text-right">
	          <a href="{{ route('admin.tickets.index') }}" class="btn btn-sm btn-danger">Cancel Creation</a>
	        </div>
	      </div>
	    </div>
	    <div class="card-body">
	    	{{-- Form to create new directorate --}}
	      <form action="{{ route('admin.report.store', $ticket->id) }}" method="POST">
	      	@csrf

	        <h6 class="heading-small text-muted mb-4">Issue Ticket</h6>
	        <div class="pl-lg-4">
	          <div class="row">
	            <div class="col-lg-6">
	              <div class="form-group">
	                <label class="form-control-label" for="category_id">Select Service Category</label>
	                <select name="category_id" id="category_id" class="form-control form-control-alternative">
	                	<option value="">Select a Category</option>
	                	@foreach($categories as $category)
	                		<option value="{{ $category->id }}" {{ $ticket->category_id === $category->id ? ' selected' : '' }}>{{ $category->name }}</option>
	                	@endforeach
	                </select>
	              </div>
	            </div>
	            <div class="col-lg-6">
	              <div class="form-group">
	                <label class="form-control-label" for="assigned_to">Assigned To</label>
	                <input type="text" name="assigned_to" id="assigned_to" class="form-control form-control-alternative" value="{{ $ticket->assigned_to }}">
	              </div>
	            </div>
	          </div>
	          <div class="row">
	          	<div class="col-lg-12">
	          		<div class="form-group">
		                <label class="form-control-label" for="description">Description</label>
		                <textarea name="description" class="form-control form-control-alternative" id="description"></textarea>
		             </div>
	          	</div>
	          </div>
	        </div>
	        <div class="pl-lg-4">
	          <div class="row">
	          	<div class="col">
	          		<div class="form-group">
		            	<button type="submit" class="btn btn-primary">Generate Report</button>
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