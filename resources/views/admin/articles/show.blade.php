@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="{{ $article->title }}" 
    subtitle="Detailed information about this article"
>
    <x-slot name="action">
        <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-outline-primary rounded-pill px-4 me-2">
            <i class="fa-solid fa-pen-to-square me-2"></i>Edit Article
        </a>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary rounded-pill px-4">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to List
        </a>
    </x-slot>
</x-admin.card-header>

<div class="row">
    <!-- Article Image and Basic Info -->
    <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm" style="border-radius: 24px;">
            <div class="card-body p-4">
                <!-- Article Images -->
                <div class="text-center mb-4">
                    @if($article->featured_image)
                        @php
                            $images = json_decode($article->featured_image, true);
                        @endphp
                        
                        @if(is_array($images) && count($images) > 0)
                            <div class="article-gallery">
                                <!-- Main Image with Zoom -->
                                <div class="main-image-container mb-3">
                                    <img 
                                        src="{{ asset('storage/' . $images[0]) }}" 
                                        class="img-fluid rounded-4 main-image" 
                                        alt="{{ $article->title }} - Main Image"
                                        style="max-height: 300px; width: 100%; object-fit: cover; cursor: zoom-in;"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#imageModal"
                                        data-image="{{ asset('storage/' . $images[0]) }}"
                                        data-alt="{{ $article->title }} - Image 1"
                                    >
                                </div>
                                
                                <!-- Thumbnails -->
                                @if(count($images) > 1)
                                    <div class="thumbnails-container d-flex flex-wrap justify-content-center gap-2">
                                        @foreach($images as $index => $imgPath)
                                            <img 
                                                src="{{ asset('storage/' . $imgPath) }}" 
                                                class="img-fluid rounded-2 thumbnail {{ $index == 0 ? 'active' : '' }}" 
                                                alt="{{ $article->title }} - Image {{ $index + 1 }}"
                                                style="max-height: 60px; width: 60px; object-fit: cover; cursor: pointer; border: 2px solid {{ $index == 0 ? '#007bff' : 'transparent' }}; transition: all 0.3s ease;"
                                                data-main-image="{{ asset('storage/' . $imgPath) }}"
                                                data-index="{{ $index }}"
                                            >
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @else
                            <img 
                                src="{{ asset('storage/' . $article->featured_image) }}" 
                                class="img-fluid rounded-4 mb-3" 
                                alt="{{ $article->title }}"
                                style="max-height: 300px; width: 100%; object-fit: cover; cursor: zoom-in;"
                                data-bs-toggle="modal" 
                                data-bs-target="#imageModal"
                                data-image="{{ asset('storage/' . $article->featured_image) }}"
                                data-alt="{{ $article->title }}"
                            >
                        @endif
                    @else
                        <div class="bg-light rounded-4 d-flex align-items-center justify-content-center mb-3" style="height: 300px;">
                            <div class="text-center">
                                <i class="fa-solid fa-image fa-3x text-secondary opacity-50 mb-3"></i>
                                <p class="text-secondary mb-0">No Image Avail</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Information -->
    <div class="col-lg-8 mb-4">
        <!-- Categories -->
        @if($article->categories->count() > 0)
            <div class="card border-0 shadow-sm mb-4" style="border-radius: 24px;">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-dark mb-3">
                        <i class="fa-solid fa-tags text-primary me-2"></i>Categories
                    </h6>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($article->categories as $category)
                            <span class="badge bg-primary-subtle text-primary rounded-pill px-3">
                                {{ $category->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        <!-- Content -->
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 24px;">
            <div class="card-body p-4">
                <h6 class="fw-bold text-dark mb-3">
                    <i class="fa-solid fa-file-alt text-primary me-2"></i>Content
                </h6>
                <div class="text-dark">
                    {!! $article->content !!}
                </div>
            </div>
        </div>

        <!-- Article Metadata -->
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 24px;">
            <div class="card-body p-4">
                <h6 class="fw-bold text-dark mb-4">
                    <i class="fa-solid fa-info-circle text-primary me-2"></i>Article Information
                </h6>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <small class="text-secondary d-block">Article ID</small>
                        <span class="text-dark">{{ $article->article_id }}</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <small class="text-secondary d-block">Status</small>
                        <span class="badge {{ $article->status === 'published' ? 'bg-success' : 'bg-warning' }} rounded-pill px-3">
                            {{ ucfirst($article->status) }}
                        </span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <small class="text-secondary d-block">Slug</small>
                        <span class="text-dark">{{ $article->slug }}</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <small class="text-secondary d-block">Views</small>
                        <span class="text-dark">{{ number_format($article->views) }}</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <small class="text-secondary d-block">Created</small>
                        <span class="text-dark">{{ $article->created_at->format('M d, Y H:i') }}</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <small class="text-secondary d-block">Updated</small>
                        <span class="text-dark">{{ $article->updated_at->format('M d, Y H:i') }}</span>
                    </div>
                    @if($article->published_at)
                        <div class="col-md-6 mb-0">
                            <small class="text-secondary d-block">Published</small>
                            <span class="text-dark">{{ $article->published_at->format('M d, Y H:i') }}</span>
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
            mainImage.setAttribute('data-alt', mainImage.alt.replace(/Image \d+/, 'Image ' + (parseInt(index) + 1)));
            
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
@endsection
