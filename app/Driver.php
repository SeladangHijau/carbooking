<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [ 'name', 'tel' ];

    public static function saveDriver($driver, $car) {
        $driver = Driver::create([
            'name' => $driver['name'],
            'tel' => $driver['tel']
        ]);
        Car::create([
            'driver_id' => $driver['id'],
            'model' => $car['model'],
            'color' => $car['color'],
            'plate_no' => $car['plate_no']
        ]);

        return $driver;
    }

    public static function editDriver($driver, $car) {
        $driverId = $driver['id'];

        $tempDriver = Driver::find($driverId);
        $tempDriver->name = $driver['name'];
        $tempDriver->tel = $driver['tel'];
        $tempDriver->save();

        $tempCar = Car::where('driver_id', $driverId)->first();
        $tempCar->model = $car['model'];
        $tempCar->color = $car['color'];
        $tempCar->plate_no = $car['plate_no'];
        $tempCar->save();
    }

    public static function deleteDriver($driver) {
        $driverId = $driver['id'];

        $car = Car::where('driver_id', $driverId)->first();
        $car->delete();

        $driver = Driver::find($driverId);
        $driver->delete();
    }

    public static function getAllDriver() {
        return Driver::all();
    }

    public static function getAllDriverCar() {
        $driverCar = [];

        $drivers = Driver::all();
        foreach($drivers as $driver) {
            $car = Car::where('driver_id', $driver->id)->first();

            $driverCar[] = [
                'driver_id' => $driver->id,
                'driver_name' => $driver->name,
                'car_model' => $car->model
            ];
        }

        return $driverCar;
    }

    public static function getDriverListing() {
        $drivers = [];

        $drivers = Driver::all();
        foreach($drivers as $driver) {
            $car = Car::where('driver_id', $driver->id)->first();
            $driver['car_model'] = $car['model'];
            $driver['car_color'] = $car['color'];
            $driver['car_plate_no'] = $car['plate_no'];
        }

        return $drivers;
    }
    public static function getDriverCarInfo($driverId) {
        $driver = Driver::find($driverId);
        $car = Car::where('driver_id', $driverId)->first();

        $driverInfo = [
            'name' => $driver->name,
            'tel' => $driver->tel
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
