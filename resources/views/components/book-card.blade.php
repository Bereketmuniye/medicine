@props(['book', 'ownerPhone' => '+251 91 163 1253'])

<div class="book-card">
    <a href="{{ route('books.show', $book->slug) }}" class="text-decoration-none">
        <div class="book-image">
            @if($book->primary_cover)
                <img src="{{ asset('storage/' . $book->primary_cover) }}" alt="{{ $book->title }}" class="active">
            @else
                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=400&q=80" alt="{{ $book->title }}" class="active">
            @endif
            <span class="book-badge">{{ ucfirst($book->type) }}</span>
        </div>
    </a>
    <div class="book-content">
        <div class="book-type">{{ ucfirst($book->type) }}</div>
        <h5 class="book-title">
            <a href="{{ route('books.show', $book->slug) }}" class="text-decoration-none text-dark">
                {{ Str::limit($book->title, 40) }}
            </a>
        </h5>
        <div class="book-description">{{ Str::limit($book->description, 60) }}</div>
        <div class="book-footer">
            <div>
                <div class="book-price">{{ number_format($book->price, 2) }} ብር</div>
                <div class="book-stock">
                    @if($book->stock !== null)
                        {{ $book->stock }} በማእድና
                    @else
                        ዲጂታል ወርዶች
                    @endif
                </div>
            </div>
            <button class="btn-reserve contact-btn" data-phone="{{ $ownerPhone }}">
                <i class="bi bi-whatsapp"></i> ይዘዙ
            </button>
        </div>
    </div>
</div>
