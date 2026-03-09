@extends('layouts.app')

@section('title', 'Search Results')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                    <li class="breadcrumb-item active">Search Results</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="h4 mb-0">Search Results</h2>
                @if($query)
                    <small class="text-muted">Found {{ $searchResults->count() }} results for "{{ $query }}"</small>
                @endif
            </div>
            
            @forelse($searchResults as $plant)
                <div class="product-card h-100 border-0 shadow-sm mb-4">
                    <div class="product-image-container position-relative">
                        @if($plant->image && file_exists(public_path('storage/' . $plant->image)))
                            <img src="{{ asset('storage/' . $plant->image) }}" class="product-image" alt="{{ $plant->name }}">
                        @else
                            <img src="https://picsum.photos/seed/{{ str_slug($plant->name) }}/600/400.jpg" class="product-image" alt="{{ $plant->name }}">
                        @endif
                        <div class="product-badges">
                            <span class="badge bg-success text-white position-absolute top-0 end-0 m-2">
                                <i class="bi bi-star-fill"></i> {{ rand(4.2, 4.8) }}
                            </span>
                        </div>
                    </div>
                    <div class="product-body p-4">
                        <div class="product-header mb-3">
                            <h5 class="product-title fw-bold mb-2">{{ $plant->name }}</h5>
                            <div class="product-meta">
                                <small class="text-muted">
                                    <i class="bi bi-geo-alt-fill me-1"></i>{{ $plant->region ?? 'Ethiopia' }}
                                </small>
                            </div>
                        </div>
                        <p class="product-description text-muted small mb-3">{{ Str::limit($plant->description, 100) }}</p>
                        <div class="product-price-row d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <span class="product-price text-success fw-bold fs-4">{{ $plant->price ?? '450' }} ETB</span>
                                <small class="text-muted text-decoration-line-through">{{ $plant->original_price ?? '600' }} ETB</small>
                            </div>
                            <span class="discount-badge bg-warning text-dark px-2 py-1 rounded">-25%</span>
                        </div>
                        <div class="product-actions d-grid gap-2">
                            <button class="btn btn-outline-primary btn-sm w-100">
                                <i class="bi bi-heart me-2"></i>Save
                            </button>
                            <a href="tel:{{ setting('site_phone', '+251911234567') }}" class="btn btn-success contact-btn" data-phone="{{ setting('site_phone', '+251911234567') }}">
                                <i class="bi bi-telephone-fill me-2"></i>
                                <span class="btn-text">Contact Me</span>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-5">
                    <div class="empty-state">
                        <i class="bi bi-search fs-1 text-muted mb-3"></i>
                        <h5 class="text-muted">No products found</h5>
                        <p class="text-muted">
                            @if($query)
                                We couldn't find any products matching "{{ $query }}".
                            @else
                                No products available at the moment.
                            @endif
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('welcome') }}" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left me-2"></i>Back to Home
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4">Search Filters</h5>
                    
                    <form method="GET" action="{{ route('products.search') }}">
                        <div class="mb-3">
                            <label class="form-label">Search Again</label>
                            <input type="text" name="q" class="form-control" value="{{ $query }}" placeholder="Search products...">
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category" class="form-select">
                                <option value="">All Categories</option>
                                <option value="respiratory" {{ $category == 'respiratory' ? 'selected' : '' }}>Respiratory & Cold</option>
                                <option value="digestive" {{ $category == 'digestive' ? 'selected' : '' }}>Digestive Health</option>
                                <option value="immunity" {{ $category == 'immunity' ? 'selected' : '' }}>Immunity & Energy</option>
                                <option value="skin" {{ $category == 'skin' ? 'selected' : '' }}>Skin & Beauty</option>
                                <option value="books" {{ $category == 'books' ? 'selected' : '' }}>Books & Guides</option>
                                <option value="women" {{ $category == 'women' ? 'selected' : '' }}>Women's Health</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bi bi-search me-2"></i>Update Search
                        </button>
                    </form>
                    
                    <div class="mt-4">
                        <h6 class="text-muted mb-3">Popular Searches</h6>
                        <div class="list-group">
                            <a href="{{ route('products.search', ['q' => 'moringa']) }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-search me-2"></i>Moringa Powder
                            </a>
                            <a href="{{ route('products.search', ['q' => 'garlic']) }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-search me-2"></i>Garlic
                            </a>
                            <a href="{{ route('products.search', ['q' => 'ginger']) }}" class="list-group-item list-group-item-action">
                                <i class="bi bi-search me-2"></i>Ginger
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const contactButtons = document.querySelectorAll('.contact-btn');
    
    contactButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const phoneNumber = this.getAttribute('data-phone');
            const btnText = this.querySelector('.btn-text');
            
            // Change button text to phone number
            btnText.textContent = phoneNumber;
            
            // Add visual feedback
            this.classList.add('btn-success');
            this.classList.remove('btn-outline-success');
            
            // Change icon to show it's been clicked
            const icon = this.querySelector('i');
            icon.classList.remove('bi-telephone-fill');
            icon.classList.add('bi-check-circle');
        });
    });
});
</script>
@endsection
