@extends('layouts.admin')
@section('title', 'item | Items')
@section('content')
<div class="row align-items-center">
	<div class="col">
		<h3 class="mb-0">Products</h3>
	</div>
	<div class="col text-right">
		@can("browse-items")
			<a href="{{ route('items.create') }}" class="btn btn-primary btn-sm pull-right"><i class="fas fa-plus"></i> Add New Product</a>
		@endcan
	</div>
</div>
<div class="row m-t-30">
	<div class="col-md-12">
		@if($items->count() > 0)
		<!-- DATA TABLE-->
			<div class="table-responsive m-b-40">
				<table class="table table-borderless table-data3">
					<thead>
						<tr>
							<th>category</th>
							<th>name</th>
							<th>stock</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($items as $item)
						<tr>
							<td>{{ $item->inventory->name }}</td>
							<td>{{ $item->name }}</td>
							<td>{{ $item->qty }}</td>
							<td>
								<form action="{{ route('items.destroy', $item->id) }}" method="POST">
									@csrf
									@method('DELETE')

									@can('edit-items')
										<a class="btn btn-sm btn-primary" href="{{ route('items.edit', $item->id) }}"><i class="fas fa-edit"></i></a>
									@endcan
									@can('delete-items')
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
				<p class="lead">There are no items at the moment</p>
			</div>
		@endif
	<!-- END DATA TABLE-->
	</div>
</div>
@stop