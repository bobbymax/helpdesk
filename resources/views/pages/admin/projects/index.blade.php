@extends('layouts.admin')
@section('Title', 'Help Desk | Projects')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Projects</h3>
  </div>
  <div class="col text-right">
    <a href="{{ route('projects.create') }}" class="btn btn-sm btn-primary">+ Create Project</a>
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
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($projects as $project)
                    <tr>
                      <td>{{ $project->issue }}</td>
                      <td>{{ $project->todo }}</td>
                      <td>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <a class="btn btn-sm btn-primary" href="{{ route('projects.edit', $project->id) }}"><i class="fas fa-edit"></i></a>
                          <button class="btn btn-sm btn-danger" project="submit"><i class="fas fa-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      @else
      <div class="hold">
        <p class="lead">There are no projects to display at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop