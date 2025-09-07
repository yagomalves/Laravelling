<?php 
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class MovieFactory extends Factory
{
    public function definition(): array
    {
        // Certifique-se de que a pasta existe antes de tentar salvar
        if (!is_dir(storage_path('app/public/movies'))) {
            Storage::makeDirectory('public/movies');
        }
        
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(),
            'release_date' => fake()->date(),
          //  'image_path' => 'storage/movies/' . fake()->image(storage_path('app/public/movies'), 400, 600, null, false),
            'created_by' => User::all()->random()->id,

        ];
    }
}