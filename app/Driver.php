<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function saveDriver(Driver $driver) {
        return 'Saved';
    }

    public function editDriver(Driver $driver) {
        return 'Edited';
    }

    public function deleteDriver(Driver $driver) {
        return 'Deleted';
    }
}
