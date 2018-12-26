<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Driver;
use App\Booking;
use App\User;

class BookingController extends Controller
{
    public function index() {
        return view('index')->with([
            'drivers' => Driver::getAllDriverCar()
        ]);
    }

    public function bookingListing() {
        return view('booking/listing')->with([
            'bookings' => Booking::getBookingListing()
        ]);
    }

    public function create(Request $request) {
        $user = [
            'name' => $request['user_name'],
            'tel' => $request['user_tel'],
            'email' => $request['user_email'],
        ];
        $driver = [
            'driver_id' => $request['driver_id']
        ];
        $booking = [
            'point_a' => $request['booking_pointA'],
            'point_b' => $request['booking_pointB']
        ];

        Booking::saveBooking($user, $driver, $booking);
        
        flash('Booking Registered!')->success();

        return redirect('/booking');
    }

    public function edit(Request $request) {
        $bookingId = $request['id'];
        $booking = [
            'id' => $bookingId,
            'point_a' => $request['location_from'],
            'point_b' => $request['location_to']
        ];

        Booking::editBooking($booking);

        flash('Booking Edited!')->success();
        
        return redirect('/booking');
    }
    
    public function delete(Request $request) {
        $booking = [ 'id' => $request['id'] ];
        Booking::deleteBooking($booking);

        flash('Booking Deleted!')->success();
        
        return redirect('/booking');
    }

    public function getBookingInfo(Request $request) {
        $bookingId = $request['id'];

        return response()->json(Booking::getBookingInfo($bookingId));
    }
}
