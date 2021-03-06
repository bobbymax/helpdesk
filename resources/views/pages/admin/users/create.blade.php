@extends('layouts.admin')
@section('title', 'Help Desk Admin | Create User')
@section('content')
<div class="row">

	<div class="col-lg-12">
		<form action="{{ route('users.store') }}" method="POST" class="form-horizontal">
			    	@csrf

			<div class="card">
				<div class="card-header">
				    <strong>Create New</strong> User
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
			                <label for="location_id" class=" form-control-label">Location</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="location_id" id="location_id" class="form-control">
			                    <option value="">Please Select Location</option>
			                    @foreach($locations as $location)
			                    	<option value="{{ $location->id }}">{{ $location->name }}</option>
			                    @endforeach
			                </select>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="name" class=" form-control-label">Staff Name</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="name" name="name" placeholder="Staff Name" class="form-control">
			                <small class="form-text text-muted">Enter name of staff here</small>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="email" class="form-control-label">Email Address</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="email" id="email" name="email" placeholder="Email Address" class="form-control">
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="staff_id" class=" form-control-label">Staff Number</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="staff_id" name="staff_id" placeholder="Staff Number" class="form-control">
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="room_no" class=" form-control-label">Room No.</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="room_no" name="room_no" placeholder="Room Number" class="form-control">
			            </div>
			        </div>
				</div>
				<div class="card-footer">
				    <button type="submit" class="btn btn-primary btn-sm">
				        <i class="fa fa-dot-circle-o"></i> Submit
				    </button>
				    <a href="{{ route('users.index') }}" class="btn btn-danger btn-sm">
				    	<i class="fa fa-ban"></i> Cancel
				    </a>
				</div>
			</div>
		</div>
	</form>
</div>
@stop