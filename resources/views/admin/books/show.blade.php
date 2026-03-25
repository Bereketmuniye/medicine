@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="{{ $book->title }}" 
    subtitle="Detailed information about this book"
>
    <x-slot name="action">
        <a href="{{ route('admin.books.edit', $book) }}" class="btn btn-outline-primary rounded-pill px-3 px-md-4 me-2">
            <i class="fa-solid fa-pen-to-square me-2"></i>Edit Book
        </a>
        <a href="{{ route('admin.books.index') }}" class="btn btn-secondary rounded-pill px-3 px-md-4">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to List
        </a>
    </x-slot>
</x-admin.card-header>

<div class="row g-4">
    <!-- Book Cover and Basic Info -->
    <div class="col-lg-4 col-md-5">
        <div class="card border-0 shadow-sm" style="border-radius: 24px; background: #fff;">
            <div class="card-body p-3 p-md-4">
                <!-- Book Cover Images -->
                <div class="text-center mb-4">
                    @if($book->cover)
                        @php
                            $covers = json_decode($book->cover, true);
                        @endphp
                        
                        @if(is_array($covers) && count($covers) > 0)
                            <div class="book-gallery">
                                <!-- Main Image with Zoom -->
                                <div class="main-image-container mb-3">
                                    <img 
                                        src="{{ asset('storage/' . $covers[0]) }}" 
                                        class="img-fluid rounded-4 main-image" 
                                        alt="{{ $book->title }} - Main Cover"
                                        style="max-height: 250px; width: 100%; object-fit: cover; cursor: zoom-in;"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#imageModal"
                                        data-image="{{ asset('storage/' . $covers[0]) }}"
                                        data-alt="{{ $book->title }} - Cover 1"
                                    >
                                </div>
                                
                                <!-- Thumbnails -->
                                @if(count($covers) > 1)
                                    <div class="thumbnails-container d-flex flex-wrap justify-content-center gap-2">
                                        @foreach($covers as $index => $coverPath)
                                            <img 
                                                src="{{ asset('storage/' . $coverPath) }}" 
                                                class="img-fluid rounded-2 thumbnail {{ $index == 0 ? 'active' : '' }}" 
                                                alt="{{ $book->title }} - Cover {{ $index + 1 }}"
                                                style="max-height: 50px; width: 50px; object-fit: cover; cursor: pointer; border: 2px solid {{ $index == 0 ? '#007bff' : 'transparent' }}; transition: all 0.3s ease;"
                                                data-main-image="{{ asset('storage/' . $coverPath) }}"
                                                data-index="{{ $index }}"
                                            >
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @else
                            <img 
                                src="{{ asset('storage/' . $book->cover) }}" 
                                class="img-fluid rounded-4 mb-3" 
                                alt="{{ $book->title }}"
                                style="max-height: 250px; width: 100%; object-fit: cover; cursor: zoom-in;"
                                data-bs-toggle="modal" 
                                data-bs-target="#imageModal"
                                data-image="{{ asset('storage/' . $book->cover) }}"
                                data-alt="{{ $book->title }}"
                            >
                        @endif
                    @else
                        <div class="bg-light rounded-4 d-flex align-items-center justify-content-center mb-3" style="height: 250px;">
                            <div class="text-center">
                                <i class="fa-solid fa-book fa-2x fa-md-3x text-secondary opacity-50 mb-3"></i>
                                <p class="text-secondary mb-0 small">No Cover Available</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Quick Info -->
                <div class="border-top pt-3">
                    <h6 class="fw-bold text-dark mb-3">Quick Information</h6>
                    
                    <div class="mb-3">
                        <small class="text-secondary d-block">Book ID</small>
                        <span class="text-dark fw-bold">{{ $book->book_id }}</span>
                    </div>

                    <div class="mb-3">
                        <small class="text-secondary d-block">Format</small>
                        <span class="badge {{ $book->type === 'digital' ? 'bg-info' : 'bg-warning' }} rounded-pill px-3">
                            {{ ucfirst($book->type) }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <small class="text-secondary d-block">Price</small>
                        <span class="badge bg-success-subtle text-success rounded-pill px-3">
                            ETB {{ number_format($book->price, 2, '.', ',') }}
                        </span>
                    </div>

                    @if($book->type === 'physical')
                        <div class="mb-3">
                            <small class="text-secondary d-block">Stock</small>
                            <span class="text-dark fw-bold">{{ $book->stock }} units</span>
                        </div>
                    @endif

                    @if($book->file && $book->type === 'digital')
                        <div class="mb-0">
                            <small class="text-secondary d-block">Digital File</small>
                            <span class="badge bg-primary-subtle text-primary rounded-pill px-3">
                                <i class="fa-solid fa-file-pdf me-1"></i>Available
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Information -->
    <div class="col-lg-8 col-md-7">
        <!-- Description -->
        @if($book->description)
            <div class="card border-0 shadow-sm mb-4" style="border-radius: 24px;">
                <div class="card-body p-3 p-md-4">
                    <h6 class="fw-bold text-dark mb-3">
                        <i class="fa-solid fa-file-alt text-primary me-2"></i>Description
                    </h6>
                    <div class="text-dark">
                        {!! nl2br(e($book->description)) !!}
                    </div>
                </div>
            </div>
        @endif

        <!-- Book Details -->
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 24px;">
            <div class="card-body p-3 p-md-4">
                <h6 class="fw-bold text-dark mb-4">
                    <i class="fa-solid fa-info-circle text-primary me-2"></i>Book Information
                </h6>
                <div class="row">
                    <div class="col-sm-6 col-12 mb-3">
                        <small class="text-secondary d-block">Book ID</small>
                        <span class="text-dark fw-bold">{{ $book->book_id }}</span>
                    </div>
                    <div class="col-sm-6 col-12 mb-3">
                        <small class="text-secondary d-block">Slug</small>
                        <span class="text-dark small">{{ $book->slug }}</span>
                    </div>
                    <div class="col-sm-6 col-12 mb-3">
                        <small class="text-secondary d-block">Price</small>
                        <span class="text-dark fw-bold">ETB {{ number_format($book->price, 2, '.', ',') }}</span>
                    </div>
                    <div class="col-sm-6 col-12 mb-3">
                        <small class="text-secondary d-block">Format</small>
                        <span class="text-dark">{{ ucfirst($book->type) }}</span>
                    </div>
                    <div class="col-sm-6 col-12 mb-3">
                        <small class="text-secondary d-block">Created</small>
                        <span class="text-dark small">{{ $book->created_at->format('M d, Y H:i') }}</span>
                    </div>
                    <div class="col-sm-6 col-12 mb-3">
                        <small class="text-secondary d-block">Updated</small>
                        <span class="text-dark small">{{ $book->updated_at->format('M d, Y H:i') }}</span>
                    </div>
                    @if($book->type === 'physical')
                        <div class="col-sm-6 col-12 mb-0">
                            <small class="text-secondary d-block">Stock</small>
                            <span class="text-dark fw-bold">{{ $book->stock }} units</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal for Zoom -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0">
                <div class="d-flex justify-content-between align-items-start">
                    <img id="modalImage" src="" class="img-fluid rounded-4" alt="" style="max-height: 80vh; width: auto;">
                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle thumbnail clicks to change main image
    const thumbnails = document.querySelectorAll('.thumbnail');
    const mainImage = document.querySelector('.main-image');
    
    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            const newImageSrc = this.getAttribute('data-main-image');
            const index = this.getAttribute('data-index');
            
            // Update main image
            mainImage.src = newImageSrc;
            mainImage.setAttribute('data-image', newImageSrc);
            mainImage.setAttribute('data-alt', mainImage.alt.replace(/Cover \d+/, 'Cover ' + (parseInt(index) + 1)));
            
            // Update active thumbnail styling
            thumbnails.forEach(t => {
                t.classList.remove('active');
                t.style.borderColor = 'transparent';
            });
            this.classList.add('active');
            this.style.borderColor = '#007bff';
        });
    });
    
    // Handle modal image display
    const imageModal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    
    imageModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const imageSrc = button.getAttribute('data-image');
        const imageAlt = button.getAttribute('data-alt');
        
        modalImage.src = imageSrc;
        modalImage.alt = imageAlt;
    });
});
</script>

<style>
/* Mobile-specific styles */
@media (max-width: 768px) {
    .main-image {
        max-height: 200px !important;
    }
    
    .thumbnail {
        max-height: 40px !important;
        width: 40px !important;
    }
    
    .thumbnails-container {
        gap: 1px !important;
    }
    
    .modal-dialog {
        margin: 10px !important;
    }
    
    .card-body {
        padding: 1rem !important;
    }
    
    .badge {
        font-size: 0.75rem !important;
        padding: 0.25rem 0.5rem !important;
    }
    
    h6 {
        font-size: 1rem !important;
    }
    
    .small {
        font-size: 0.8rem !important;
    }
}
</style>
@endsection
