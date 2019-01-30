@extends('layouts.master')
@section('title', 'Help Desk | Profile')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Profile Details</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-4">
								<small><strong>Name:</strong></small><br>
								{{ Auth::user()->name }}
							</div>
							<div class="col-md-4">
								<small><strong>Staff Number:</strong></small><br>
								{{ Auth::user()->profile->staff_id }}
							</div>
							<div class="col-md-4">
								<small><strong>Room No.:</strong></small><br>
								{{ Auth::user()->profile->room_no }}
							</div>
						</div>
						<div class="row m-t-30">
							<div class="col-md-4">
								<small><strong>Location:</strong></small><br>
								{{ Auth::user()->profile->location->name }}
							</div>
							<div class="col-md-8">
								<small><strong>Department:</strong></small><br>
								{{ Auth::user()->profile->department->id === 0 ? Auth::user()->profile->division->name : Auth::user()->profile->department->name }}
							</div>
						</div>

						<form action="{{ route('upload.profile.avatar') }}" method="POST" enctype="multipart/form-data">
							@csrf
							<div class="row m-t-50">
								<div class="col-md-8">
									<input type="file" name="avatar" id="avatar" class="form-control">
								</div>
								<div class="col-md-4">
									<button type="submit" class="btn btn-primary">Submit Upload</button>
								</div>
							</div>
							
							
						</form>
					</div>
					<div class="col-md-4">
						<div class="img_placeholder">
							<img src="{{ Auth::user()->profile->avatar === null ? asset('images/icon/avatar_placeholder.png') : asset('images/users/'.Auth::user()->profile->avatar) }}" alt="" class="img-fluid">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop