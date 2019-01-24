@extends('layouts.admin')
@section('Title', 'Help Desk | Monthly Report')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Monthly Projects</h3>
  </div>
  <div class="col text-right">
    <a href="#" class="btn btn-sm btn-success">+ Generate Monthly Report</a>
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($projects->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>Issue</th>
                      <th>Todo</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($projects as $project)
                    <tr>
                      <td>{{ $project->issue }}</td>
                      <td>{{ $project->todo }}</td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      @else
      <div class="hold">
        <p class="lead">There are no projects at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop