<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function ticketStatus(){
    	return $this->belongsTo(TicketStatus::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function handler() {
    	return $this->belongsTo(User::class);
    }

    public function event() {
    	return $this->belongsTo(Event::class);
    }

    public function city() {
    	return $this->belongsTo(City::class);
    }

}
