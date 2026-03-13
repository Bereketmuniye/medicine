<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = \App\Models\Book::withCount('comments')->latest()->paginate(15);
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:digital,physical',
            'cover' => 'nullable|array|max:5',
            'cover.*' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'file' => 'nullable|file|mimes:pdf,epub|max:10240',
            'stock' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['slug'] = \Illuminate\Support\Str::slug($request->title) . '-' . time();
        
        // Generate unique book_id
        $lastBook = \App\Models\Book::orderBy('id', 'desc')->first();
        $nextId = $lastBook ? ((int)str_replace('BOOK-', '', $lastBook->book_id) + 1) : 1;
        $data['book_id'] = 'BOOK-' . str_pad($nextId, 4, '0', STR_PAD_LEFT);
        
        // Store multiple cover images as JSON array
        $covers = [];
        if ($request->hasFile('cover')) {
            foreach ($request->file('cover') as $cover) {
                $covers[] = $cover->store('books/covers', 'public');
            }
        }
        $data['cover'] = !empty($covers) ? json_encode($covers) : null;

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('books/files', 'private'); // Store in private disk if possible
        }

        $book = \App\Models\Book::create($data);


        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Book added to store successfully!'
            ]);
        }

        return redirect()->route('admin.books.index')
            ->with('success', 'Book added to store successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:digital,physical',
            'cover' => 'nullable|array|max:5',
            'cover.*' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'file' => 'nullable|file|mimes:pdf,epub|max:10240',
            'stock' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        
        // Handle multiple cover images like in store method
        $covers = [];
        if ($request->hasFile('cover')) {
            // Delete old covers if they exist
            if ($book->cover) {
                $oldCovers = json_decode($book->cover, true);
                if (is_array($oldCovers)) {
                    foreach ($oldCovers as $oldCover) {
                        \Illuminate\Support\Facades\Storage::disk('public')->delete($oldCover);
                    }
                } else {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($book->cover);
                }
            }
            
            foreach ($request->file('cover') as $cover) {
                $covers[] = $cover->store('books/covers', 'public');
            }
        }
        $data['cover'] = !empty($covers) ? json_encode($covers) : $book->cover;

        if ($request->hasFile('file')) {
            if ($book->file) {
                \Illuminate\Support\Facades\Storage::disk('private')->delete($book->file);
            }
            $data['file'] = $request->file('file')->store('books/files', 'private');
        }

        $book->update($data);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Book details updated successfully!'
            ]);
        }

        return redirect()->route('admin.books.index')
            ->with('success', 'Book details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        // Delete multiple cover images if they exist
        if ($book->cover) {
            $covers = json_decode($book->cover, true);
            if (is_array($covers)) {
                foreach ($covers as $cover) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($cover);
                }
            } else {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($book->cover);
            }
        }
        if ($book->file) {
            \Illuminate\Support\Facades\Storage::disk('private')->delete($book->file);
        }
        $book->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Book removed from store!');
    }
}
