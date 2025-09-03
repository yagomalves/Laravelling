<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'movie_id',
        'content',
    ];

    // Comentário pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Comentário pertence a um filme
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}
