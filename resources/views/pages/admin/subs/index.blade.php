@extends('layouts.admin')
@section('title', 'HelpDesk | Sub Categories')
@section('content')
<div class="row align-items-center">
  <div class="col">
    <h3 class="mb-0">Sub Categories</h3>
  </div>
  <div class="col text-right">
    @can('create-subcategories')
    <a href="{{ route('subCategories.create') }}" class="btn btn-sm btn-primary">+ Add an Sub Category</a>
    @endcan
  </div>
</div>
<div class="row m-t-30">
  <div class="col-md-12">
      @if($subs->count() > 0)
      <!-- DATA TABLE-->
      <div class="table-responsive m-b-40">
          <table class="table table-borderless table-data3">
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>url</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($subs as $subCategory)
                    <tr>
                      <td>{{ $subCategory->name }}</td>
                      <td>/{{ $subCategory->slugs }}</td>
                      <td>
                        <form action="{{ route('subCategories.destroy', $subCategory->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          @can('edit-subcategories')
                          <a class="btn btn-sm btn-primary" href="{{ route('subCategories.edit', $subCategory->id) }}"><i class="fas fa-edit"></i></a>
                          @endcan
                          @can('delete-subcategories')
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
        <p class="lead">There are no sub categories at the moment</p>
      </div>
      @endif
      <!-- END DATA TABLE-->
  </div>
</div>
@stop