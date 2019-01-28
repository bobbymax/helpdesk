@extends('layouts.admin')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Issues</h3>
  </div>
  <div class="col text-right">
    @can('create-issues')
    <a href="{{ route('issues.create') }}" class="btn btn-sm btn-primary">+ Add an Issue</a>
    @endcan
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($issues->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>Category Type</th>
                      <th>Name</th>
                      <th>url</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($issues as $issue)
                    <tr>
                      <td>{{ $issue->category->name }}</td>
                      <td>{{ $issue->name }}</td>
                      <td>/{{ $issue->slug }}</td>
                      <td>
                        <form action="{{ route('issues.destroy', $issue->id) }}" method="POST">
                          @csrf
                          @method('DELETE')

                          @can('edit-issues')
                          <a class="btn btn-sm btn-primary" href="{{ route('issues.edit', $issue->id) }}"><i class="fas fa-edit"></i></a>
                          @endcan
                          @can('delete-issues')
                          <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                          @endcan
                        </form>
                      </td>
                    </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      @else
      <div class="hold">
        <p class="lead">There are no issues at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop