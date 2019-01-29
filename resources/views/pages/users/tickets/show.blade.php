@extends('layouts.master')
@section('title', 'Help Desk | Ticket Details')
@section('content')

<div class="row m-t-30">
	<div class="col-md-10 offset-md-1">
		<div class="card">
			<div class="card-header">
				<div class="row">
					<div class="col-md-8">
						<strong>Ticket</strong> Details
					</div>
					<div class="col-md-4">
						@if($ticket->archived === 1)
							<a href="{{ route('reopen.ticket', $ticket->id) }}" class="btn btn-danger btn-sm pull-right">
								<i class="fas fa-gavel"></i> &nbsp;Re-Open Ticket
							</a>
						@endif
					</div>
				</div>
			</div>
			<div class="card-body card-block">
				<div class="row">
					<div class="col-md-4">Ticket Code:</div>
					<div class="col-md-8"><strong>{{ strtoupper($ticket->ticket_code) }}</strong></div>
				</div>
				<div class="row">
					<div class="col-md-4">Complain Status</div>
					<div class="col-md-8">
						<strong>
							@if($ticket->resolved !== 1)
							<span class="badge badge-pill badge-danger">Not Resolved</span>
							@else
							<span class="badge badge-pill badge-success">Resolved</span>
							@endif
						</strong>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">Ticket Assigned To:</div>
					<div class="col-md-8"><strong>{{ $ticket->assigned_to }}</strong></div>
				</div>
				<div class="row">
					<div class="col-md-4">Ticket Status:</div>
					<div class="col-md-8">
						<strong>
							@if($ticket->archived !== 1)
								<span class="badge badge-pill badge-warning">Open</span>
							@else
								<span class="badge badge-pill badge-dark">Closed</span>
							@endif
						</strong>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">Ticket Issue:</div>
					<div class="col-md-8">
						<p>{{ $ticket->complain }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop