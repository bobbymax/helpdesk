@extends('layouts.admin')
@section('title', 'Help Desk Admin | Create Menu')
@section('content')
<div class="row">

	<div class="col-lg-12">
		<form action="{{ route('menus.store') }}" method="POST" class="form-horizontal">
			    	@csrf

			<div class="card">
				<div class="card-header">
				    <strong>Create</strong> Menus
				</div>
				<div class="card-body card-block">
			    	

			        <div class="row form-group">
			            <div class="col-12 col-md-3">
			                <input type="text" id="name" name="name" placeholder="Enter Menu Name" class="form-control">
			            </div>

			            <div class="col-12 col-md-3">
			                <input type="text" id="guard" name="guard" placeholder="Enter Route Name" class="form-control">
			            </div>
						
						<div class="col-12 col-md-2">
			                <input type="text" id="icon" name="icon" placeholder="Icon Name" class="form-control">
			            </div>

			            <div class="col-12 col-md-2">
			                <input type="text" id="permission" name="permission" placeholder="Permission" class="form-control">
			            </div>

			            <div class="col-12 col-md-2">
			                <input type="text" id="url" name="url" placeholder="URL" class="form-control">
			            </div>

			        </div>

				</div>
				<div class="card-footer">
				    <button type="submit" class="btn btn-primary btn-sm">
				        <i class="fa fa-dot-circle-o"></i> Submit
				    </button>
				    <a href="{{ route('menus.index') }}" class="btn btn-danger btn-sm">
				    	<i class="fa fa-ban"></i> Cancel
				    </a>
				</div>
			</div>
		</div>
	</form>
</div>
@stop