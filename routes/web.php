<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app', function () {
    return view('layouts.app');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/index-angkutan', function () {
    return view('angkutan.index');
});

Route::get('/create-angkutan', function () {
    return view('angkutan.create');
});

Route::get('/edit-angkutan', function () {
    return view('angkutan.edit');
});

Route::get('/show-angkutan', function () {
    return view('angkutan.show');
});

Route::get('/index-reservasi', function () {
    return view('reservasi.index');
});

Route::get('/create-reservasi', function () {
    return view('reservasi.create');
});
