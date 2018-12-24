<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [ 'name', 'tel', 'location' ];

    public function saveDriver(Driver $driver, Car $car) {
        $driver = Driver::create([
            'name' => $driver->name,
            'tel' => $driver->tel,
            'location' => $driver->location
        ]);
        Car::create([
            'driver_id' => $driver->id,
            'model' => $car->model,
            'color' => $car->color,
            'plate_no' => $car->plate_no
        ]);
    }

    public function editDriver(Driver $driver, Car $car) {
        $driverId = $driver->id;

        $tempDriver = Driver::find($driverId);
        $tempDriver->name = $driver->name;
        $tempDriver->tel = $driver->tel;
        $tempDriver->location = $driver->location;
        $tempDriver->save();

        $tempCar = Car::where('driver_id', $driverId)->first();
        $tempCar->model = $car->model;
        $tempCar->color = $car->color;
        $tempCar->plate_no = $car->plate_no;
        $tempCar->save();
    }

    public function deleteDriver(Driver $driver) {
        $driverId = $driver->id;

        $car = Car::where('driver_id', $driverId)->first();
        $car->delete();

        $driver = Driver::find($driverId);
        $driver->delete();
    }

    public function getDriverInfo($driverId) {
        $driver = Driver::find($driverId);
        $car = Car::where('driver_id', $driverId)->first();

        $driverInfo = [
            'name' => $driver->name,
            'tel' => $driver->tel,
            'location' => $driver->location
        ];
        $carInfo = [
            'model' => $car->model,
            'color' => $car->color,
            'plate_no' => $car->plate_no
        ];

        return [
            'driverInfo' => $driverInfo,
            'carInfo' => $carInfo
        ];
    }
}
