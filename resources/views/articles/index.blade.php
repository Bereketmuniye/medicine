@extends('layouts.welcome')

@section('title', 'Literature - Ethiopian Traditional Medicine Articles')

@section('content')
<!-- Hero Section -->
<section class="hero" style="height: 60vh; background: linear-gradient(135deg, var(--primary) 0%, #064e3b 100%);">
    <div class="container h-100 d-flex align-items-center">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="text-white" data-aos="fade-up">
                    <h6 class="text-accent mb-3 text-uppercase fw-bold" style="letter-spacing: 3px;">Knowledge & Wisdom</h6>
                    <h1 class="display-3 mb-4 serif">Traditional Ethiopian Medicine</h1>
                    <p class="lead opacity-75">Explore our collection of articles on ancient healing practices, medicinal plants, and holistic wellness.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Articles Section -->
<section class="py-5">
    <div class="container">
        <!-- Search and Filter -->
        <div class="row mb-5">
            <div class="col-lg-8">
                <form method="GET" action="{{ route('articles.index') }}" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Search articles..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-dark">Search</button>
                </form>
            </div>
            <div class="col-lg-4">
                <select name="category" class="form-select" onchange="this.form.submit()">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                            {{ $category->name }} ({{ $category->articles_count }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- All Articles -->
        <div class="row">
            <div class="col-12">
                <h3 class="mb-4">All Articles</h3>
            </div>
            @forelse($articles as $article)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        @if($article->featured_image)
                            <img src="{{ asset('storage/' . $article->featured_image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-journal-text fs-1 text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <div class="mb-2">
                                <small class="text-muted">{{ $article->published_at ? $article->published_at->format('M d, Y') : 'Recently' }}</small>
                                @if($article->categories->isNotEmpty())
                                    <span class="badge bg-secondary ms-2">{{ $article->categories->first()->name }}</span>
                                @endif
                            </div>
                            <h5 class="card-title">{{ Str::limit($article->title, 60) }}</h5>
                            <p class="card-text text-muted">{{ Str::limit(strip_tags($article->content), 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-outline-dark btn-sm">Read More</a>
                                <small class="text-muted"><i class="bi bi-eye"></i> {{ $article->views }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-journal-text fs-1 text-muted mb-3"></i>
                    <h4>No articles found</h4>
                    <p class="text-muted">Try adjusting your search or browse all categories.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($articles->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
