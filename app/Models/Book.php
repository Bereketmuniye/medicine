<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_id', 'title', 'slug', 'description', 'price', 
        'type', 'cover', 'file', 'stock'
    ];

    protected $casts = [
        'cover' => 'array',
    ];

    public function interactions()
    {
        return $this->hasMany(ArticleInteraction::class, 'article_id');
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
