@extends('layouts.admin')
@section('title', 'Help Desk Admin | Edit Project')
@section('content')
<div class="row">

	<div class="col-lg-12">
		<form action="{{ route('projects.update', $project->id) }}" method="POST" class="form-horizontal">
			    	@csrf
			    	@method('PATCH')

			<div class="card">
				<div class="card-header">
				    <strong>Edit</strong> Project
				</div>
				<div class="card-body card-block">
			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="type_id" class=" form-control-label">Project Type</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="type_id" id="type_id" class="form-control">
			                    <option value="">Please Select Project Type</option>
			                    @foreach($types as $type)
			                    	<option value="{{ $type->id }}" {{ $project->type_id === $type->id ? ' selected' : '' }}>{{ $type->name }}</option>
			                    @endforeach
			                </select>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="subCategory_id" class=" form-control-label">Sub Categories</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="subCategory_id" id="subCategory_id" class="form-control">
			                    <option value="">Select Sub Category</option>
			                    <option value="0" {{ $project->subCategory_id === 0 ? ' selected' : '' }}>None</option>
			                    @foreach($subs as $sub)
			                    	<option value="{{ $sub->id }}" {{ $project->subCategory_id === $sub->id ? ' selected' : '' }}>{{ $sub->name }}</option>
			                    @endforeach
			                </select>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="issue" class="form-control-label">Issue</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <textarea name="issue" id="issue" rows="5" class="form-control">{!! $project->issue !!}</textarea>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="status" class="form-control-label">Status</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <textarea name="status" id="status" rows="4" class="form-control">{!! $project->status !!}</textarea>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="todo" class="form-control-label">Todo</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <textarea name="todo" id="todo" rows="2" class="form-control">{!! $project->todo !!}</textarea>
			            </div>
			        </div>
				</div>
				<div class="card-footer">
				    <button type="submit" class="btn btn-primary btn-sm">
				        <i class="fa fa-dot-circle-o"></i> Submit
				    </button>
				    <a href="{{ route('projects.index') }}" class="btn btn-danger btn-sm">
				    	<i class="fa fa-ban"></i> Cancel
				    </a>
				</div>
			</div>
		</div>
	</form>
</div>
@stop