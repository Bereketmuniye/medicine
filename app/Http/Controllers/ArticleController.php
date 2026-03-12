<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleInteraction;
use App\Models\Category;
use App\Models\SocialMediaAccount;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of articles.
     */
    public function index(Request $request)
    {
        $query = Article::where('status', 'published')
            ->with(['categories', 'author'])
            ->orderBy('published_at', 'desc');

        // Filter by category if provided
        if ($request->has('category')) {
            $categorySlug = $request->get('category');
            $category = Category::where('slug', $categorySlug)->first();
            if ($category) {
                $query->whereHas('categories', function($q) use ($category) {
                    $q->where('categories.id', $category->id);
                });
            }
        }

        // Search functionality
        if ($request->has('search')) {
            $searchTerm = $request->get('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('content', 'LIKE', "%{$searchTerm}%");
            });
        }

        $articles = $query->paginate(12);
        $categories = Category::withCount('articles')->get();

        // Get social media accounts for footer
        $socialAccounts = SocialMediaAccount::where('is_active', true)->get();

        return view('articles.index', compact('articles', 'categories', 'socialAccounts'));
    }

    /**
     * Display the specified article.
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('status', 'published')
            ->with(['categories', 'author'])
            ->firstOrFail();

        // Increment view count
        $article->increment('views');

        // Get related articles
        $relatedArticles = Article::where('status', 'published')
            ->where('id', '!=', $article->id)
            ->whereHas('categories', function($q) use ($article) {
                $categoryIds = $article->categories->pluck('id');
                $q->whereIn('categories.id', $categoryIds);
            })
            ->take(4)
            ->get();

        // Get latest articles
        $latestArticles = Article::where('status', 'published')
            ->where('id', '!=', $article->id)
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        // Get social media accounts for footer
        $socialAccounts = SocialMediaAccount::where('is_active', true)->get();

        return view('articles.show', compact('article', 'relatedArticles', 'latestArticles', 'socialAccounts'));
    }

    /**
     * Mark article as helpful
     */
    public function markHelpful(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $ipAddress = $request->ip();
        $userAgent = $request->userAgent();

        // Check if user already marked as helpful
        if ($article->hasUserMarkedHelpful($ipAddress)) {
            // Remove the helpful mark
            ArticleInteraction::where('article_id', $article->id)
                ->where('interaction_type', 'helpful')
                ->where('ip_address', $ipAddress)
                ->delete();
            
            return response()->json([
                'success' => true,
                'action' => 'removed',
                'count' => $article->helpfulCount()
            ]);
        } else {
            // Add helpful mark
            ArticleInteraction::create([
                'article_id' => $article->id,
                'interaction_type' => 'helpful',
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent
            ]);
            
            return response()->json([
                'success' => true,
                'action' => 'added',
                'count' => $article->helpfulCount()
            ]);
        }
    }

    /**
     * Record article share
     */
    public function recordShare(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        
        ArticleInteraction::create([
            'article_id' => $article->id,
            'interaction_type' => 'share',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);
        
        return response()->json([
            'success' => true,
            'count' => $article->shareCount()
        ]);
    }
}
