<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('index');
});


Route::get('/', [BookingController::class, 'index']);
Route::get('/bookings/create', [BookingController::class, 'create']);
Route::post('/bookings', [BookingController::class, 'store']);
Route::get('/bookings/{id}/edit', [BookingController::class, 'edit']);
Route::put('/bookings/{id}', [BookingController::class, 'update']);
Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);
