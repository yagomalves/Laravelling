<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'content' => fake()->sentence(),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'movie_id' => \App\Models\Movie::inRandomOrder()->first()->id,
        ];
    }
}
