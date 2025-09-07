<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'rating' => fake()->numberBetween(0, 5),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'movie_id' => \App\Models\Movie::inRandomOrder()->first()->id,

        ];
    }
}
