@extends('layouts.admin')
@section('title', 'Help Desk Admin | Create Division')
@section('content')
<div class="row">

	<div class="col-lg-12">
		<form action="{{ route('divisions.store') }}" method="POST" class="form-horizontal">
			@csrf
			<div class="card">
				<div class="card-header">
				    <strong>Basic Form</strong> Elements
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
			                    	<option value="{{ $directorate->id }}">{{ $directorate->name }}</option>
			                    @endforeach
			                </select>
			            </div>
			        </div>
			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="name" class=" form-control-label">Division Name</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="name" name="name" placeholder="Issue Name" class="form-control">
			                <small class="form-text text-muted">Enter the name of the division here</small>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="abv" class="form-control-label">Abbreviation</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="abv" name="abv" placeholder="Abbreviation" class="form-control">
			            </div>
			        </div>
				</div>
				<div class="card-footer">
				    <button type="submit" class="btn btn-primary btn-sm">
				        <i class="fa fa-dot-circle-o"></i> Submit
				    </button>
				    <a href="{{ route('divisions.index') }}" class="btn btn-danger btn-sm">
				    	<i class="fa fa-ban"></i> Cancel
				    </a>
				</div>
			</div>
		</div>
	</form>
</div>
@stop