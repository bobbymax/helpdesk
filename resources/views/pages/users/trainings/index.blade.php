@extends('layouts.master')
@section('title', 'Help Desk | Trainings')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Trainings</h3>
  </div>
  <div class="col text-right">
    <a href="{{ route('trainings.create') }}" class="btn btn-sm btn-primary">+ Add Training</a>
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
                        <form action="{{ route('trainings.destroy', $training->id) }}" method="POST">
                          @csrf
                          @method('DELETE')

                          <a class="btn btn-sm btn-primary" href="{{ route('trainings.edit', $training->id) }}"><i class="fas fa-edit"></i></a>
                          <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      @else
      <div class="hold">
        <p class="lead">You have not added any training at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop