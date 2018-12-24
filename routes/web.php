<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/driver', 'DriverController@index');
Route::get('/driver/createDriver', 'DriverController@createDriver');
Route::get('/driver/getDriverInfo', 'DriverController@getDriverInfo');

Route::get('/booking/createBooking', 'BookingController@createBooking');
Route::get('/booking/editBooking', 'BookingController@editBooking');
Route::get('/booking/deleteBooking', 'BookingController@deleteBooking');


Route::post('/driver/create', 'DriverController@create');
Route::post('/driver/edit', 'DriverController@edit');
Route::post('/driver/delete', 'DriverController@delete');

Route::post('/booking/create', 'BookingController@create');
Route::post('/booking/edit', 'BookingController@edit');
Route::post('/booking/delete', 'BookingController@delete');
