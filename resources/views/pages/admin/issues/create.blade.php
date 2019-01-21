@extends('layouts.admin')
@section('title', 'Help Desk Admin | Create Issue')
@section('content')
<div class="row">

	<div class="col-lg-12">
		<form action="{{ route('issues.store') }}" method="POST" class="form-horizontal">
			    	@csrf
			<div class="card">
				<div class="card-header">
				    <strong>Basic Form</strong> Elements
				</div>
				<div class="card-body card-block">
			    	<div class="row form-group">
			            <div class="col col-md-3">
			                <label for="category_id" class=" form-control-label">Category Type</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="category_id" id="category_id" class="form-control">
			                    <option value="">Please Select Category</option>
			                    @foreach($categories as $category)
			                    	<option value="{{ $category->id }}">{{ $category->name }}</option>
			                    @endforeach
			                </select>
			            </div>
			        </div>
			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="name" class=" form-control-label">Issue Name</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="name" name="name" placeholder="Issue Name" class="form-control">
			                <small class="form-text text-muted">Enter the name of the issue</small>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="issues" class=" form-control-label">Issues</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <textarea name="issues" id="issues" rows="9" placeholder="List Various Issues..." class="form-control"></textarea>
			            </div>
			        </div>
				</div>
				<div class="card-footer">
				    <button type="submit" class="btn btn-primary btn-sm">
				        <i class="fa fa-dot-circle-o"></i> Submit
				    </button>
				    <a href="{{ route('issues.index') }}" class="btn btn-danger btn-sm">
				    	<i class="fa fa-ban"></i> Cancel
				    </a>
				</div>
			</div>
		</div>
	</form>
</div>
@stop