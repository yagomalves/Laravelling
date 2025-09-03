<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'release_date',
        'poster', // imagem do filme
    ];

    // Filme pode ter várias categorias
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_movie');
    }

    // Filme pode ter muitos comentários
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Filme pode ter várias avaliações
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
