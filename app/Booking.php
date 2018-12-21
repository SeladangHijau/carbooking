<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function saveBooking(Booking $booking) {
        return 'Saved';
    }
}
