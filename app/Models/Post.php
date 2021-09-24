<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, Sluggable, Searchable;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function searchableAs(): string
    {
        return 'posts';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = ['title', 'description', 'slug', 'image_path', 'user_id'];
}
