@extends('layouts.welcome')

@section('title', $book->title . ' - Ethiopian Traditional Medicine Book')

@section('content')
<!-- Book Hero -->
<section class="py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Books</a></li>
                <li class="breadcrumb-item active">{{ Str::limit($book->title, 40) }}</li>
            </ol>
        </nav>
        
        <div class="row">
            <div class="col-lg-5">
                <div class="bg-white p-4 shadow-sm">
                    @if($book->cover)
                        <img src="{{ asset('storage/' . $book->cover) }}" class="img-fluid rounded" alt="{{ $book->title }}">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center rounded" style="height: 400px;">
                            <i class="bi bi-book fs-1 text-muted"></i>
                        </div>
                    @endif
                    
                    <div class="mt-4">
                        <span class="badge bg-primary mb-3">{{ ucfirst($book->type) }}</span>
                        <h2 class="display-5 mb-3 serif">{{ $book->title }}</h2>
                        
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="h4 text-primary fw-bold">{{ number_format($book->price, 2) }} ETB</span>
                            @if($book->stock !== null)
                                <span class="badge bg-success">{{ $book->stock }} in stock</span>
                            @else
                                <span class="badge bg-info">Digital Download</span>
                            @endif
                        </div>
                        
                        <div class="d-grid gap-2">
                            @if($book->stock !== null && $book->stock > 0)
                                <button class="btn btn-dark btn-lg">Order Physical Copy</button>
                            @endif
                            @if($book->type === 'digital' || $book->file)
                                <button class="btn btn-outline-dark btn-lg">
                                    <i class="bi bi-download"></i> Download Digital Copy
                                </button>
                            @endif
                        </div>
                        
                        <div class="mt-4 text-center">
                            <small class="text-muted">
                                <i class="bi bi-shield-check"></i> Secure Payment • Fast Delivery
                            </small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-7">
                <div class="bg-white p-4 shadow-sm h-100">
                    <h4 class="mb-4">About This Book</h4>
                    <div class="book-description">
                        <p class="lead">{{ $book->description }}</p>
                    </div>
                    
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3">Book Details</h6>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <strong>Type:</strong> {{ ucfirst($book->type) }}
                                </li>
                                <li class="mb-2">
                                    <strong>Format:</strong> {{ $book->type === 'digital' ? 'PDF Download' : 'Physical Copy' }}
                                </li>
                                @if($book->stock !== null)
                                    <li class="mb-2">
                                        <strong>Availability:</strong> {{ $book->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3">Delivery Information</h6>
                            <ul class="list-unstyled">
                                @if($book->type === 'physical')
                                    <li class="mb-2">
                                        <i class="bi bi-truck text-primary"></i> Free shipping on orders over 1000 ETB
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-clock text-primary"></i> 2-3 business days delivery
                                    </li>
                                @else
                                    <li class="mb-2">
                                        <i class="bi bi-download text-primary"></i> Instant download
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-phone text-primary"></i> Compatible with all devices
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Books -->
@if($relatedBooks->isNotEmpty())
<section class="py-5">
    <div class="container">
        <h3 class="mb-4 text-center">Related Books</h3>
        <div class="row">
            @foreach($relatedBooks as $related)
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        @if($related->cover)
                            <img src="{{ asset('storage/' . $related->cover) }}" class="card-img-top" alt="{{ $related->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-book fs-1 text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <span class="badge bg-secondary mb-2">{{ ucfirst($related->type) }}</span>
                            <h6 class="card-title">{{ Str::limit($related->title, 50) }}</h6>
                            <p class="card-text text-muted small">{{ Str::limit($related->description, 80) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">{{ number_format($related->price, 2) }} ETB</span>
                                <a href="{{ route('books.show', $related->slug) }}" class="btn btn-outline-dark btn-sm">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Call to Action -->
<section class="py-5 bg-dark text-white">
    <div class="container text-center">
        <h3 class="mb-3 serif">Need Personal Guidance?</h3>
        <p class="mb-4 opacity-75">Book a consultation with our traditional medicine experts.</p>
        <a href="{{ route('consultation.index') }}" class="btn btn-light btn-lg">Schedule Consultation</a>
    </div>
</section>
@endsection
