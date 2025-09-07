<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Rating;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usuários
        $users = User::factory(10)->create();


        // Categorias fixas (pode trocar/expandir)
        $categories = Category::factory()->createMany([
            ['name' => 'Ação'],
            ['name' => 'Aventura'],
            ['name' => 'Drama'],
            ['name' => 'Comédia'],
            ['name' => 'Terror'],
            ['name' => 'Ficção Científica'],
            ['name' => 'Romance'],
            ['name' => 'Documentário'],
            ['name' => 'Animação'],
            ['name' => 'Fantasia'],
        ]);


        // Filmes
        $movies = Movie::factory(15)->create();


        // Associar filmes a categorias aleatórias
        foreach ($movies as $movie) {
            $movie->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        


        // Criar comentários para cada filme
            Comment::factory(rand(1, 5))->create();

            // Criar avaliações para cada filme
            Rating::factory(rand(1,8))->create();

        }
    }
}
