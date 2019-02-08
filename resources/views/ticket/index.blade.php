@extends('layout')
@section('title', 'Tickets Index')

@section('index')
	<div class="d-flex flex-row justify-content-sm-around" style="margin-top: 2rem;">
		@if($tickets->count() == 0)
			<h3>No tickets available right now.</h3>
		@else
			@for($i = 0; $i < $tickets->count(); $i++)
				<div class="card" style="width: 18rem;">
				<div class="card-body">
				<h5 class="card-title">{{ $tickets[$i]->event->name }}</h5><br>
				<h6 class="card-subtitle mb-2">Location: <em>{{ $tickets[$i]->city->name }}</em></h6>
				<p class="card-text">Date: <u>{{ date_format(date_create($tickets[$i]->event_date), 'd, l M \'y') }}</u></p>
				<p>Price: <b>{{ $tickets[$i]->booking_amt }}/-</b></p>
				<p>Paid At: <b>{{ $tickets[$i]->paid_at }}</b></p>
				<center>
					@if(Session::has('cust_name') && Session::has('handler_user_id'))
					<a href="/inquiry/customer/{{ $tickets[$i]->id }}" class="card-link btn btn-sm btn-primary">Book</a>
					@else
					<a href="/ticket/{{ $tickets[$i]->id }}/edit" class="card-link btn btn-sm btn-primary">Book</a>
				</center>
				</div>
				</div>
			@endfor
		@endif
	</div>
	<!-- checking session data to alter ticket_status -->
		@if(Session::has('cust_name') && Session::has('handler_user_id'))
		    <p>{{ $_SESSION['cust_name'] }} - {{ Session::get('handler_user_id')->id }}</p>
		@endif
@endsection