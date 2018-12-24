@extends('layouts.master')
@section('title', 'Help Desk Admin | Assign Admin')
@section('content')
<div class="row">
	<div class="col-xl-12 order-xl-1">
	  <div class="card bg-secondary shadow">
	    <div class="card-header bg-white border-0">
	      <div class="row align-items-center">
	        <div class="col-8">
	          <h3 class="mb-0">Ticket Details</h3>
	        </div>
	        <div class="col-4 text-right">
	          <a href="#" onclick="return false;" class="btn btn-sm btn-primary">Settings</a>
	        </div>
	      </div>
	    </div>
	    <div class="card-body">
	      <form action="{{ route('admin.ticket.assign', $ticket->id) }}" method="POST">
	      	@csrf
	      	@method('PATCH')

	        <h6 class="heading-small text-muted mb-4">Ticket information</h6>
	        <div class="pl-lg-4">
	          <div class="row">
	            <div class="col-lg-6">
	              <div class="form-group">
	                <label class="form-control-label" for="ticket_code">Ticket Code</label>
	                <input type="text" id="ticket_code" name="ticket_code" class="form-control form-control-alternative" value="{{ $ticket->ticket_code }}" disabled>
	              </div>
	            </div>
	            <div class="col-lg-6">
	              <div class="form-group">
	                <label class="form-control-label" for="user_id">Ticket Owner</label>
	                <input type="text" id="user_id" name="user_id" class="form-control form-control-alternative" value="{{ $ticket->owner->name . " (" . $ticket->owner->email . ")" }}" disabled>
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
	                <input type="text" id="room_no" name="room_no" class="form-control form-control-alternative" value="{{ $ticket->room_no }}" disabled>
	              </div>
	            </div>
	          </div>
	          <div class="row">
	          	<div class="col-lg-6">
	              <div class="form-group">
	                <label class="form-control-label" for="department_id">Department</label>
	                <input type="text" id="department_id" name="department_id" class="form-control form-control-alternative" value="{{ $ticket->department->name }}" disabled>
	              </div>
	            </div>
	            <div class="col-lg-6">
	              <div class="form-group">
	                <label class="form-control-label" for="priority">Priority</label>
	                <input type="text" id="priority" name="priority" class="form-control form-control-alternative" value="{{ $ticket->priority }}" disabled>
	              </div>
	            </div>
	          </div>
	        </div>
	        
	        <hr class="my-4" />
	        <!-- Description -->
	        <h6 class="heading-small text-muted mb-4">Complain</h6>
	        <div class="pl-lg-4">
	          <div class="form-group">
	            <label>Problem Faced</label>
	            <textarea rows="4" class="form-control form-control-alternative" placeholder="Enter Message" name="complain" disabled>{{ $ticket->complain }}</textarea>
	          </div>
	        </div>

	        <div class="pl-lg-4">
	          <div class="row">
	          	<div class="col">
	          		<div class="form-group">
		            	<button type="submit" class="btn btn-primary">Assign To Admin</button>
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