@extends('layouts.admin')
@section('title', 'Help Desk | Training Details')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h3>Training Details</h3>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-4">
						<div class="certificate">
							@if($training->certificate !== null)
								<img src="{{ asset('images/certificates/'.$training->certificate) }}" class="img-fluid" alt="{{ $training->title . " certificate" }}">
							@endif
						</div>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div class="col-md-3">
								<strong>Title:</strong>
							</div>
							<div class="col-md-9">
								{{ $training->title }}
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<strong>Provider:</strong>
							</div>
							<div class="col-md-9">
								{{ $training->provider }}
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<strong>Location:</strong>
							</div>
							<div class="col-md-9">
								{{ $training->location }}
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<strong>Start Date:</strong>
							</div>
							<div class="col-md-9">
								{{ $training->start_date->format('d F, Y') }}
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<strong>End Date:</strong>
							</div>
							<div class="col-md-9">
								{{ $training->end_date->format('d F, Y') }}
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<strong>On Board or Not:</strong>
							</div>
							<div class="col-md-9">
								{{ $training->on_board === 1 ? ' NCDMB' : $training->extra }}
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop