<?php 
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User; // Importar a classe User

class MovieFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'release_date' => fake()->date(),
            'image_path' => fake()->imageUrl(400, 600, 'movies'),
            'created_by' => User::all()->random()->id, // Atribui um ID de usuário aleatório
        ];
    }
}