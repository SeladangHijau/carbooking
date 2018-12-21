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

Route::get('/driver/create', 'DriverController@create');
Route::get('/driver/edit', 'DriverController@edit');
Route::get('/driver/delete', 'DriverController@delete');

Route::get('/booking/create', 'BookingController@create');
Route::get('/booking/edit', 'BookingController@edit');
Route::get('/booking/delete', 'BookingController@delete');
