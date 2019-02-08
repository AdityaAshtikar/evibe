@extends('layout')

@section('title', 'User Details')

@section('userForm')

	<br>
	<h3>Enter your details</h3>
	<br>
	<!-- error messages -->
			@if (count($errors) >0)
				<div class="alert alert-danger">
					<strong>Error: </strong>
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
	<form action="/ticket/{{ $ticket_id }}" method="GET">
		@csrf
		<input type="text" name="name" required minlength="5" class="form-control" placeholder="Name">
		<br>
		<input type="email" name="email" required class="form-control" placeholder="Email">
		<br>
		<input type="phone" name="phone" required minlength="10" class="form-control" placeholder="Phone"><br>
		<input type="submit" value="Submit" class="form-control btn btn-primary">
	</form>

@endsection