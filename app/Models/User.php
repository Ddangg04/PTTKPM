<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Booking; // Import Booking

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // Danh sách các cột có thể cập nhật
    protected $fillable = ['name', 'email', 'phone', 'password'];

    // Quan hệ với bảng bookings
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'user_id');
    }
}
