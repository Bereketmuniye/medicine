<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'title', 'description', 'video_url', 'thumbnail', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getEmbedUrlAttribute()
    {
        $url = $this->video_url;

        // YouTube
        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
            return "https://www.youtube.com/embed/" . $match[1];
        }

        // YouTube Shorts
        if (preg_match('/shorts\/([^\/\?]+)/', $url, $match)) {
            return "https://www.youtube.com/embed/" . $match[1];
        }

        // Vimeo
        if (preg_match('%^https?://(?:www\.|player\.)?vimeo.com/(?:channels/(?:\w+/)?|groups/([^/]*)/videos/|album/(\d+)/video/|video/|)(\d+)(?:$|/|\?)%n', $url, $match)) {
            return "https://player.vimeo.com/video/" . $match[3];
        }
        // TikTok
        if (preg_match('/(?:tiktok\.com\/@.*\/video\/(\d+)|vm\.tiktok\.com\/([a-zA-Z0-9]+))/', $url, $match)) {
            $videoId = $match[1] ?? $match[2];
            return "https://www.tiktok.com/embed/v2/" . $videoId . "?mode=normal&hideHeader=1&hideCaption=1";
        }

        return $url;
    }
}
