<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'phone',
        'room_id',
        'booking_date',
        'booking_time',
        'user_id',
        'services',
        'status',
    ];

    protected $casts = [
        'services' => 'array',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}