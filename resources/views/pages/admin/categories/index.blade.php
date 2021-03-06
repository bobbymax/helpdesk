@extends('layouts.admin')
@section('title', 'Help Desk | Categories')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Categories</h3>
  </div>
  <div class="col text-right">
    @can('create-categories')
    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">+ Add category</a>
    @endcan
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($categories->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>category</th>
                      <th>url</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($categories as $category)
                    <tr>
                      <td>{{ $category->name }}</td>
                      <td>/{{ $category->slug }}</td>
                      <td>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                          @csrf
                          @method('DELETE')

                          @can('edit-categories')
                          <a class="btn btn-sm btn-primary" href="{{ route('categories.edit', $category->id) }}"><i class="fas fa-edit"></i></a>
                          @endcan
                          @can('delete-categories')
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
        <p class="lead">There are no categories at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop