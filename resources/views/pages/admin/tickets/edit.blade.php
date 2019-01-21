@extends('layouts.admin')
@section('title', 'Help Desk Admin | Assign Admin')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Ticket Details</div>
            <div class="card-body">
                <div class="card-title">
                    <h3 class="text-center title-2">Assign Ticket to Admin</h3>
                </div>
                <hr>
                <form action="{{ route('admin.ticket.assign', $ticket->id) }}" method="POST">
                	@csrf
	      			@method('PATCH')

                	<div class="row">
                		<div class="col-lg-6">
	                		<div class="form-group">
				                <label class="control-label mb-1" for="ticket_code">Ticket Code</label>
				                <input type="text" id="ticket_code" name="ticket_code" class="form-control" value="{{ $ticket->ticket_code }}" disabled>
			              	</div>
	                	</div>

	                	<div class="col-lg-6">
			              <div class="form-group">
			                <label class="control-label mb-1" for="user_id">Ticket Owner</label>
			                <input type="text" id="user_id" name="user_id" class="form-control" value="{{ $ticket->owner->name . " (" . $ticket->owner->email . ")" }}" disabled>
			              </div>
			            </div>
                	</div>

                	<div class="row">
			            <div class="col-lg-6">
			              <div class="form-group">
			                <label class="control-label mb-1" for="category">Service Category</label>
			                <input type="text" id="category" name="category" class="form-control" value="{{ $ticket->service->name }}" disabled>
			              </div>
			            </div>

			            <div class="col-lg-6">
			              <div class="form-group">
			                <label class="control-label mb-1" for="issue">Issue</label>
			                <input type="text" id="issue" name="issue" class="form-control" value="{{ $ticket->issue }}" disabled>
			              </div>
			            </div>
			        </div>

			        <div class="row">
			            <div class="col-lg-6">
			              <div class="form-group">
			                <label class="form-control-label" for="admin_id">Admins</label>
			                <select name="admin_id" id="admin_id" class="form-control form-control-alternative">
			                	<option value="">Assign Ticket to Admin</option>
			                	@foreach($admins as $admin)
			                		<option value="{{ $admin->id }}">{{ $admin->name . " (" . $admin->email . ")" }}</option>
			                	@endforeach
			                </select>
			              </div>
			            </div>
			            <div class="col-lg-6">
			              <div class="form-group">
			                <label class="form-control-label" for="room_no">Room No.</label>
			                <input type="text" id="room_no" name="room_no" class="form-control form-control-alternative" value="{{ $ticket->owner->profile->room_no }}" disabled>
			              </div>
			            </div>
			        </div>

			        <div class="row">
			          	<div class="col-lg-6">
			              <div class="form-group">
			                <label class="form-control-label" for="department_id">Department</label>
			                <input type="text" id="department_id" name="department_id" class="form-control form-control-alternative" value="{{ $ticket->owner->profile->department->name }}" disabled>
			              </div>
			            </div>
			            <div class="col-lg-6">
			              <div class="form-group">
			                <label class="form-control-label" for="priority">Priority</label>
			                <input type="text" id="priority" name="priority" class="form-control form-control-alternative" value="{{ $ticket->priority }}" disabled>
			              </div>
			            </div>
			        </div>

			        <div class="row">
			        	<div class="col-lg-12">
				          <div class="form-group">
				            <label>Problem Faced</label>
				            <textarea rows="4" class="form-control form-control-alternative" placeholder="Enter Message" name="complain" disabled>{{ $ticket->complain }}</textarea>
				          </div>
				        </div>
			        </div>

			        <div class="row">
			          	<div class="col">
			          		<div class="form-group">
				            	<button type="submit" class="btn btn-primary">Assign To Admin</button>
				            </div>
			          	</div>
			            
			        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop