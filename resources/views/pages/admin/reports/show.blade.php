@extends('layouts.admin')
@section('Title', 'Help Desk | View Ticket Report')
@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				Report for Ticket Code: <strong>{{ strtoupper($ticket->ticket_code) }}</strong>
			</div>
			<div class="card-body card-block">

		        <div class="row form-group">
		            <div class="col col-md-3">
		                <label for="issues" class="form-control-label">Issue</label>
		            </div>
		            <div class="col-12 col-md-9">
		                <input type="text" value="{{ $ticket->wahala->name }}" class="form-control" disabled>
		            </div>
		        </div>

		        <div class="row form-group">
		            <div class="col col-md-3">
		                <label for="specification" class="form-control-label">Specification</label>
		            </div>
		            <div class="col-12 col-md-9">
		                <input type="text" value="{{ $ticket->issue }}" class="form-control" disabled>
		            </div>
		        </div>

		        <div class="row form-group">
		            <div class="col col-md-3">
		                <label for="specification" class="form-control-label">Complaint</label>
		            </div>
		            <div class="col-12 col-md-9">
		                <textarea rows="4" class="form-control" disabled>{{ $ticket->complain }}</textarea>
		            </div>
		        </div>

		        <div class="row form-group">
		            <div class="col col-md-3">
		                <label for="specification" class="form-control-label">Location</label>
		            </div>
		            <div class="col-12 col-md-9">
		                <input type="text" value="{{ $ticket->owner->profile->location->name }}" class="form-control" disabled>
		            </div>
		        </div>

		        <div class="row form-group">
		            <div class="col col-md-3">
		                <label for="specification" class="form-control-label">Room No.</label>
		            </div>
		            <div class="col-12 col-md-9">
		                <input type="text" value="{{ $ticket->owner->profile->room_no }}" class="form-control" disabled>
		            </div>
		        </div>

		        <div class="row form-group">
		            <div class="col col-md-3">
		                <label for="specification" class="form-control-label">Staff Name</label>
		            </div>
		            <div class="col-12 col-md-9">
		                <input type="text" value="{{ $ticket->owner->name }}" class="form-control" disabled>
		            </div>
		        </div>

		        <div class="row form-group">
		            <div class="col col-md-3">
		                <label for="specification" class="form-control-label">Solution</label>
		            </div>
		            <div class="col-12 col-md-9">
		                <textarea rows="4" class="form-control" disabled>{{ $ticket->report->last()->description }}</textarea>
		            </div>
		        </div>

		        <div class="row form-group">
		            <div class="col col-md-3">
		                <label for="specification" class="form-control-label">Resolved By</label>
		            </div>
		            <div class="col-12 col-md-9">
		                <input type="text" value="{{ $ticket->report->last()->assigned_to === 'none' ? $ticket->assigned_to : $ticket->report->last()->assigned_to }}" class="form-control" disabled>
		            </div>
		        </div>

			</div>

			<div class="card-footer">
			    <a href="{{ route('close.ticket', $ticket->id) }}" class="btn btn-primary btn-sm">
			    	<i class="fa fa-check"></i> Close Ticket
			    </a>
			    <a href="{{ route('admin.tickets.approval') }}" class="btn btn-danger btn-sm">
			    	<i class="fa fa-ban"></i> Cancel
			    </a>
			</div>
		</div>
	</div>
</div>
@stop