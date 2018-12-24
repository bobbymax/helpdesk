@extends('layouts.master')
@section('title', 'Help Desk Admin | Tickets')
@section('content')
<!-- Table -->
<div class="row">
<div class="col">
  <div class="card shadow">
    <div class="card-header border-0">
    	<div class="row align-items-center">
    		<div class="col">
	    		<h3 class="mb-0">Tickets</h3>
	    	</div>
	    	<div class="col text-right">
	    			<a href="{{ route('admin.create.ticket') }}" class="btn btn-sm btn-primary">Generate New Ticket</a>
	    	</div>
    	</div>
    </div>
    @if($tickets->count() > 0)
    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Priority</th>
            <th scope="col">Code</th>
            <th scope="col">Service Category</th>
            <th scope="col">Room No.</th>
            <th scope="col">Staff</th>
            <th scope="col">Assigned To</th>
            <th scope="col">Resolved</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
        @foreach($tickets as $ticket)
          <tr>
            <th scope="row">
              <div class="media align-items-center">
                <a href="#" class="avatar rounded-circle mr-3">
                  <img style="width:90%;" alt="Image placeholder" src="/assets/img/brand/director.png">
                </a>
                <div class="media-body">
                  @if($ticket->priority === "high")
                    <a href="#" onclick="return false;" class="btn btn-sm btn-danger">
                      {{ $ticket->priority }}
                    </a>
                  @else
                    <a href="#" onclick="return false;" class="btn btn-sm btn-primary">
                      {{ $ticket->priority }}
                    </a>
                  @endif
                </div>
              </div>
            </th>
            <td>
            	<span class="mb-0 text-sm">{{ $ticket->ticket_code }}</span>
            </td>
            <td>
              {{ $ticket->service->name }}
            </td>
            <td>
              {{ $ticket->room_no }}
            </td>
            <td>
            	{{ $ticket->owner->name . " (" . $ticket->owner->email . ")" }}
            </td>
            <td>
              {{ $ticket->assigned_to !== null ? $ticket->assigned_to : 'Not Assigned' }}
            </td>
            <td>
            	@if($ticket->resolved === 1)
            		<a href="#" onclick="return false;" class="btn btn-sm btn-success">
            			resolved
            		</a>
            	@else
            		<a href="#" onclick="return false;" class="btn btn-sm btn-danger">
            			not resolved
            		</a>
            	@endif
            </td>
            <td class="text-right">
              <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                  <a class="dropdown-item" href="{{ route('admin.ticket.edit', $ticket->id) }}"><i class="fas fa-edit"></i> Assign</a>
                  @if($ticket->assigned_to !== null)
                    <a class="dropdown-item" href="{{ route('admin.ticket.update', $ticket->id) }}"><i class="fas fa-bell"></i> Resolve</a>
                  @endif
                </div>
              </div>
            </td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
    @else
    	<div class="hold">
    		<p class="lead">There are no tickets at the moment</p>
    	</div>
	@endif
  </div>
</div>
</div>
@stop