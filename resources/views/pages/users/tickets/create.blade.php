@extends('layouts.master')
@section('title', 'Help Desk | Generate Ticket')
@section('content')
<div class="row">

	<div class="col-lg-12">
		<form action="{{ route('tickets.store') }}" method="POST" class="form-horizontal">
			@csrf
			
			<div class="card">
				<div class="card-header">
				    <strong>Generate new</strong> Ticket
				</div>
				<div class="card-body card-block">
			    	<div class="row form-group">
			            <div class="col col-md-3">
			                <label for="categories" class="form-control-label">Request Categories</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="categories" id="categories" class="form-control dynamic" data-dependent="issues">
			                    <option value="">Select Request</option>
			                    @foreach($categories as $category)
			                    	<option value="{{ $category->id }}">{{ $category->name }}</option>
			                    @endforeach
			                </select>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="issues" class="form-control-label">Issue</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="issues" id="issues" class="form-control dynamic" data-dependent="specification">
			                    <option value="">Select the issue your are experiencing</option>
			                    @include('pages.users.ajaxs.issues')
			                </select>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="specification" class="form-control-label">Specification</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="specification" id="specification" class="form-control">
			                    <option value="">Which of the following suits the issue?</option>
			                    @include('pages.users.ajaxs.issues')
			                </select>
			            </div>
			        </div>


			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="complain" class=" form-control-label">Additional Information</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <textarea name="complain" id="complain" rows="9" placeholder="Add Additional Information, if your issue concerns a printer please add the printer name..." class="form-control"></textarea>
			            </div>
			        </div>

			        <div class="row form-group">
			            <div class="col col-md-3">
			                <label for="priority" class="form-control-label">Priority</label>
			            </div>
			            <div class="col-12 col-md-9">
			                <select name="priority" id="priority" class="form-control">
			                    <option value="">Choose Priority</option>
			                    <option value="high">High</option>
			                    <option value="normal">Normal</option>
			                    <option value="low">Low</option>
			                </select>
			            </div>
			        </div>

				</div>
				<div class="card-footer">
				    <button type="submit" class="btn btn-primary btn-sm">
				        <i class="fa fa-dot-circle-o"></i> Submit
				    </button>
				    <a href="{{ route('departments.index') }}" class="btn btn-danger btn-sm">
				    	<i class="fa fa-ban"></i> Cancel
				    </a>
				</div>
			</div>
		</div>
	</form>
</div>
@stop
@section('scripts')
	<script>

		var token = "{{ csrf_token() }}";
		var url = "{{ route('dependencies.fetch') }}";
		
	
		$(document).ready(function() {



			$('.dynamic').change(function() {


				if ($(this).val() != '') {
					var select = $(this).attr('id');
					var value = $(this).val();
					var dependent = $(this).data('dependent');

					$.ajax({
						url : url,
						method : 'POST',
						data : {
							select : select,
							_token : token,
							value : value,
							dependent : dependent,
						},
						success : function(data) {
							$("select[name='"+dependent+"'").html('');
	            			$("select[name='"+dependent+"'").html(data.options);
							//$('#'+dependent).html(result);
						}
					});
				}


			});
		});


	</script>
@stop