@extends('layouts.master')
@section('title', 'Help Desk | tickets')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Tickets</h3>
  </div>
  <div class="col text-right">
    <a href="{{ route('tickets.create') }}" class="btn btn-sm btn-primary">+ Create ticket</a>
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
                      <th>Issue</th>
                      <th>Assigned To</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($tickets as $ticket)
                    <tr>
                      <td>{{ $ticket->issue }}</td>
                      <td>
                        {{ $ticket->assigned_to === null ? ' Not Assigned ' : $ticket->assigned_to }}
                      </td>
                      <td>
                        @if($ticket->resolved === 1)
                          <span class="badge badge-pill badge-success">Resolved</span>
                        @else
                          <span class="badge badge-pill badge-danger">Not Resolved</span>
                        @endif
                      </td>
                      <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('tickets.show', $ticket->id) }}"><i class="fas fa-edit"></i> View Ticket</a>
                        @if($ticket->assigned_to !== null && $ticket->archived === 0)
                          <a href="{{ route('send.reminder', $ticket->id) }}" class="btn btn-sm btn-success"><i class="fas fa-trash"></i> Send Reminder</a>
                        @endif
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