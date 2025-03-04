<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;

Route::get('/karaoke', [KController::class, 'index']);
Route::post('/karaoke', [KController::class, 'store']);
Route::get('/karaoke/{id}', [KController::class, 'show']);
Route::put('/karaoke/{id}', [KController::class, 'update']);
Route::delete('/karaoke/{id}', [KController::class, 'destroy']);

// Tuyến đường API cho Đặt phòng
Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');


// Tuyến đường API cho Người dùng
Route::get('/user', [UserController::class, 'index'])->name('user.index');
