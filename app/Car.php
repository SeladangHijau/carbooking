<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [ 'driver_id', 'model', 'color', 'plate_no' ];
}
