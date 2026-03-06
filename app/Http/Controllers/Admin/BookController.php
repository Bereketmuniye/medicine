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
        $books = \App\Models\Book::latest()->paginate(15);
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
            'cover' => 'nullable|image|max:2048',
            'file' => 'nullable|file|mimes:pdf,epub|max:10240',
            'stock' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['slug'] = \Illuminate\Support\Str::slug($request->title) . '-' . time();
        
        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('books/covers', 'public');
        }

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('books/files', 'private'); // Store in private disk if possible
        }

        \App\Models\Book::create($data);

        return redirect()->route('admin.books.index')
            ->with('success', 'Book added to store successfully!');
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
            'cover' => 'nullable|image|max:2048',
            'file' => 'nullable|file|mimes:pdf,epub|max:10240',
            'stock' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $data = $request->all();
        
        if ($request->hasFile('cover')) {
            if ($book->cover) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($book->cover);
            }
            $data['cover'] = $request->file('cover')->store('books/covers', 'public');
        }

        if ($request->hasFile('file')) {
            if ($book->file) {
                \Illuminate\Support\Facades\Storage::disk('private')->delete($book->file);
            }
            $data['file'] = $request->file('file')->store('books/files', 'private');
        }

        $book->update($data);

        return redirect()->route('admin.books.index')
            ->with('success', 'Book details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->cover) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($book->cover);
        }
        if ($book->file) {
            \Illuminate\Support\Facades\Storage::disk('private')->delete($book->file);
        }
        $book->delete();

        return redirect()->route('admin.books.index')
            ->with('success', 'Book removed from store!');
    }
}
