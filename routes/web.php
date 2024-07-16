<?php

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

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

//routes for vehicle
Route::resource('vehicles', VehicleController::class);

Route::get('/index-reservasi', function () {
    return view('reservasi.index');
});

Route::get('/create-reservasi', function () {
    return view('reservasi.create');
});
