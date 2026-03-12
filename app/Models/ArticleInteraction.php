<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleInteraction extends Model
{
    protected $fillable = [
        'article_id', 'interaction_type', 'ip_address', 'user_agent'
    ];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public static function getHelpfulCount($articleId)
    {
        return self::where('article_id', $articleId)
            ->where('interaction_type', 'helpful')
            ->count();
    }

    public static function getShareCount($articleId)
    {
        return self::where('article_id', $articleId)
            ->where('interaction_type', 'share')
            ->count();
    }

    public static function hasUserMarkedHelpful($articleId, $ipAddress)
    {
        return self::where('article_id', $articleId)
            ->where('interaction_type', 'helpful')
            ->where('ip_address', $ipAddress)
            ->exists();
    }
}
