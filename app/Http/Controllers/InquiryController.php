<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\City;
use Session;

class InquiryController extends Controller
{
	public function form() {
		$events = Event::all();
		$cities = City::all();
		if (Session::has('cust_name') && Session::has('user_handler_id')) {
			return redirect('/ticket/' . $ticket_id);
		}
		return view('inquiry.form')->with('events', $events)->with('cities', $cities);
	}
	
	public function store(Request $request) {
		$link = url()->current();
		$link_array = explode('/',$link);
		$ticket_id = end($link_array);
		// return $ticket_id;
		if (Session::has('cust_name') && Session::has('user_handler_id')) {
			return redirect('/ticket/' . $ticket_id);
		}
		return view('inquiry.user')->with('ticket_id', $ticket_id);
	}
}