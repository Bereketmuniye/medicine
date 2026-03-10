<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\SocialMediaAccount;
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

        return view('books.show', compact('book', 'relatedBooks', 'socialAccounts'));
    }
}
