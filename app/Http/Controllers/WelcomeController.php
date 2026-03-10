<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Article;
use App\Models\Book;
use App\Models\Promotion;
use App\Models\SocialMediaAccount;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Newsletter;
use App\Models\Contact;

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
     * Handle newsletter subscription.
     */
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
            'name' => 'nullable|string|max:255'
        ]);

        try {
            Newsletter::subscribe($request->email, $request->name);
            
            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing! Check your email for weekly wisdom.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.'
            ], 500);
        }
    }

    /**
     * Handle contact form submission.
     */
    public function contact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10'
        ]);

        try {
            Contact::createMessage(
                $request->name,
                $request->email,
                $request->subject,
                $request->message
            );
            
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your message! We\'ll get back to you within 24 hours.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.'
            ], 500);
        }
    }

    /**
     * Display the welcome page with real data.
     */
    public function index()
    {
        // Get featured plants (medicinal herbs) - using available columns
        $featuredPlants = Plant::orderBy('name', 'asc')
            ->take(8)
            ->get()
            ->map(function ($plant) {
                // Add realistic pricing based on plant type
                $plant->price = match($plant->name) {
                    'Tena Adam' => '24.99',
                    'Moringa' => '19.99',
                    'Feto' => '34.99',
                    'Gesho' => '29.99',
                    default => '29.99'
                };
                return $plant;
            });

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

        // Get social media accounts
        $socialAccounts = SocialMediaAccount::where('is_active', true)
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
        $contact_email = Setting::where('key', 'contact_email')->first()?->value;

        // Get contact messages
        $contactMessages = Contact::latest()->take(5)->get();

        // Get real videos from database
        $videos = Video::with('category')->latest()->take(6)->get();

        // Get real counts for hero stats
        $stats = [
            'herbs_count' => Plant::count(),
            'clients_count' => 1250, // This could be from a clients table later
            'experts_count' => 24, // This could be from an experts table later
        ];

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
            'owner_phone',
            'contact_email',
            'stats',
            'videos',
            'contactMessages'
        ));
    }
}
