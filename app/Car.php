<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [ 'driver_id', 'model', 'color', 'plate_no' ];

    public function saveCar(Car $car) {
        return 'Saved';
    }

    public function editCar(Car $car) {
        return 'Edited';
    }

    public function deleteCar(Car $car) {
        return 'Deleted';
    }
}
