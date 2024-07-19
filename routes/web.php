<?php

use App\Http\Controllers\ApproveController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RentalCompanyController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Models\Approve;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('vehicles', VehicleController::class);
    Route::resource('reservations', ReservationController::class);
    Route::prefix('reservations')->group(function () {
        Route::get('/to-excel', [ReservationController::class, 'toExcel'])->name('reservations.toExcel');
    });
    Route::resource('drivers', DriverController::class);
    Route::resource('company', RentalCompanyController::class);

    Route::get('/approve', [ApproveController::class, 'index'])->name('approve.index');
    Route::get('/approve/{id}', [ApproveController::class, 'detail'])->name('approve.detail');
    Route::put('/approve/{id_reservation}', [ApproveController::class, 'approve'])->name('approve.approve');
    Route::patch('/reservations/{id}/approve', [Approve::class, 'approve'])->name('reservations.approve');

});


