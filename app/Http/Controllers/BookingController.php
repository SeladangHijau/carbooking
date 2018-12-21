<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create() {
        return 'Create page';
    }

    public function edit() {
        return 'Edit page';
    }

    public function delete() {
        return 'Delete page';
    }

    public function findDriver() {
        return 'Find driver page';
    }

    public function calcBooking() {
        return 'Calculate booking page';
    }

    public function book() {
        return 'Book page';
    }
}
