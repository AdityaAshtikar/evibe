<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function tickets() {
    	$this->hasMany(Ticket::class);
    }
}
