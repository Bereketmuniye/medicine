<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'article_id', 'title', 'slug', 'content', 'featured_image', 
        'author_id', 'status', 'published_at', 'views'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'featured_image' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (empty($article->article_id)) {
                $article->article_id = 'ART-' . str_pad(static::max('id') + 1, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function interactions()
    {
        return $this->hasMany(ArticleInteraction::class);
    }

    public function helpfulCount()
    {
        return $this->interactions()->where('interaction_type', 'helpful')->count();
    }

    public function shareCount()
    {
        return $this->interactions()->where('interaction_type', 'share')->count();
    }

    public function hasUserMarkedHelpful($ipAddress)
    {
        return $this->interactions()
            ->where('interaction_type', 'helpful')
            ->where('ip_address', $ipAddress)
            ->exists();
    }
}
