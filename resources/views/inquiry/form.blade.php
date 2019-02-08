@extends('layout')

@section('title', 'Inquiry Form')

@section('inquiryForm')
	<br>
	<center>
		<h3>Inquire For events</h3>
	</center>
	<br>
	<form action="/ticket" method="POST">
		@csrf
		<select name="event_id" class="form-control">
			<option disabled selected value="">Select Event Type</option>
			@foreach($events as $event)
				<option value="{{ $event->id }}">{{ $event->name }}</option>
			@endforeach
		</select><br>
		<select name="city_id" class="form-control">
			<option disabled selected value="">Select City</option>
			@foreach($cities as $city)
				<option value="{{ $city->id }}">{{ $city->name }}</option>
			@endforeach
		</select><br>
		<input type="submit" class="btn btn-primary form-control" value="Search">
	</form>
@endsection