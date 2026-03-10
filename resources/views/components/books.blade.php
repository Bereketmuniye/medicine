@if($featuredBooks->isNotEmpty())
<section class="py-5 bg-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">ANCIENT WISDOM</span>
            <h2 class="section-title">Featured <span>Books</span></h2>
        </div>
        
        <div class="row g-4">
            @foreach($featuredBooks->take(3) as $book)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="book-card">
                        <div class="book-image">
                            @if($book->cover)
                                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=400&q=80" alt="{{ $book->title }}">
                            @endif
                            <span class="book-badge">{{ $book->type == 'digital' ? 'Digital' : 'Physical' }}</span>
                        </div>
                        <div class="book-content">
                            <div class="book-type">{{ $book->type == 'digital' ? 'E-Book' : 'Print Book' }}</div>
                            <h5 class="book-title">{{ Str::limit($book->title, 40) }}</h5>
                            <div class="book-description">{{ Str::limit($book->description, 60) }}</div>
                            <div class="book-footer">
                                <div class="book-price">{{ $book->price ?? '450.00' }} ETB</div>
                                <button class="btn-reserve contact-btn" data-phone="{{ $owner_phone ?? '+251911XXXXXX' }}">
                                    <i class="bi bi-whatsapp"></i> Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
.book-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    height: 100%;
    display: flex;
    flex-direction: column;
}

.book-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.book-image {
    height: 180px;
    position: relative;
    overflow: hidden;
}

.book-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s;
}

.book-card:hover .book-image img {
    transform: scale(1.05);
}

.book-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: var(--primary-light);
    color: var(--primary);
    font-weight: 600;
    font-size: 0.65rem;
    padding: 0.2rem 0.8rem;
    border-radius: 20px;
    z-index: 2;
}

.book-content {
    padding: 1.2rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.book-type {
    color: var(--primary-light);
    font-size: 0.7rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 0.5rem;
}

.book-title {
    font-size: 1rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.book-description {
    color: var(--text-light);
    font-size: 0.8rem;
    line-height: 1.4;
    margin-bottom: 1rem;
    flex: 1;
}

.book-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 0.8rem;
}

.book-price {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--primary);
}

.book-card .btn-reserve {
    background: var(--primary);
    color: white;
    font-weight: 600;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    border: 2px solid transparent;
    transition: all 0.3s;
    cursor: pointer;
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    gap: 0.3rem;
}

.book-card .btn-reserve:hover {
    background: var(--primary-light);
    color: var(--primary);
}

@media (max-width: 768px) {
    .book-image {
        height: 150px;
    }
    
    .book-content {
        padding: 1rem;
    }
    
    .book-title {
        font-size: 0.9rem;
    }
    
    .book-description {
        font-size: 0.75rem;
    }
}
</style>
@endif
