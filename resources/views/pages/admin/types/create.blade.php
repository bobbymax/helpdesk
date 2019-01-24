@extends('layouts.admin')
@section('title', 'Help Desk Admin | Create Type')
@section('content')
<div class="row">

	<div class="col-lg-12">
		<form action="{{ route('types.store') }}" method="POST" class="form-horizontal">
			    	@csrf

			<div class="card">
				<div class="card-header">
				    <strong>Create New</strong> Service Type
				</div>
				<div class="card-body card-block">
			    	

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="name" class=" form-control-label">Type Name</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="name" name="name" placeholder="Service Type Name" class="form-control">
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="position" class=" form-control-label">Position</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="number" id="position" name="position" placeholder="Position" class="form-control">
			            </div>
			        </div>
				</div>
				<div class="card-footer">
				    <button type="submit" class="btn btn-primary btn-sm">
				        <i class="fa fa-dot-circle-o"></i> Submit
				    </button>
				    <a href="{{ route('types.index') }}" class="btn btn-danger btn-sm">
				    	<i class="fa fa-ban"></i> Cancel
				    </a>
				</div>
			</div>
		</div>
	</form>
</div>
@stop