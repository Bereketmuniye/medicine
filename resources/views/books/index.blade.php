@extends('layouts.welcome')

@section('title', 'Books - Ethiopian Traditional Medicine Library')

@section('content')
<!-- Hero Section -->
<section class="hero" style="height: 60vh; background: linear-gradient(135deg, var(--accent) 0%, #b45309 100%);">
    <div class="container h-100 d-flex align-items-center">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="text-white" data-aos="fade-up">
                    <h6 class="text-white mb-3 text-uppercase fw-bold" style="letter-spacing: 3px;">The Library</h6>
                    <h1 class="display-3 mb-4 serif">Ancient Wisdom & Modern Knowledge</h1>
                    <p class="lead opacity-90">Discover our curated collection of books on Ethiopian traditional medicine, from ancient Ge'ez manuscripts to modern botanical studies.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Books Section -->
<section class="py-5">
    <div class="container">
        <!-- Search and Filter -->
        <div class="row mb-5">
            <div class="col-lg-8">
                <form method="GET" action="{{ route('books.index') }}" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control" placeholder="Search books..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-dark">Search</button>
                </form>
            </div>
            <div class="col-lg-4">
                <select name="type" class="form-select" onchange="this.form.submit()">
                    <option value="">All Types</option>
                    @foreach($bookTypes as $type)
                        <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>
                            {{ ucfirst($type) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Featured Books -->
        @if($featuredBooks->isNotEmpty())
            <div class="row mb-5">
                <div class="col-12">
                    <h3 class="mb-4">Featured Books</h3>
                </div>
                @foreach($featuredBooks as $book)
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            @if($book->cover)
                                <img src="{{ asset('storage/' . $book->cover) }}" class="card-img-top" alt="{{ $book->title }}" style="height: 300px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
                                    <i class="bi bi-book fs-1 text-muted"></i>
                                </div>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <span class="badge bg-secondary align-self-start mb-2">{{ ucfirst($book->type) }}</span>
                                <h5 class="card-title">{{ Str::limit($book->title, 60) }}</h5>
                                <p class="card-text text-muted">{{ Str::limit($book->description, 100) }}</p>
                                <div class="mt-auto">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <span class="fw-bold text-primary">{{ number_format($book->price, 2) }} ETB</span>
                                        @if($book->stock !== null)
                                            <small class="text-muted">{{ $book->stock }} in stock</small>
                                        @else
                                            <small class="text-success">Digital Download</small>
                                        @endif
                                    </div>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('books.show', $book->slug) }}" class="btn btn-outline-dark btn-sm flex-fill">View Details</a>
                                        <button class="btn btn-dark btn-sm flex-fill">Order Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!-- All Books -->
        <div class="row">
            <div class="col-12">
                <h3 class="mb-4">All Books</h3>
            </div>
            @forelse($books as $book)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        @if($book->cover)
                            <img src="{{ asset('storage/' . $book->cover) }}" class="card-img-top" alt="{{ $book->title }}" style="height: 300px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
                                <i class="bi bi-book fs-1 text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-secondary align-self-start mb-2">{{ ucfirst($book->type) }}</span>
                            <h5 class="card-title">{{ Str::limit($book->title, 60) }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($book->description, 100) }}</p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="fw-bold text-primary">{{ number_format($book->price, 2) }} ETB</span>
                                    @if($book->stock !== null)
                                        <small class="text-muted">{{ $book->stock }} in stock</small>
                                    @else
                                        <small class="text-success">Digital Download</small>
                                    @endif
                                </div>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('books.show', $book->slug) }}" class="btn btn-outline-dark btn-sm flex-fill">View Details</a>
                                    <button class="btn btn-dark btn-sm flex-fill">Order Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="bi bi-book fs-1 text-muted mb-3"></i>
                    <h4>No books found</h4>
                    <p class="text-muted">Try adjusting your search or browse all categories.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($books->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $books->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
