<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'slug',
        'contenu',
        'titre1',
        'titre2',
        'titre3',
        'image1',
        'image2',
        'image3',
        'paragraphe1',
        'paragraphe2',
        'paragraphe3',
        'conclusion',
    ];

    public function imageUrl():string{
        return Storage::url($this->image);
    }

    public function imageUrl1():string{
        return Storage::url($this->image1);
    }

    public function imageUrl2():string{
        return Storage::url($this->image2);
    }

    public function imageUrl3():string{
        return Storage::url($this->image3);
    }

    public function  user(): BelongsTo
    {
       return $this->belongsTo(User::class);
    }

    public function categorie(): BelongsToMany
    {
        return $this->belongsToMany(Categorie::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getCommentCountAttribute()
    {
        return $this->comments()->count();
    }
}
