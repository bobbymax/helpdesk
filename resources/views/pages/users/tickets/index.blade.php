@extends('layouts.master')
@section('title', 'Help Desk | tickets')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Tickets</h3>
  </div>
  <div class="col text-right">
    <a href="{{ route('tickets.create') }}" class="btn btn-sm btn-primary">+ Add an ticket</a>
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
                      <th>Resolved</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($tickets as $ticket)
                    <tr>
                      <td>{{ $ticket->issue }}</td>
                      <td>
                        {{ $ticket->assigned_to === null ? ' Not Assigned ' : $ticket->assigned_to }}
                      </td>
                      <td>{{ $ticket->resolved === 0 ? 'Not Resolved' : 'Resolved' }}</td>
                      <td>
                        <a class="btn btn-sm btn-primary" href="{{ route('tickets.show', $ticket->id) }}"><i class="fas fa-edit"></i> View Ticket</a>

                        <a href="#" class="btn btn-sm btn-success"><i class="fas fa-trash"></i> Send Reminder</a>
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