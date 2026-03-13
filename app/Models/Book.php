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

    public function getCoverImagesAttribute()
    {
        $coverData = $this->cover;
        
        // Handle double encoding if it exists
        if (is_string($coverData) && str_starts_with($coverData, '[')) {
            $coverData = json_decode($coverData, true);
        }
        
        if (is_array($coverData)) {
            return array_values(array_filter($coverData));
        } elseif (is_string($coverData) && !empty($coverData)) {
            return [$coverData];
        }
        
        return [];
    }

    public function getPrimaryCoverAttribute()
    {
        $images = $this->cover_images;
        return count($images) > 0 ? $images[0] : null;
    }
}
