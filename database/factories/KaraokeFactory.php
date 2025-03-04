<?php

namespace Database\Factories;

use App\Models\Karaoke;
use Illuminate\Database\Eloquent\Factories\Factory;

class KaraokeFactory extends Factory
{
    protected $model = Karaoke::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'location' => $this->faker->address,
            'capacity' => $this->faker->numberBetween(10, 200),
            'price_per_hour' => $this->faker->numberBetween(50, 500),
        ];
    }
}