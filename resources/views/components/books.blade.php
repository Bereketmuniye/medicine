@if($featuredBooks->isNotEmpty())
<section class="py-5 bg-light" id="books">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">ጥንታዊ ጥበብ</span>
            <h2 class="section-title">የተለያዩ <span>መጻሕፍት</span></h2>
        </div>
        
        <!-- Three Books in Same Row -->
        <div class="row g-4">
            @foreach($featuredBooks->take(3) as $book)
                <div class="col-lg-4 col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="featured-book-layout">
                        <div class="featured-book-image">
                            @if($book->primary_cover)
                                <img src="{{ asset('storage/' . $book->primary_cover) }}" alt="{{ $book->title }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=400&q=80" alt="{{ $book->title }}">
                            @endif
                            <span class="price-badge {{ ($book->price && $book->price > 0) ? '' : 'free' }}">
                                @if($book->price && $book->price > 0)
                                    {{ number_format($book->price, 0) }} {{ __('messages.currency') }}
                                @else
                                    {{ __('messages.free') }}
                                @endif
                            </span>
                        </div>
                        <div class="featured-book-content">
                            <div class="book-category">{{ ucfirst($book->type) }}</div>
                            <h3 class="featured-book-title">{{ Str::limit($book->title, 30) }}</h3>
                            <div class="featured-author">Featured by Shalom Herbal Medicine</div>
                            <p class="featured-description">{{ Str::limit($book->description, 100) }}</p>
                            <div class="featured-meta">
                                <div class="book-price">
                                    @if($book->price && $book->price > 0)
                                        {{ number_format($book->price, 2) }} {{ __('messages.currency') }}
                                    @else
                                        {{ __('messages.free') }}
                                    @endif
                                </div>
                                <button class="btn-reserve contact-btn" data-phone="{{ $owner_phone ?? '+251 91 163 1253' }}">
                                    <i class="bi bi-whatsapp"></i> {{ __('messages.order_now') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <!-- Grid of other books if any -->
        @if($featuredBooks->count() > 3)
            <div class="row g-4 mt-4">
                @foreach($featuredBooks->slice(3) as $book)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <x-book-card :book="$book" :ownerPhone="$owner_phone ?? '+251 91 163 1253'" />
                    </div>
                @endforeach
            </div>
        @endif
        
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('books.index') }}" class="btn-action" style="max-width: 250px; margin: 0 auto;">
                ሁሉንም መጻሕፍት ይመልከቱ <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endif