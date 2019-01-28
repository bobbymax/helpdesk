@extends('layouts.admin')
@section('Title', 'Help Desk | Closed Tickets')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Closed Tickets</h3>
  </div>
  <div class="col text-right">
    @can('generate-report')
    <a href="#" class="btn btn-sm btn-success">+ Generate Monthly Report</a>
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
                      <th>Code</th>
                      <th>Issue</th>
                      <th>Assigned To</th>
                      <th>Created At</th>
                      <th>Resolved At</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($tickets as $ticket)
                    <tr>
                      <td>{{ strtoupper($ticket->ticket_code) }}</td>
                      <td>{{ $ticket->issue }}</td>
                      <td>{{ $ticket->report->assigned_to === 'none' ? $ticket->assigned_to : $ticket->report->assigned_to }}</td>
                      <td>{{ $ticket->created_at->format('d M') }}</td>
                      <td>{{ $ticket->updated_at->format('d M') }}</td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      @else
      <div class="hold">
        <p class="lead">There are no closed tickets at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop