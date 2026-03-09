<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMediaAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'platform',
        'handle',
        'url',
        'description',
        'followers',
        'posts',
        'engagement_rate',
        'last_post_date',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'followers' => 'integer',
        'posts' => 'integer',
        'engagement_rate' => 'decimal:2',
        'sort_order' => 'integer',
        'last_post_date' => 'date',
    ];

    /**
     * Get the platform icon class
     */
    public function getIconAttribute()
    {
        $icons = [
            'facebook' => 'fa-brands fa-facebook',
            'instagram' => 'fa-brands fa-instagram',
            'twitter' => 'fa-brands fa-twitter',
            'linkedin' => 'fa-brands fa-linkedin',
            'youtube' => 'fa-brands fa-youtube',
            'tiktok' => 'fa-brands fa-tiktok',
        ];

        return $icons[$this->platform] ?? 'fa-brands fa-globe';
    }

    /**
     * Get the platform display name
     */
    public function getPlatformDisplayNameAttribute()
    {
        return ucfirst($this->platform);
    }

    /**
     * Get formatted followers count
     */
    public function getFormattedFollowersAttribute()
    {
        if ($this->followers >= 1000000) {
            return number_format($this->followers / 1000000, 1) . 'M';
        } elseif ($this->followers >= 1000) {
            return number_format($this->followers / 1000, 1) . 'K';
        }
        
        return number_format($this->followers);
    }

    /**
     * Get formatted engagement rate
     */
    public function getFormattedEngagementAttribute()
    {
        return number_format($this->engagement_rate, 1) . '%';
    }

    /**
     * Scope to get only active accounts
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to filter by platform
     */
    public function scopeByPlatform($query, $platform)
    {
        return $query->where('platform', $platform);
    }

    /**
     * Scope to order by sort order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc');
    }
}
