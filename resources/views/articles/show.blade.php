@extends('layouts.welcome')

@section('title', $article->title . ' - Ethiopian Traditional Medicine')

@section('content')
<!-- Article Hero -->
<section class="py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Literature</a></li>
                <li class="breadcrumb-item active">{{ Str::limit($article->title, 40) }}</li>
            </ol>
        </nav>
        
        <div class="row">
            <div class="col-lg-8">
                <div class="bg-white p-4 shadow-sm">
                    @if($article->featured_image)
                        <img src="{{ asset('storage/' . $article->featured_image) }}" class="img-fluid rounded mb-4" alt="{{ $article->title }}">
                    @endif
                    
                    <div class="mb-3">
                        @if($article->categories->isNotEmpty())
                            @foreach($article->categories as $category)
                                <span class="badge bg-primary me-2">{{ $category->name }}</span>
                            @endforeach
                        @endif
                    </div>
                    
                    <h1 class="display-5 mb-3 serif">{{ $article->title }}</h1>
                    
                    <div class="d-flex align-items-center mb-4 text-muted">
                        <small>
                            <i class="bi bi-calendar3"></i> {{ $article->published_at ? $article->published_at->format('F d, Y') : 'Recently' }}
                        </small>
                        <span class="mx-3">•</span>
                        <small><i class="bi bi-eye"></i> {{ $article->views }} views</small>
                        @if($article->author)
                            <span class="mx-3">•</span>
                            <small><i class="bi bi-person"></i> {{ $article->author->name }}</small>
                        @endif
                    </div>
                    
                    <div class="article-content">
                        {!! $article->content !!}
                    </div>
                    
                    <div class="mt-5 pt-4 border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex gap-3">
                                <button class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-hand-thumbs-up"></i> Helpful
                                </button>
                                <button class="btn btn-outline-secondary btn-sm">
                                    <i class="bi bi-share"></i> Share
                                </button>
                            </div>
                            <small class="text-muted">
                                Last updated: {{ $article->updated_at->format('M d, Y') }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <!-- Latest Articles -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Latest Articles</h5>
                        @foreach($latestArticles as $latest)
                            <div class="mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                <h6 class="mb-1">
                                    <a href="{{ route('articles.show', $latest->slug) }}" class="text-decoration-none text-dark">
                                        {{ Str::limit($latest->title, 50) }}
                                    </a>
                                </h6>
                                <small class="text-muted">{{ $latest->published_at ? $latest->published_at->format('M d') : 'Recently' }}</small>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                <!-- Related Articles -->
                @if($relatedArticles->isNotEmpty())
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Related Articles</h5>
                            @foreach($relatedArticles as $related)
                                <div class="mb-3 pb-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                                    <h6 class="mb-1">
                                        <a href="{{ route('articles.show', $related->slug) }}" class="text-decoration-none text-dark">
                                            {{ Str::limit($related->title, 50) }}
                                        </a>
                                    </h6>
                                    <small class="text-muted">{{ $related->published_at ? $related->published_at->format('M d') : 'Recently' }}</small>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-dark text-white">
    <div class="container text-center">
        <h3 class="mb-3 serif">Ready to Learn More?</h3>
        <p class="mb-4 opacity-75">Explore our collection of traditional Ethiopian medicine books and remedies.</p>
        <div class="d-flex gap-3 justify-content-center">
            <a href="{{ route('books.index') }}" class="btn btn-light">Browse Books</a>
            <a href="{{ route('consultation.index') }}" class="btn btn-outline-light">Get Consultation</a>
        </div>
    </div>
</section>
@endsection
