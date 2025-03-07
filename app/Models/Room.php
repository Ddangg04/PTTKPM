<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['room_number', 'name', 'room_type_id', 'status', 'price'];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }
}

