<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Driver;
use App\Car;

class DriverController extends Controller
{
    public function index() {
        $drivers = [];

        $drivers = Driver::all();
        foreach($drivers as $driver) {
            $car = Car::where('driver_id', $driver->id)->first();
            $driver['car_model'] = $car['model'];
            $driver['car_color'] = $car['color'];
            $driver['car_plate_no'] = $car['plate_no'];
        }

        return view('driver/listing')->with([
            'drivers' => $drivers
        ]);
    }

    public function createDriver() {
        return view('driver/create');
    }

    public function create(Request $request) {
        $newDriver = new Driver();

        $driverInfo = new Driver();
        $driverInfo->name = $request['name'];
        $driverInfo->tel = $request['tel'];
        $driverInfo->location = $request['location'];

        $carInfo = new Car();
        $carInfo->model = $request['model'];
        $carInfo->color = $request['color'];
        $carInfo->plate_no = $request['plate_no'];
        
        $newDriver->saveDriver($driverInfo, $carInfo);

        return redirect('/driver');
    }

    public function getDriverInfo(Request $request) {
        $driverId = $request['id'];

        $tempDriver = new Driver();
        $tempDriver->id = $driverId;

        return response()->json($tempDriver->getDriverInfo($driverId));
    }
    public function edit(Request $request) {
        $driverId = $request['id'];

        $tempDriver = new Driver();
        $tempDriver->id = $driverId;
        $tempDriver->name = $request['driver_name'];
        $tempDriver->tel = $request['driver_tel'];
        $tempDriver->location = $request['driver_location'];

        $tempCar = new Car();
        $tempCar->driver_id = $driverId;
        $tempCar->model = $request['car_model'];
        $tempCar->color = $request['car_color'];
        $tempCar->plate_no = $request['car_plate_no'];

        $tempDriver->editDriver($tempDriver, $tempCar);
        
        return redirect('/driver');
    }
    
    public function delete(Request $request) {
        $driverId = $request['id'];

        $tempDriver = new Driver();
        $tempDriver->id = $driverId;
        $tempDriver->deleteDriver($tempDriver);
        
        return redirect('/driver');
    }
}
