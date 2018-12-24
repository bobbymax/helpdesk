@if($total_row > 0)
	<ul class="dropdown-menu" style="display:block; position:relative">
	@foreach($users as $user)
		<li><a href="#">{{ $user->email }}</a></li>
	@endforeach
	</ul>
@endif