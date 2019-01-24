@extends('layouts.admin')
@section('title', 'Help Desk Admin | Create Service')
@section('content')
<div class="row">

	<div class="col-lg-12">
		<form action="{{ route('services.store') }}" method="POST" class="form-horizontal">
			    	@csrf

			<div class="card">
				<div class="card-header">
				    <strong>Create New</strong> Service
				</div>
				<div class="card-body card-block">
			    	<div class="row form-group">
			            <div class="col col-md-3">
			                <label for="division_id" class=" form-control-label">Division</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="division_id" id="division_id" class="form-control">
			                    <option value="">Please Select Division</option>
			                    <option value="0">None</option>
			                    @foreach($divisions as $division)
			                    	<option value="{{ $division->id }}">{{ $division->name }}</option>
			                    @endforeach
			                </select>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="department_id" class=" form-control-label">Department</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="department_id" id="department_id" class="form-control">
			                    <option value="">Please Select Department</option>
			                    <option value="0">None</option>
			                    @foreach($departments as $department)
			                    	<option value="{{ $department->id }}">{{ $department->name }}</option>
			                    @endforeach
			                </select>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="type_id" class=" form-control-label">Service Type</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="type_id" id="type_id" class="form-control">
			                    <option value="">Please Select Service Type</option>
			                    @foreach($types as $type)
			                    	<option value="{{ $type->id }}">{{ $type->name }}</option>
			                    @endforeach
			                </select>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="description" class=" form-control-label">Description</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <textarea name="description" id="description" rows="10" class="form-control"></textarea>
			            </div>
			        </div>
				</div>
				<div class="card-footer">
				    <button type="submit" class="btn btn-primary btn-sm">
				        <i class="fa fa-dot-circle-o"></i> Submit
				    </button>
				    <a href="{{ route('services.index') }}" class="btn btn-danger btn-sm">
				    	<i class="fa fa-ban"></i> Cancel
				    </a>
				</div>
			</div>
		</div>
	</form>
</div>
@stop