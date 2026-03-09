<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Article;
use App\Models\Book;
use App\Models\Promotion;
use App\Models\SocialMediaAccount;
use App\Models\Setting;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle product search.
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        $category = $request->get('category');
        
        $plantsQuery = Plant::query();
        
        if ($query) {
            $plantsQuery->where('name', 'LIKE', "%{$query}%")
                      ->orWhere('description', 'LIKE', "%{$query}%")
                      ->orWhere('scientific_name', 'LIKE', "%{$query}%");
        }
        
        if ($category) {
            $plantsQuery->where('category', $category);
        }
        
        $searchResults = $plantsQuery->orderBy('name', 'asc')->take(20)->get();
        
        return view('search', compact('searchResults', 'query', 'category'));
    }

    /**
     * Display the welcome page with real data.
     */
    public function index()
    {
        // Get featured plants (medicinal herbs) - using available columns
        $featuredPlants = Plant::orderBy('name', 'asc')
            ->take(8)
            ->get();

        // Get latest articles/blog posts
        $latestArticles = Article::where('status', 'published')
            ->orderBy('published_at', 'desc')
            ->get();

        // Get featured books
        $featuredBooks = Book::orderBy('title', 'asc')
            ->get();

        // Get active promotions
        $activePromotions = Promotion::where('is_active', true)
            ->where(function($query) {
                $query->whereNull('starts_at')
                    ->orWhere('starts_at', '<=', now());
            })
            ->where(function($query) {
                $query->whereNull('ends_at')
                    ->orWhere('ends_at', '>=', now());
            })
            ->orderBy('sort_order', 'asc')
            ->get();

        // Get social media accounts for footer
        $socialAccounts = SocialMediaAccount::active()
            ->ordered()
            ->get();

        // Categories for search and navigation
        $categories = [
            ['name' => 'Respiratory & Cold', 'icon' => 'bi-lungs', 'count' => 24],
            ['name' => 'Digestive Health', 'icon' => 'bi-cup-hot', 'count' => 18],
            ['name' => 'Immunity & Energy', 'icon' => 'bi-shield-check', 'count' => 32],
            ['name' => 'Skin & Beauty', 'icon' => 'bi-heart', 'count' => 15],
            ['name' => 'Women\'s Health', 'icon' => 'bi-person', 'count' => 12],
            ['name' => 'Books & Guides', 'icon' => 'bi-book', 'count' => 8],
        ];

        $owner_phone = Setting::where('key', 'owner_phone')->first()?->value;

        // Testimonials (mock data for now - could be moved to database)
        $testimonials = [
            [
                'content' => 'The moringa powder gave me real energy – no more afternoon fatigue!',
                'author' => 'Abeba T.',
                'location' => 'Addis Ababa',
                'rating' => 5
            ],
            [
                'content' => 'Finally found authentic Ethiopian herbs. The quality is exceptional!',
                'author' => 'Kedir M.',
                'location' => 'Dire Dawa',
                'rating' => 5
            ],
            [
                'content' => 'Their consultation service helped me find the right remedy for my condition.',
                'author' => 'Sara H.',
                'location' => 'Bahir Dar',
                'rating' => 5
            ]
        ];

        return view('welcome', compact(
            'featuredPlants',
            'latestArticles', 
            'featuredBooks',
            'activePromotions',
            'socialAccounts',
            'categories',
            'testimonials',
            'owner_phone'
        ));
    }
}
