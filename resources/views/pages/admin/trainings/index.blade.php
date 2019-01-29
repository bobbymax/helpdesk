@extends('layouts.admin')
@section('title', 'Help Desk | Trainings')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Trainings</h3>
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($trainings->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>Title</th>
                      <th>Provider</th>
                      <th>Location</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($trainings as $training)
                    <tr>
                      <td>{{ $training->title }}</td>
                      <td>{{ $training->provider }}</td>
                      <td>{{ $training->location }}</td>
                      <td>
                        <a class="btn btn-sm btn-success" href="{{ route('admin.trainings.show', $training->id) }}"><i class="fas fa-eye"></i></a>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      @else
      <div class="hold">
        <p class="lead">There are no trainings here at the moment.</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop