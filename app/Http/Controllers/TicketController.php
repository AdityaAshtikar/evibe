<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\User;

use Session;

class TicketController extends Controller
{
    public function index() { /*shows all the tickets available*/
    	$ticket = new Ticket;
    	$tickets = $ticket::all();
    	return view('ticket.index')->with('tickets', $tickets);
    }

    public function book(Request $request) {
    	$ticket = new Ticket;
    	if(count($request->all()) <= 1) {
    		return redirect('/');
    	} else
	    	$tickets = Ticket::where("event_id" , $request->input('event_id'))->orWhere('city_id' , $request->input('city_id'))->get();
    	// return $tickets;
	    return view('ticket.index')->with('tickets', $tickets);
    }

    public function store(Request $request) {
    	$this->validate($request, [
    		'name' => 'required|min:5',
    		'phone' => 'required|min:10|max:10',
    		'email' => 'required|min:10'
    	]);
    	$name = $request->input('name');
    	$email = $request->input('email');
    	$phone = $request->input('phone');
    	// storing user
    	User::create([
    		'name' => $name,
    		'email' => $email,
    		'phone' => $phone,
    		'type_user_id' => 1,
    		'created_at' => date('Y-m-d h:i:s')
    	]);
    	Session::put('cust_name', $name);
    	Session::put('cust_email', $email);
    	Session::put('cust_phone', $phone);
    	// setting a random handler_user for this session's customer
    	$handler_user = User::where('type_user_id', '2')->get();
    	$handler = array_rand(json_decode(json_encode($handler_user), true));
    	Session::put('handler_user_id', $handler['id']);
    	$link = url()->current();
		$link_array = explode('/',$link);
		$ticket_id = end($link_array);
		// $tickets = json_encode(Ticket::find($ticket_id));
		$tickets = Ticket::where('id', $ticket_id)->get();
		// return $tickets;
		return redirect('ticket.index')->with('tickets', $tickets);
    }

    public function edit() {

    }
}
