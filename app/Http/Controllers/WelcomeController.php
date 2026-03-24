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
        
        $results = collect();

        if ($query) {
            // Search Plants
            $plants = Plant::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->orWhere('scientific_name', 'LIKE', "%{$query}%")
                ->get()
                ->map(function($item) {
                    $item->search_type = 'plant';
                    return $item;
                });
            $results = $results->concat($plants);

            // Search Books
            $books = Book::where('title', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->get()
                ->map(function($item) {
                    $item->search_type = 'book';
                    return $item;
                });
            $results = $results->concat($books);

            // Search Articles
            $articles = Article::where('status', 'published')
                ->where(function($q) use ($query) {
                    $q->where('title', 'LIKE', "%{$query}%")
                      ->orWhere('content', 'LIKE', "%{$query}%");
                })
                ->get()
                ->map(function($item) {
                    $item->search_type = 'article';
                    return $item;
                });
            $results = $results->concat($articles);
        }

        // Get owner phone for contact buttons
        $owner_phone = Setting::where('key', 'owner_phone')->value('value');
        
        return view('search', [
            'results' => $results,
            'query' => $query,
            'owner_phone' => $owner_phone
        ]);
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
        ->get()
        ->map(function ($plant) {
            // Handle image field that might be array-like or string
            $imagePath = null;
            if ($plant->image) {
                // If image is a string representation of array or contains brackets, extract first path
                if (is_string($plant->image) && strpos($plant->image, '[') === 0) {
                    // Parse array-like string and get first image
                    preg_match('/"([^"]+)"/', $plant->image, $matches);
                    if (isset($matches[1])) {
                        $imagePath = $matches[1];
                    }
                } else {
                    $imagePath = $plant->image;
                }
            }
            
            // Add proper image URL
            if ($imagePath) {
                $plant->image_url = asset('storage/plants/' . basename($imagePath));
            } else {
                $plant->image_url = 'https://picsum.photos/seed/' . urlencode($plant->name) . '/400/300.jpg';
            }
            return $plant;
        });

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

    /**
     * Display all plants.
     */
    public function plantsIndex()
    {
        $plants = Plant::query()
            ->orderBy('name')
            ->get()
            ->map(function ($plant) {
                // Handle image field that might be array-like or string
                $imagePath = null;
                if ($plant->image) {
                    if (is_string($plant->image) && strpos($plant->image, '[') === 0) {
                        preg_match('/"([^"]+)"/', $plant->image, $matches);
                        if (isset($matches[1])) {
                            $imagePath = $matches[1];
                        }
                    } else {
                        $imagePath = $plant->image;
                    }
                }
                
                if ($imagePath) {
                    $plant->image_url = asset('storage/plants/' . basename($imagePath));
                } else {
                    $plant->image_url = 'https://picsum.photos/seed/' . urlencode($plant->name) . '/400/300.jpg';
                }
                return $plant;
            });

        return view('plants.index', compact('plants'));
    }

    /**
     * Display individual plant details.
     */
    public function showPlant($id)
    {
        $plant = Plant::findOrFail($id);
        
        // Handle image field that might be array-like or string
        $imagePath = null;
        if ($plant->image) {
            if (is_string($plant->image) && strpos($plant->image, '[') === 0) {
                preg_match('/"([^"]+)"/', $plant->image, $matches);
                if (isset($matches[1])) {
                    $imagePath = $matches[1];
                }
            } else {
                $imagePath = $plant->image;
            }
        }
        
        if ($imagePath) {
            $plant->image_url = asset('storage/plants/' . basename($imagePath));
        } else {
            $plant->image_url = 'https://picsum.photos/seed/' . urlencode($plant->name) . '/600/400.jpg';
        }

        // Get related plants (same region or similar name)
        $relatedPlants = Plant::where('id', '!=', $plant->id)
            ->where(function($query) use ($plant) {
                $query->where('region', $plant->region)
                      ->orWhereRaw('LOWER(name) LIKE ?', ['%' . strtolower(substr($plant->name, 0, 5)) . '%']);
            })
            ->limit(4)
            ->get()
            ->map(function ($relatedPlant) {
                if ($relatedPlant->image) {
                    $relatedPlant->image_url = asset('storage/plants/' . basename($relatedPlant->image));
                } else {
                    $relatedPlant->image_url = 'https://picsum.photos/seed/' . urlencode($relatedPlant->name) . '/300/200.jpg';
                }
                return $relatedPlant;
            });

        return view('plants.show', compact('plant', 'relatedPlants'));
    }
}
