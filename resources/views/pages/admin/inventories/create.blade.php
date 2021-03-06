@extends('layouts.admin')
@section('title', 'Inventory | Create Inventory')
@section('content')
<div class="row">

	<div class="col-lg-12">
		<form action="{{ route('inventories.store') }}" method="POST" class="form-horizontal">
			@csrf
			
			<div class="card">
				<div class="card-header">
				    <strong>Inventory</strong> Create
				</div>
				<div class="card-body card-block">
			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="name" class=" form-control-label">Name</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="name" name="name[]" placeholder="Inventory Name" class="form-control">
			            </div>
			        </div>
			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="name" class=" form-control-label">Name</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="name" name="name[]" placeholder="Inventory Name" class="form-control">
			            </div>
			        </div>
			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="name" class=" form-control-label">Name</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="name" name="name[]" placeholder="Inventory Name" class="form-control">
			            </div>
			        </div>
			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="name" class=" form-control-label">Name</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="name" name="name[]" placeholder="Inventory Name" class="form-control">
			            </div>
			        </div>
			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="name" class=" form-control-label">Name</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="name" name="name[]" placeholder="Inventory Name" class="form-control">
			            </div>
			        </div>
				</div>
				<div class="card-footer">
				    <button type="submit" class="btn btn-primary btn-sm">
				        <i class="fa fa-dot-circle-o"></i> Submit
				    </button>
				    <a href="{{ route('inventories.index') }}" class="btn btn-danger btn-sm">
				    	<i class="fa fa-ban"></i> Cancel
				    </a>
				</div>
			</div>
		</div>
	</form>
</div>
@stop