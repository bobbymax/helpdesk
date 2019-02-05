@extends('layouts.admin')
@section('title', 'Inventory | Brands')
@section('content')
<div class="row align-items-center">
	<div class="col">
		<h3 class="mb-0">Brands</h3>
	</div>
	<div class="col text-right">
		@can("browse-brands")
			<a href="{{ route('brands.create') }}" class="btn btn-primary btn-sm pull-right"><i class="fas fa-plus"></i> Add Brand</a>
		@endcan
	</div>
</div>
<div class="row m-t-30">
	<div class="col-md-12">
		@if($brands->count() > 0)
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
						@foreach($brands as $brand)
						<tr>
							<td>{{ $brand->name }}</td>
							<td>/{{ $brand->slug }}</td>
							<td>
								<form action="{{ route('brands.destroy', $brand->id) }}" method="POST">
									@csrf
									@method('DELETE')

									@can('edit-brands')
										<a class="btn btn-sm btn-primary" href="{{ route('brands.edit', $brand->id) }}"><i class="fas fa-edit"></i></a>
									@endcan
									@can('delete-brands')
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
				<p class="lead">There are no brands at the moment</p>
			</div>
		@endif
	<!-- END DATA TABLE-->
	</div>
</div>
@stop