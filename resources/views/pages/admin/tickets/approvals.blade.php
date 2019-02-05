@extends('layouts.admin')
@section('Title', 'Help Desk | Approve Tickets')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Tickets</h3>
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($tickets->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>Priority</th>
                      <th>Staff</th>
                      <th>Issue</th>
                      <th>Assigned To</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($tickets as $ticket)
                    <tr>
                      <td>
                        <div class="media align-items-center">
                          <div class="media-body">
                            @if($ticket->priority === "high")
                              <span class="badge badge-danger">{{ $ticket->priority }}</span>
                            @else
                              <span class="badge badge-primary">{{ $ticket->priority }}</span>
                            @endif
                          </div>
                        </div>
                      </td>
                      <td>{{ $ticket->owner->name }}</td>
                      <td>{{ $ticket->wahala->name }}</td>
                      <td>{{ $ticket->assigned_to !== null ? $ticket->assigned_to : 'Not Assigned' }}</td>
                      <td>
                        @if($ticket->resolved === 1)
                          <span class="badge badge-success">Resolved</span>
                        @else
                          <span class="badge badge-danger">Not Resolved</span>
                        @endif
                      </td>
                      <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('show.report', $ticket->id) }}"><i class="fas fa-send"></i> View Report</a>
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
      <!-- END DATA TABLE-->
  </div>
</div>
@stop