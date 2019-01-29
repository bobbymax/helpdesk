@extends('layouts.admin')
@section('content')
  <div class="row mt-5">
    <div class="col-xl-12 mb-5 mb-xl-0">
      <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Tasks</h3>
            </div>
            <div class="col text-right">
              <a href="{{ route('admin.tickets.index') }}" class="btn btn-sm btn-primary">View Tickets</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Projects table -->
          <table class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col">Request</th>
                <th scope="col">Staff</th>
                <th scope="col">Location</th>
                <th scope="col">Room No.</th>
              </tr>
            </thead>
            <tbody>
              @if(Auth::user()->tickets->count() > 0 && Auth::user()->tickets->last()->archived === 0)
                @foreach(Auth::user()->tickets as $ticket)
                  <tr>
                    <th scope="row">{{ $ticket->issue }}</th>
                    <td>{{ $ticket->owner->name }}</td>
                    <td>{{ $ticket->location->name }}</td>
                    <td><i class="fas fa-arrow-up text-success mr-3"></i> {{ $ticket->room_no }}</td>
                  </tr>                    
                @endforeach
              @else
                <tr>
                  <th colspan="4">You have not been assigned any ticket recently</th>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@stop