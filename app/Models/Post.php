<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    
    /**
     * The model fillable's properties
     * 
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'slug'
    ];

    /**
     * The "booted" method of the model.
     * 
     * @return void
     */
    protected static function boot(): void
    {
        parent::boot();

        static::saving(function($post) {
            if (!$post->slug) {
                $slug = Str::slug($post->title);
                $post->slug = $slug;
            }
        });
    }
}
