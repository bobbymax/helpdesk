@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-md-12">
		<form action="{{ route('admin.report.store', $ticket->id) }}" method="POST">
			@csrf
			<div class="card">
				<div class="card-header">
				    <strong>Generate</strong> Report
				</div>
				<div class="card-body card-block">
					<div class="row form-group">
						<div class="col col-md-3">
			                <label for="assigned_to" class="form-control-label">Re-Assigned?</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="assigned_to" id="assigned_to" class="form-control">
			                    <option value="">Select Admin</option>
			                    <option value="none">None</option>
			                    @foreach($admins as $admin)
			                    	<option value="{{ $admin->name }}">{{ $admin->name }}</option>
			                    @endforeach
			                </select>
			            </div>
					</div>

					<div class="row form-group">
						<div class="col col-md-3">
			                <label for="description" class="form-control-label">Description</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <textarea name="description" id="description" rows="10" class="form-control"></textarea>
			            </div>
					</div>
				</div>
				<div class="card-footer">
				    <button type="submit" class="btn btn-primary btn-sm">
				        <i class="fa fa-dot-circle-o"></i> Generate Report
				    </button>
				    <a href="{{ route('admin.tickets.index') }}" class="btn btn-danger btn-sm">
				    	<i class="fa fa-ban"></i> Cancel
				    </a>
				</div>
			</div>
		</form>
	</div>
</div>
@stop