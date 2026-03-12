<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Article;
use App\Models\Book;
use App\Models\Promotion;
use App\Models\SocialMediaAccount;
use App\Models\Setting;
use App\Models\Testimonial;
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
    // ── Core data ────────────────────────────────────────────────
    $featuredPlants = Plant::query()
        ->orderBy('name')
        ->get();
        // No price assignment anymore — assuming price is now a real column 
        // or handled elsewhere (frontend, separate pricing table, etc.)

    $latestArticles = Article::query()
        ->where('status', 'published')
        ->latest('published_at')
        ->get();

    $featuredBooks = Book::query()
        ->orderBy('title')
        ->get();

    // ── Active promotions ────────────────────────────────────────
    $activePromotions = Promotion::query()
        ->where('is_active', true)
        ->where(fn($q) => $q
            ->whereNull('starts_at')
            ->orWhere('starts_at', '<=', now())
        )
        ->where(fn($q) => $q
            ->whereNull('ends_at')
            ->orWhere('ends_at', '>=', now())
        )
        ->orderBy('sort_order')
        ->get();

    // ── Categories (exactly as requested) ────────────────────────
    $categories = collect([
        ['name' => 'Respiratory & Cold',   'icon' => 'bi-lungs',        'count' => 24],
        ['name' => 'Digestive Health',     'icon' => 'bi-cup-hot',      'count' => 18],
        ['name' => 'Immunity & Energy',    'icon' => 'bi-shield-check', 'count' => 32],
        ['name' => 'Skin & Beauty',        'icon' => 'bi-heart',        'count' => 15],
        ['name' => "Women's Health",       'icon' => 'bi-person',       'count' => 12],
        ['name' => 'Books & Guides',       'icon' => 'bi-book',         'count' => 8],
    ]);

    // ── Stats ────────────────────────────────────────────────────
    $stats = [
        'herbs_count'   => Plant::count(),
        'clients_count' => 1250,    // consider making dynamic later
        'experts_count' => 24,
    ];

    // ── Settings ─────────────────────────────────────────────────
    $settings = Setting::whereIn('key', ['owner_phone', 'contact_email'])
        ->pluck('value', 'key');

    // ── Other data ───────────────────────────────────────────────
    $videos = Video::with('category')
        ->latest()
        ->take(6)
        ->get();

    $testimonials = Testimonial::query()
        ->latest()
        ->orderBy('order')
        ->orderBy('published_at', 'desc')
        ->get();

    return view('welcome', [
        'featuredPlants'    => $featuredPlants,
        'latestArticles'    => $latestArticles,
        'featuredBooks'     => $featuredBooks,
        'activePromotions'  => $activePromotions,
        'socialAccounts'    => SocialMediaAccount::where('is_active', true)->ordered()->get(),
        'categories'        => $categories,
        'testimonials'      => $testimonials,
        'owner_phone'       => $settings['owner_phone'] ?? null,
        'contact_email'     => $settings['contact_email'] ?? null,
        'stats'             => $stats,
        'videos'            => $videos,
        // 'contactMessages' => Contact::latest()->take(5)->get(), // usually not for public homepage
    ]);
}
}
