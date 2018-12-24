@extends('layouts.user')
@section('title', 'Help Desk | Tickets')
@section('header-content')
<h1 class="display-2 text-white">Hello {{ Auth::user()->name }}</h1>
<p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
@stop
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
	    			<a href="{{ route('tickets.create') }}" class="btn btn-sm btn-primary">Generate Ticket</a>
	    	</div>
    	</div>
    </div>
    @if($tickets->count() > 0)
    <div class="table-responsive">
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Department</th>
            <th scope="col">Priority</th>
            <th scope="col">Service Category</th>
            <th scope="col">Code</th>
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
                  <span class="mb-0 text-sm">{{ $ticket->department->name }}</span>
                </div>
              </div>
            </th>
            <td>
            	@if($ticket->priority === "high")
            		<a href="#" onclick="return false;" class="btn btn-sm btn-danger">
            			{{ $ticket->priority }}
            		</a>
            	@else
            		<a href="#" onclick="return false;" class="btn btn-sm btn-primary">
            			{{ $ticket->priority }}
            		</a>
            	@endif
            </td>
            <td>
              {{ $ticket->service->name }}
            </td>
            <td>
              {{ $ticket->ticket_code }}
            </td>
            <td>
            	{{ $ticket->assigned_to == null ? 'Nobody Yet' : $ticket->assigned_to }}
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
                  <a class="dropdown-item" href="{{ route('tickets.edit', $ticket->id) }}"><i class="fas fa-edit"></i> Edit</a>
                  <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
                  	@csrf
                  	@method('DELETE')
                  	<button class="dropdown-item" type="submit"><i class="fas fa-trash"></i> Delete</button>
                  </form>
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