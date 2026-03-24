<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\ArticleInteraction;
use App\Models\SocialMediaAccount;
use App\Models\Setting;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of books.
     */
    public function index(Request $request)
    {
        $query = Book::orderBy('title', 'asc');

        // Filter by type if provided
        if ($request->has('type')) {
            $type = $request->get('type');
            $query->where('type', $type);
        }

        // Search functionality
        if ($request->has('search')) {
            $searchTerm = $request->get('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }

        $books = $query->paginate(12);
        
        // Get book types for filtering
        $bookTypes = Book::distinct('type')->pluck('type');
        
        // Featured books
        $featuredBooks = Book::orderBy('created_at', 'desc')->take(3)->get();

        // Get social media accounts for footer
        $socialAccounts = SocialMediaAccount::where('is_active', true)->get();

        return view('books.index', compact('books', 'bookTypes', 'featuredBooks', 'socialAccounts'));
    }

    /**
     * Display the specified book.
     */
    public function show($slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();

        // Get related books
        $relatedBooks = Book::where('id', '!=', $book->id)
            ->orderBy('title', 'asc')
            ->take(4)
            ->get();

        // Get social media accounts for footer
        $socialAccounts = SocialMediaAccount::where('is_active', true)->get();

        // Get owner phone for contact
        $owner_phone = Setting::where('key', 'owner_phone')->value('value');

        return view('books.show', compact('book', 'relatedBooks', 'socialAccounts', 'owner_phone'));
    }

    /**
     * Mark book as helpful
     */
    public function markHelpful(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $ipAddress = $request->ip();
        $userAgent = $request->userAgent();

        // Check if user already marked as helpful
        if ($book->hasUserMarkedHelpful($ipAddress)) {
            // Remove the helpful mark
            ArticleInteraction::where('article_id', $book->id)
                ->where('interaction_type', 'helpful')
                ->where('ip_address', $ipAddress)
                ->delete();
            
            return response()->json([
                'success' => true,
                'action' => 'removed',
                'count' => $book->helpfulCount()
            ]);
        } else {
            // Add helpful mark
            ArticleInteraction::create([
                'article_id' => $book->id,
                'interaction_type' => 'helpful',
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent
            ]);
            
            return response()->json([
                'success' => true,
                'action' => 'added',
                'count' => $book->helpfulCount()
            ]);
        }
    }

    /**
     * Record book share
     */
    public function recordShare(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        
        ArticleInteraction::create([
            'article_id' => $book->id,
            'interaction_type' => 'share',
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);
        
        return response()->json([
            'success' => true,
            'count' => $book->shareCount()
        ]);
    }
}
