@extends('layouts.admin')
@section('title', 'Help Desk Admin | Create Department')
@section('content')
<div class="row">

	<div class="col-lg-12">
		<form action="{{ route('departments.update', $department->id) }}" method="POST" class="form-horizontal">
			@csrf
			@method('PATCH')
			
			<div class="card">
				<div class="card-header">
				    <strong>Edit </strong> {{ $department->name }}
				</div>
				<div class="card-body card-block">
			    	<div class="row form-group">
			            <div class="col col-md-3">
			                <label for="directorate_id" class="form-control-label">Directorates</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="directorate_id" id="directorate_id" class="form-control">
			                    <option value="">Please Select a Directorate</option>
			                    @foreach($directorates as $directorate)
			                    	<option value="{{ $directorate->id }}" {{ $department->directorate_id === $directorate->id ? ' selected' : '' }}>{{ $directorate->name }}</option>
			                    @endforeach
			                </select>
			            </div>
			        </div>
			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="division_id" class="form-control-label">Division</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="division_id" id="division_id" class="form-control">
			                    <option value="">Please Select a Division</option>
			                    <option value="0" {{ $department->division_id === 0 ? ' selected' : '' }}>None</option>
			                    @foreach($divisions as $division)
			                    	<option value="{{ $division->id }}" {{ $department->division_id === $division->id ? ' selected' : '' }}>{{ $division->name }}</option>
			                    @endforeach
			                </select>
			            </div>
			        </div>
			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="name" class=" form-control-label">Department Name</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="name" name="name" class="form-control" value="{{ $department->name }}">
			                <small class="form-text text-muted">Enter the name of the department here</small>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="abv" class="form-control-label">Abbreviation</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="abv" name="abv" class="form-control" value="{{ $department->abv }}">
			            </div>
			        </div>
				</div>
				<div class="card-footer">
				    <button type="submit" class="btn btn-primary btn-sm">
				        <i class="fa fa-dot-circle-o"></i> Submit
				    </button>
				    <a href="{{ route('departments.index') }}" class="btn btn-danger btn-sm">
				    	<i class="fa fa-ban"></i> Cancel
				    </a>
				</div>
			</div>
		</div>
	</form>
</div>
@stop