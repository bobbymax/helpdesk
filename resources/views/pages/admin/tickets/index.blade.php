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
                      <th>Resolved</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($tickets as $ticket)
                    <tr>
                      <td>
                        <div class="media align-items-center">
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
                      </td>
                      <td>{{ $ticket->owner->name }}</td>
                      <td>{{ $ticket->wahala->name }}</td>
                      <td>{{ $ticket->assigned_to !== null ? $ticket->assigned_to : 'Not Assigned' }}</td>
                      <td>
                        @if($ticket->resolved === 1)
                          <a href="#" onclick="return false;" class="btn btn-sm btn-success">
                            <i class="fas fa-check"></i>
                          </a>
                        @else
                          <a href="#" onclick="return false;" class="btn btn-sm btn-danger">
                            <i class="fas fa-ban"></i>
                          </a>
                        @endif
                      </td>
                      <td>
                        @can('edit-tickets')
                          @if($ticket->assigned_to === null)
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.ticket.edit', $ticket->id) }}"><i class="fas fa-edit"></i></a>
                          @else
                            @if($ticket->report_generated !== 1)
                              <a class="btn btn-sm btn-success" href="{{ route('ticket.report', $ticket->id) }}"><i class="fas fa-send"></i></a>
                            @else
                              <a class="btn btn-sm btn-primary" href="#" onclick="return false;"><i class="fas fa-send"></i> Awaiting Closure</a>
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