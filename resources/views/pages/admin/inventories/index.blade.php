@extends('layouts.admin')
@section('title', 'Inventory | Inventories')
@section('content')
<div class="row align-items-center">
	<div class="col">
		<h3 class="mb-0">Inventories</h3>
	</div>
	<div class="col text-right">
		@can("browse-inventories")
			<a href="{{ route('inventories.create') }}" class="btn btn-primary btn-sm pull-right"><i class="fas fa-plus"></i> Add Inventory</a>
		@endcan
	</div>
</div>
<div class="row m-t-30">
	<div class="col-md-12">
		@if($inventories->count() > 0)
		<!-- DATA TABLE-->
			<div class="table-responsive m-b-40">
				<table class="table table-borderless table-data3">
					<thead>
						<tr>
							<th>name</th>
							<th>url</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($inventories as $inventory)
						<tr>
							<td>{{ $inventory->name }}</td>
							<td>/{{ $inventory->slug }}</td>
							<td>
								<form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST">
									@csrf
									@method('DELETE')

									@can('edit-inventories')
										<a class="btn btn-sm btn-primary" href="{{ route('inventories.edit', $inventory->id) }}"><i class="fas fa-edit"></i></a>
									@endcan
									@can('delete-inventories')
										<button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
									@endcan
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			@else
			<div class="hold">
				<p class="lead">There are no inventories at the moment</p>
			</div>
		@endif
	<!-- END DATA TABLE-->
	</div>
</div>
@stop