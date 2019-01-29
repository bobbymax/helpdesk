@extends('layouts.master')
@section('title', 'Help Desk | Edit Training')
@section('content')
<div class="row">

	<div class="col-lg-12">
		<form action="{{ route('trainings.update', $training->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
			@csrf
			@method('PATCH')
			
			<div class="card">
				<div class="card-header">
				    <strong>Edit</strong> Training
				</div>
				<div class="card-body card-block">

					<div class="row form-group">
			            <div class="col col-md-3">
			                <label for="title" class="form-control-label">Course Title</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" name="title" id="title" class="form-control" value="{{ $training->title }}">
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="provider" class="form-control-label">Provider</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" name="provider" id="provider" class="form-control" value="{{ $training->provider }}">
			            </div>
			        </div>

					<div class="row form-group">
			            <div class="col col-md-3">
			                <label for="location" class="form-control-label">Location</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" name="location" id="location" class="form-control" value="{{ $training->location }}">
			            </div>
			        </div>
					

					<div class="row form-group">
			            <div class="col col-md-3">
			                <label for="start_date" class="form-control-label">Start Date</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $training->start_date }}">
			            </div>
			        </div>


					<div class="row form-group">
			            <div class="col col-md-3">
			                <label for="end_date" class="form-control-label">End Date</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $training->end_date }}">
			            </div>
			        </div>


					<div class="row form-group">
			            <div class="col col-md-3">
			                <label for="certificate" class="form-control-label">Upload Certificate</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="file" name="certificate" id="certificate" class="form-control">
			            </div>
			        </div>


			    	<div class="row form-group">
			            <div class="col col-md-3">
			                <label for="on_board" class="form-control-label">Did you take this training while in NCDMB?</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="on_board" id="on_board" class="form-control">
			                    <option value="" selected>Select Answer</option>
			                    <option value="1" {{ $training->on_board === 1 ? ' selected' : '' }}>Yes</option>
			                    <option value="0" {{ $training->on_board === 0 ? ' selected' : '' }}>No</option>
			                </select>
			            </div>
			        </div>


					<div class="row form-group">
			            <div class="col col-md-3">
			                <label for="extra" class="form-control-label">If No, Where?</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" name="extra" id="extra" class="form-control" value="{{ $training->extra !== null ? $training->extra : '' }}">
			            </div>
			        </div>

				</div>
				<div class="card-footer">
				    <button type="submit" class="btn btn-primary btn-sm">
				        <i class="fa fa-dot-circle-o"></i> Update Record
				    </button>
				    <a href="{{ route('trainings.index') }}" class="btn btn-danger btn-sm">
				    	<i class="fa fa-ban"></i> Cancel
				    </a>
				</div>
			</div>
		</div>
	</form>
</div>
@stop