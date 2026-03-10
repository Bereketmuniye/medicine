@if($latestArticles->isNotEmpty())
<section class="py-5 bg-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">KNOWLEDGE & WISDOM</span>
            <h2 class="section-title">Latest <span>Insights</span></h2>
        </div>
        
        <div class="row g-4">
            @foreach($latestArticles->take(3) as $article)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="article-card">
                        <div class="article-image">
                            @if($article->featured_image)
                                <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&w=800&q=80" alt="Article">
                            @endif
                        </div>
                        <div class="article-content">
                            <div class="article-meta">{{ $article->published_at ? $article->published_at->format('M d, Y') : 'Recently' }}</div>
                            <h5 class="article-title">{{ Str::limit($article->title, 50) }}</h5>
                            <p class="article-excerpt">{{ Str::limit(strip_tags($article->content), 100) }}</p>
                            <a href="#" class="btn-read">
                                Read More <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
