<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'movie_id',
        'rating',
    ];

    // Avaliação pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Avaliação pertence a um filme
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    
}
