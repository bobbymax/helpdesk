@extends('layouts.admin')
@section('title', 'Item | Create Item')
@section('content')
<div class="row">

	<div class="col-lg-12">
		<form action="{{ route('items.store') }}" method="POST" class="form-horizontal">
			@csrf
			
			<div class="card">
				<div class="card-header">
				    <strong>Item</strong> Create
				</div>
				<div class="card-body card-block">


			        <div class="row form-group">
			        	<div class="col col-md-3">
			                <label for="brand_id" class=" form-control-label">Brand</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="brand_id" id="brand_id" class="form-control">
			                	<option value="">Select Brand</option>
			                	@foreach($brands as $brand)
			                		<option value="{{ $brand->id }}">{{ $brand->name }}</option>
			                	@endforeach
			                </select>
			            </div>
			        </div>


			        <div class="row form-group">
			        	<div class="col col-md-3">
			                <label for="inventory_id" class=" form-control-label">Category</label>
			            </div>
			        	<div class="col-12 col-md-9">
			                <select name="inventory_id" id="inventory_id" class="form-control">
			                	<option value="">Select Category</option>
			                	@foreach($inventories as $inventory)
			                		<option value="{{ $inventory->id }}">
			                			{{ $inventory->name }}
			                		</option>
			                	@endforeach
			                </select>
			            </div>
			        </div>

			        <div class="row form-group">
			        	<div class="col col-md-3">
			                <label for="parent" class=" form-control-label">Parent</label>
			            </div>
			        	<div class="col-12 col-md-9">
			                <select name="parent" id="parent" class="form-control">
			                	<option value="">Select Parent</option>
			                	<option value="0">None</option>
			                	@foreach($items as $item)
			                		@if($item->inventory->slug === "printers")
			                			<option value="{{ $item->id }}">{{ $item->name }}</option>
			                		@endif
			                	@endforeach
			                </select>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="name" class="form-control-label">Item Name</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="text" id="name" name="name" placeholder="Item Name" class="form-control">
			            </div>
			        </div>


			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="qty" class=" form-control-label">Quantity</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <input type="number" id="qty" name="qty" placeholder="1" class="form-control">
			            </div>
			        </div>
				</div>

				<div class="card-footer">
				    <button type="submit" class="btn btn-primary btn-sm">
				        <i class="fa fa-dot-circle-o"></i> Submit
				    </button>
				    <a href="{{ route('items.index') }}" class="btn btn-danger btn-sm">
				    	<i class="fa fa-ban"></i> Cancel
				    </a>
				</div>
			</div>
		</div>
	</form>
</div>
@stop