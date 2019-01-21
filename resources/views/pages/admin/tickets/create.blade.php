@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="col-xl-12 order-xl-1">
	  <div class="card bg-secondary shadow">
	    <div class="card-header bg-white border-0">
	      <div class="row align-items-center">
	        <div class="col-8">
	          <h3 class="mb-0">My account</h3>
	        </div>
	        <div class="col-4 text-right">
	          <a href="#!" class="btn btn-sm btn-primary">Settings</a>
	        </div>
	      </div>
	    </div>
	    <div class="card-body">
	      <form action="{{ route('admin.store.ticket') }}" method="POST">
	      	@csrf

	        <h6 class="heading-small text-muted mb-4">Office information</h6>
	        <div class="pl-lg-4">
	          <div class="row">
	            <div class="col-lg-6">
	              <div class="form-group">
	                <label class="form-control-label" for="name">Name</label>
	                <input type="text" id="name" name="name" class="form-control form-control-alternative" placeholder="Enter Staff Name">
	              </div>
	            </div>
	            <div class="col-lg-6">
	              <div class="form-group">
	                <label class="form-control-label" for="email">Email address</label>
	                <input type="email" id="email" name="email" class="form-control form-control-alternative" placeholder="Enter Staff Email" autocomplete="off">
	                <div id="userList"></div>
	              </div>
	            </div>
	          </div>
	          <div class="row">
	            <div class="col-lg-6">
	              <div class="form-group">
	                <label class="form-control-label" for="department_id">Department</label>
	                <select name="department_id" id="department_id" class="form-control form-control-alternative">
	                	<option value="">Select your Department</option>
	                	@foreach($departments as $department)
	                		<option value="{{ $department->id }}">{{ $department->name }}</option>
	                	@endforeach
	                </select>
	              </div>
	            </div>
	            <div class="col-lg-6">
	              <div class="form-group">
	                <label class="form-control-label" for="category_id">Service Required</label>
	                <select name="category_id" id="category_id" class="form-control form-control-alternative">
	                	<option value="">Select Service Category</option>
	                	@foreach($categories as $category)
	                		<option value="{{ $category->id }}">{{ $category->name }}</option>
	                	@endforeach
	                </select>
	              </div>
	            </div>
	          </div>
	          <div class="row">
	          	<div class="col-lg-4">
	              <div class="form-group">
	                <label class="form-control-label" for="room_no">Room No.</label>
	                <input type="text" id="room_no" name="room_no" class="form-control form-control-alternative">
	              </div>
	            </div>
	            <div class="col-lg-8">
	              <div class="form-group">
	                <label class="form-control-label" for="priority">Priority</label>
	                <select name="priority" id="priority" class="form-control form-control-alternative">
	                	<option value="">Select Urgency</option>
	                	<option value="normal">Normal</option>
	                	<option value="medium">Medium</option>
	                	<option value="high">High</option>
	                </select>
	              </div>
	            </div>
	          </div>
	        </div>
	        
	        <hr class="my-4" />
	        <!-- Description -->
	        <h6 class="heading-small text-muted mb-4">What seems to be the Issue?</h6>
	        <div class="pl-lg-4">
	          <div class="form-group">
	            <label>Describe the Issue you are currently facing</label>
	            <textarea rows="4" class="form-control form-control-alternative" placeholder="Enter Message" name="complain"></textarea>
	          </div>
	        </div>

	        <div class="pl-lg-4">
	          <div class="row">
	          	<div class="col">
	          		<div class="form-group">
		            	<button type="submit" class="btn btn-primary">Generate Support Ticket</button>
		            </div>
	          	</div>
	            
	          </div>
	        </div>
	      </form>
	    </div>
	  </div>
	</div>
</div>
@stop
@section('scripts')
<script>
	var token =  '{{ csrf_token() }}';
	var url = '{{ route('users.list.fetch') }}';
	$(document).ready(function(){

		$('#email').typeahead({
			source: function(query, result)
			{
				$.ajax({
					url: url,
					method: "POST",
					data: {
						query: query,
						_token: token,
					},
					dataType: "json",
					success:function(data)
					{
						result($.map(data, function(item){
							return item;
						}));
					}
				});
			}
		});
	});
</script>
@stop