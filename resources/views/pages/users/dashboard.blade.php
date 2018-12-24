@extends('layouts.user')
@section('header-content')
<h1 class="display-2 text-white">Hello {{ Auth::user()->name }}</h1>
<p class="text-white mt-0 mb-5">This is your profile page. You can see the progress you've made with your work and manage your projects or assigned tasks</p>
	<a href="{{ route('tickets.create') }}" class="btn btn-warning">Create a Support Ticket</a>
@stop