<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Categoria pode ter vários filmes
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'category_movie');
    }
}
