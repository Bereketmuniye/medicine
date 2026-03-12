<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'testimonial_id', 'client_name', 'client_email', 'client_position', 
        'client_company', 'content', 'rating', 'featured_image', 'status', 
        'order', 'is_featured', 'published_at'
    ];

    protected $casts = [
        'rating' => 'decimal:1',
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($testimonial) {
            if (empty($testimonial->testimonial_id)) {
                $testimonial->testimonial_id = 'TEST-' . str_pad(static::max('id') + 1, 4, '0', STR_PAD_LEFT);
            }
        });

        static::updating(function ($testimonial) {
            if ($testimonial->isDirty('status') && $testimonial->status === 'published' && !$testimonial->published_at) {
                $testimonial->published_at = now();
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
                    ->whereNotNull('published_at')
                    ->orderBy('order')
                    ->orderBy('published_at', 'desc');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getFormattedRatingAttribute()
    {
        return $this->rating ? number_format($this->rating, 1) : null;
    }
}
