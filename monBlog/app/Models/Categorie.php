<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function post(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Post::class);
    }

    // Méthode pour récupérer le nombre d'articles associés
    public function getArticleCountAttribute()
    {
        return $this->articles()->count();
    }
}
    

