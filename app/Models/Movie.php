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
        'image_path'
        // imagem do filme
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

    public function averageRating()
    {
        if ($this->ratings->count() === 0) {
            return 0; // ou null, se preferir
        }

        return round($this->ratings->avg('rating'), 1);
    }
    // Faz com que average_rating apareça ao usar ->toArray() ou JsonResource
    protected $appends = ['average_rating'];

    // Accessor: chama o seu método original
    public function getAverageRatingAttribute()
    {
        return $this->averageRating(); // já arredonda lá dentro
    }
}
