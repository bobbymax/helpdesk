@extends('layouts.reports')
@section('title', 'Monthly Report')
@section('styles')
<style>
	* {
		margin: 0;
		padding: 0;
	}
	.container {
		max-width: 1000px;
		margin: 0 auto;
	}
	.container-fluid {
		max-width: 90%;
		margin: 0 auto;
	}
	.title_div {
		float: right;
	}
	.clearfix {
		clear: both;
	}
	.img-container {
		float: left;
		width: 7%;
		margin: 0;
	}
	.img-container img {
		width: 100%;
		max-width: 100%;
	}
	.table {
		border-collapse: collapse;
		width: 100%;
		padding: 10px 0;
	}
	.row {
		padding: 15px 0;
	}

	table, th, td {
		border: 1px solid rgba(0,0,0,0.8);
	}
	th, td {
		padding: 10px;
	}
	table {
		padding: 10px 0;
	}
	ul {
		padding-left: 30px; 
	}
</style>
@stop
@section('content')
<div class="content-header">
	<div class="img-container">
		<img src="./images/report_logo.png" class="img-fluid" alt="report logo image">
	</div>
	<div class="title_div">
		<h3 style="margin-top: 25px;">{{ strtoupper('information and communications division monthly report for - ') . date('F, Y') }}</h3>
	</div>
	<div class="clearfix"></div>
</div>

<div class="content-body">
	<div class="row">
		<div class="col-12">
			<h4><strong>{{ strtoupper('introduction:') }}</strong></h4>
		</div>
		<div class="col-12">
			<p>The highlights of activities carried out in the month of September are listed below:</p>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<div class="daily">
				<h4><strong>{{ strtoupper('1.0 	daily routines:') }}</strong></h4>
				<div class="activities">
					<ul>
						@foreach($services as $service)
							@if($service->type->slug === "daily-routine")
								<li>{{ $service->description }}</li>						
							@endif
						@endforeach
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<h4><strong>{{ strtoupper('2.0  Web Services:') }}</strong></h4>
			<div class="activities">
				<ul>
					@foreach($services as $service)
						@if($service->type->slug === "web-services")
							@if($service->updated_at->format('M Y') === date('M Y'))
								<li>{{ $service->description }}</li>
							@endif
						@endif
					@endforeach
				</ul>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<h4><strong>{{ strtoupper('2.1  Web Uploads:') }}</strong></h4>
			<div class="activities">
				<ul>
					@foreach($services as $service)
						@if($service->type->slug === "web-uploads")
							@if($service->updated_at->format('M Y') === date('M Y'))
								<li>{{ $service->description }}</li>
							@endif
						@endif
					@endforeach
				</ul>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<h4><strong>{{ strtoupper('3.0 general ict infrastructure:') }}</strong></h4><br>
			<div class="activities">
				<table class="table table-responsive table-bordered">
					<thead>
						<tr>
							<th>S/No.</th>
							<th>Issue</th>
							<th>Status</th>
							<th>Todo</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><strong>A</strong></td>
							<td colspan="3"><strong>Projects</strong></td>
						</tr>
						<?php $count = 1; ?>
						@foreach($projects as $project)
							@if($project->type->slug === "general-ict-infrastructure")
								@if($project->subCategory_id !== 0 && $project->subCategory->slugs === "projects")
									<tr>
										<td>{{ $count++ }}</td>
										<td>{{ $project->issue }}</td>
										<td>{{ $project->status }}</td>
										<td>{{ $project->todo }}</td>
									</tr>
								@endif
							@endif
						@endforeach
						<tr>
							<td><strong>B</strong></td>
							<td colspan="3"><strong>Network/Infrastructure</strong></td>
						</tr>

						@foreach($projects as $project)
							@if($project->type->slug === "general-ict-infrastructure")
								@if($project->subCategory_id !== 0 && $project->subCategory->slugs === "network-infrastructure")
									<tr>
										<td>{{ $count++ }}</td>
										<td>{{ $project->issue }}</td>
										<td>{{ $project->status }}</td>
										<td>{{ $project->todo }}</td>
									</tr>
								@endif
							@endif
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<h4><strong>{{ strtoupper('4.0 systems development:') }}</strong></h4><br>
			<div class="activities">
				<table class="table table-responsive table-bordered">
					<thead>
						<tr>
							<th>S/No.</th>
							<th>Issue</th>
							<th>Status</th>
							<th>Todo</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><strong>A</strong></td>
							<td colspan="3"><strong>Projects</strong></td>
						</tr>
						<?php $count = 1; ?>
						@foreach($projects as $project)
							@if($project->type->slug === "systems-development")
								@if($project->subCategory_id !== 0 && $project->subCategory->slugs === "projects")
									<tr>
										<td>{{ $count++ }}</td>
										<td>{{ $project->issue }}</td>
										<td>{{ $project->status }}</td>
										<td>{{ $project->todo }}</td>
									</tr>
								@else
									<tr>
										<td>{{ $count++ }}</td>
										<td>{{ $project->issue }}</td>
										<td>{{ $project->status }}</td>
										<td>{{ $project->todo }}</td>
									</tr>
								@endif
							@endif
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<h4><strong>{{ strtoupper('5.0 work tools/consumables:') }}</strong></h4><br>
			<div class="activities">
				<table class="table table-responsive table-bordered">
					<thead>
						<tr>
							<th>S/No.</th>
							<th>Issue</th>
							<th>Status</th>
							<th>Todo</th>
						</tr>
					</thead>
					<tbody>
						<?php $count = 1; ?>
						@foreach($projects as $project)
							@if($project->type->slug === "work-tools-consumables")
								<tr>
									<td>{{ $count++ }}</td>
									<td>{{ $project->issue }}</td>
									<td>{{ $project->status }}</td>
									<td>{{ $project->todo }}</td>
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<h4><strong>{{ strtoupper('6.0 other activities:') }}</strong></h4><br>
			<div class="activities">
				<table class="table table-responsive table-bordered">
					<thead>
						<tr>
							<th>S/No.</th>
							<th>Issue</th>
							<th>Status</th>
							<th>Todo</th>
						</tr>
					</thead>
					<tbody>
						<?php $count = 1; ?>
						@foreach($projects as $project)
							@if($project->type->slug === "other-activities")
								@if($project->subCategory_id !== 0 && $project->subCategory->slugs === "projects")
									<tr>
										<td>{{ $count++ }}</td>
										<td>{{ $project->issue }}</td>
										<td>{{ $project->status }}</td>
										<td>{{ $project->todo }}</td>
									</tr>
								@endif
							@endif
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop