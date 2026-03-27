@props(['book', 'ownerPhone' => '+251 91 163 1253'])

<div class="book-card" data-aos="fade-up">
    <!-- Image Section -->
    <a href="{{ route('books.show', $book->slug) }}" class="text-decoration-none">
        <div class="book-image">
            @if($book->primary_cover)
                <img src="{{ asset('storage/' . $book->primary_cover) }}" alt="{{ $book->title }}" loading="lazy">
            @else
                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=400&q=80" alt="{{ $book->title }}" loading="lazy">
            @endif
            
            <!-- Type Badge -->
            <span class="book-badge">{{ ucfirst($book->type) }}</span>
            
            <!-- Price Badge (Floating) -->
            <span class="price-badge {{ ($book->price && $book->price > 0) ? '' : 'free' }}">
                @if($book->price && $book->price > 0)
                    {{ number_format($book->price, 0) }} {{ __('messages.currency') }}
                @else
                    {{ __('messages.free') }}
                @endif
            </span>
        </div>
    </a>

    <!-- Content Section -->
    <div class="book-content">
        <div class="book-type">{{ ucfirst($book->type) }}</div>
        
        <h5 class="book-title">
            <a href="{{ route('books.show', $book->slug) }}" class="text-decoration-none">
                {{ Str::limit($book->title, 45) }}
            </a>
        </h5>
        
        <p class="book-description">
            {{ Str::limit(strip_tags($book->description), 100) }}
        </p>
        
        <!-- Footer / Call to Action -->
        <div class="book-footer">
            <div class="book-info-row">
                <div class="book-price">
                    @if($book->price && $book->price > 0)
                        {{ number_format($book->price, 0) }}<small>{{ __('messages.currency') }}</small>
                    @else
                        {{ __('messages.free') }}
                    @endif
                </div>
                
                <div class="book-stock">
                    @if($book->stock !== null && $book->stock > 0)
                        {{ $book->stock }} {{ __('messages.in_stock') }}
                    @elseif($book->stock === 0)
                        <span class="text-danger">{{ __('messages.out_of_stock') }}</span>
                    @else
                        {{ __('messages.digital_downloads') }}
                    @endif
                </div>
            </div>

            <button class="btn-reserve contact-btn" data-phone="{{ $ownerPhone }}">
                <i class="bi bi-whatsapp"></i> {{ __('messages.order_now') }}
            </button>
        </div>
    </div>
</div>
