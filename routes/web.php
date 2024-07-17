<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\RentalCompanyController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {
        return view('layouts.app');
    })->name('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

//routes for vehicle
Route::resource('vehicles', VehicleController::class);

Route::resource('reservations', ReservationController::class);

Route::resource('drivers', DriverController::class);

Route::get('/edit-driver', function () {
    return view('driver.edit');
});

Route::resource('company', RentalCompanyController::class);
