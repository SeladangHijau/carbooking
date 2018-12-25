<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Driver;
use App\Car;

class DriverController extends Controller
{
    public function index() {
        return view('driver/listing')->with([
            'drivers' => Driver::getDriverListing()
        ]);
    }

    public function createDriverPage() {
        return view('driver/create');
    }
    public function create(Request $request) {
        $driver = [
            'name' => $request['driver_name'],
            'tel' => $request['driver_tel']
        ];
        $car = [
            'model' => $request['car_model'],
            'color' => $request['car_color'],
            'plate_no' => $request['car_plate_no']
        ];
        
        Driver::saveDriver($driver, $car);

        return redirect('/driver');
    }

    public function getDriverInfo(Request $request) {
        $driverId = $request['id'];

        return response()->json(Driver::getDriverCarInfo($driverId));
    }

    public function edit(Request $request) {
        $driverId = $request['id'];
        $driver = [
            'id' => $driverId,
            'name' => $request['driver_name'],
            'tel' => $request['driver_tel']
        ];
        $car = [
            'driver_id' => $driverId,
            'model' => $request['car_model'],
            'color' => $request['car_color'],
            'plate_no' => $request['car_plate_no']
        ];

        Driver::editDriver($driver, $car);
        
        return redirect('/driver');
    }
    
    public function delete(Request $request) {
        $driver = [ 'id' => $request['id'] ];
        Driver::deleteDriver($driver);
        
        return redirect('/driver');
    }
}
