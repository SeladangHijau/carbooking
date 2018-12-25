<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [ 'user_id', 'driver_id', 'point_a', 'point_b' ];

    public static function saveBooking($user, $driver, $booking) {
        $tempDriver = Driver::find((int) $driver['driver_id']);
        $newUser = User::create([
            'name' => $user['name'],
            'tel' => $user['tel'],
            'email' => $user['email']
        ]);
        $newBooking = Booking::create([
            'user_id' => $newUser->id,
            'driver_id' => $tempDriver->id,
            'point_a' => $booking['point_a'],
            'point_b' => $booking['point_b']
        ]);
    }

    public static function editBooking($booking) {
        $bookingId = $booking['id'];

        $tempBooking = Booking::find($bookingId);
        $tempBooking->point_a = $booking['point_a'];
        $tempBooking->point_b = $booking['point_b'];
        $tempBooking->save();
    }

    public static function deleteBooking($booking) {
        $bookingId = $booking['id'];
        
        $tempBooking = Booking::find($bookingId);
        $tempBooking->delete();
    }

    public static function getBookingListing() {
        $bookingList = [];

        $bookings = Booking::all();
        foreach($bookings as $booking) {
            $user = User::find($booking->user_id);
            $driver = Driver::find($booking->driver_id);

            $bookingList[] = [
                'id' => $booking->id,
                'user_name' => $user->name,
                'driver_name' => $driver->name,
                'location_from' => $booking->point_a,
                'location_to' => $booking->point_b
            ];
        }

        return $bookingList;
    }

    public static function getBookingInfo($bookingId) {
        $booking = Booking::find($bookingId);
        $driver = Driver::find($booking->driver_id);
        $user = User::find($booking->user_id);
        
        $bookingInfo = [
            'driver_name' => $driver->name,
            'user_name' => $user->name,
            'point_a' => $booking->point_a,
            'point_b' => $booking->point_b
        ];
        
        return [
            'bookingInfo' => $bookingInfo
        ];
    }
}
