<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Plant;
use App\Models\Video;
use App\Models\Book;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'articles_count' => Article::count(),
            'plants_count' => Plant::count(),
            'videos_count' => Video::count(),
            'books_count' => Book::count(),
            'subscribers_count' => Subscriber::count(),
            'total_revenue' => Book::sum(DB::raw('price * (CASE WHEN type = "digital" THEN 1 ELSE 0 END)')), // Mock logic for revenue based on digital sales as placeholder
        ];

        // Fetch recent activities from various models
        $recent_articles = Article::latest()->take(3)->get()->map(function($article) {
            return [
                'activity' => 'New Article Published',
                'title' => $article->title,
                'section' => 'Research',
                'created_at' => $article->created_at,
                'date' => $article->created_at->diffForHumans(),
                'status' => ucfirst($article->status),
                'icon' => 'fa-pen-to-square',
                'color' => 'warning'
            ];
        });

        $recent_plants = Plant::latest()->take(2)->get()->map(function($plant) {
            return [
                'activity' => 'New Plant Cataloged',
                'title' => $plant->name,
                'section' => 'Encyclopedia',
                'created_at' => $plant->created_at,
                'date' => $plant->created_at->diffForHumans(),
                'status' => 'Verified',
                'icon' => 'fa-leaf',
                'color' => 'success'
            ];
        });

        $recent_videos = Video::latest()->take(2)->get()->map(function($video) {
            return [
                'activity' => 'Video Lesson Added',
                'title' => $video->title,
                'section' => 'Library',
                'created_at' => $video->created_at,
                'date' => $video->created_at->diffForHumans(),
                'status' => 'Live',
                'icon' => 'fa-play',
                'color' => 'info'
            ];
        });

        $activities = $recent_articles->concat($recent_plants)->concat($recent_videos)
            ->sortByDesc('created_at')
            ->take(5);

        return view('dashboard', compact('stats', 'activities'));
    }
}
