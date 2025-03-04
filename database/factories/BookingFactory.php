<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'karaoke_id' => \App\Models\Karaoke::factory(),
            'booking_time' => $this->faker->dateTimeBetween('now', '+1 month'),
            'duration' => $this->faker->numberBetween(1, 5), // Duration in hours
        ];
    }
}