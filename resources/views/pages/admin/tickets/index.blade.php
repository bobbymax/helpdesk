@extends('layouts.admin')
@section('Title', 'Help Desk | tickets')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Tickets</h3>
  </div>
  <div class="col text-right">
    @can('create-tickets')
      <a href="{{ route('admin.create.ticket') }}" class="btn btn-sm btn-primary">+ Generate Ticket</a>
    @endcan
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
                          <span class="badge badge-success">resolved</span>
                        @else
                          <span class="badge badge-danger">not resolved</span>
                        @endif
                      </td>
                      <td>
                        @can('edit-tickets')
                          @if($ticket->assigned_to === null)
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.ticket.edit', $ticket->id) }}"><i class="fas fa-edit"></i></a>
                          @else
                            @if($ticket->report_generated !== 1)
                              @if(Auth::user()->name === $ticket->assigned_to)
                                <a class="btn btn-sm btn-success" href="{{ route('ticket.report', $ticket->id) }}">Genereate Report</a>
                              @else
                                <span class="badge badge-info">Report Not Generated</span>
                              @endif
                            @else
                              <span class="badge badge-primary"><i class="fas fa-send"></i> Awaiting Approval</span>
                            @endif
                          @endif
                        @endcan
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