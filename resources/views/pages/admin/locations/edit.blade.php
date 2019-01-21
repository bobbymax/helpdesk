@extends('layouts.admin')
@section('title', 'Help Desk Admin | Edit Location')
@section('content')
<div class="row">

	<div class="col-lg-12">
		<form action="{{ route('locations.update', $location->id) }}" method="POST" class="form-horizontal">
			    	@csrf
			    	@method('PATCH')

			<div class="card">
				<div class="card-header">
				    <strong>Locations</strong> Edit
				</div>
				<div class="card-body card-block">
			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="name" class=" form-control-label">Name</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="name" name="name" class="form-control" value="{{ $location->name }}">
			                <small class="form-text text-muted">Enter the name of the location</small>
			            </div>
			        </div>
				</div>
				<div class="card-footer">
				    <button type="submit" class="btn btn-primary btn-sm">
				        <i class="fa fa-dot-circle-o"></i> Submit
				    </button>
				    <a href="{{ route('locations.index') }}" class="btn btn-danger btn-sm">
				    	<i class="fa fa-ban"></i> Cancel
				    </a>
				</div>
			</div>
		</div>
	</form>
</div>
@stop