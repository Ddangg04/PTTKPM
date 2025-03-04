<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\ServiceController;
use App\Models\User;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Foundation\Auth\User as AuthUser;

// Tuyến đường trang chủ
Route::get('/', function () {
    return view('welcome');
});

// Đăng ký và Đăng nhập
Route::get('/register', function () {
    return view('login'); // Đảm bảo view này tồn tại
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', function () {
    return view('login'); 

})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
    Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
    Route::get('/rooms/create', [RoomController::class, 'create'])->name('admin.rooms.create');
    Route::post('/rooms', [RoomController::class, 'store'])->name('admin.rooms.store');
    
    // Thêm route sửa phòng
    Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('admin.rooms.edit');
    Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('admin.rooms.update');
    
    // Thêm route xóa phòng
    Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('admin.rooms.destroy');

    // Thêm route xem danh sách dịch vụ

    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('admin.services.store');
    
    // Thêm route sửa phòng
    Route::get('/services/{services}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::put('/services/{services}', [ServiceController::class, 'update'])->name('admin.services.update');

    Route::delete('/services/{services}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');

    Route::get('/user', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/user', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

Route::get('/booking', [BookingController::class, 'userBookings'])->name('booking.index');



Route::middleware(['auth'])->group(function () {
    Route::resource('admin/users', UserController::class);
});
