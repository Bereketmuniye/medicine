<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = \App\Models\Article::with(['categories', 'author'])
            ->withCount('comments')
            ->latest()
            ->paginate(15);
            
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'status' => 'required|in:draft,published',
        'featured_image' => 'nullable|array|max:5',
        'featured_image.*' => 'nullable|image|mimes:jpg,jpeg,png,gif',
        'categories' => 'nullable|array',
        'categories.*' => 'exists:categories,id',
    ]);

    $data = $request->only(['title', 'content', 'status']);
    $data['slug'] = \Str::slug($request->title) . '-' . time();
    $data['author_id'] = auth()->id();

    $images = [];
    if ($request->hasFile('featured_image')) {
        foreach ($request->file('featured_image') as $image) {
            $images[] = $image->store('articles', 'public');
        }
    }
    $data['featured_image'] = !empty($images) ? json_encode($images) : null;

    if ($data['status'] === 'published') {
        $data['published_at'] = now();
    }

    $article = \App\Models\Article::create($data);

    if ($request->has('categories')) {
        $article->categories()->sync($request->categories);
    }

    if ($request->expectsJson() || $request->ajax()) {
        return response()->json([
            'success' => true,
            'message' => 'Article created successfully!'
        ]);
    }

    return redirect()->route('admin.articles.index')
        ->with('success', 'Article created successfully!');
}
    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->load(['categories', 'author']);
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = \App\Models\Category::all();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'status' => 'required|in:draft,published',
            'featured_image' => 'nullable|array|max:5',
            'featured_image.*' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
        ]);


        $data = $request->only(['title', 'content', 'status']);
        
        // Handle multiple images like in store method
        $images = [];
        if ($request->hasFile('featured_image')) {
            // Delete old images if they exist
            if ($article->featured_image) {
                $oldImages = json_decode($article->featured_image, true);
                if (is_array($oldImages)) {
                    foreach ($oldImages as $oldImage) {
                        \Illuminate\Support\Facades\Storage::disk('public')->delete($oldImage);
                    }
                } else {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($article->featured_image);
                }
            }
            
            foreach ($request->file('featured_image') as $image) {
                $images[] = $image->store('articles', 'public');
            }
        }
        $data['featured_image'] = !empty($images) ? json_encode($images) : $article->featured_image;

        if ($data['status'] === 'published' && !$article->published_at) {
            $data['published_at'] = now();
        }

        $article->update($data);

        if ($request->has('categories')) {
            $article->categories()->sync($request->categories);
        } else {
            $article->categories()->detach();
        }

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Article updated successfully!'
            ]);
        }

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->featured_image) {
            $images = json_decode($article->featured_image, true);
            if (is_array($images)) {
                foreach ($images as $image) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($image);
                }
            } else {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($article->featured_image);
            }
        }
        $article->delete();

        return redirect()->route('admin.articles.index')
            ->with('success', 'Article deleted successfully!');
    }
}
