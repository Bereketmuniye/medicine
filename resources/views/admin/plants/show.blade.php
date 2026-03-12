@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="{{ $plant->name }}" 
    subtitle="Detailed information about this medicinal plant"
>
    <x-slot name="action">
        <a href="{{ route('admin.plants.edit', $plant) }}" class="btn btn-outline-primary rounded-pill px-4 me-2">
            <i class="fa-solid fa-pen-to-square me-2"></i>Edit Plant
        </a>
        <a href="{{ route('admin.plants.index') }}" class="btn btn-secondary rounded-pill px-4">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to List
        </a>
    </x-slot>
</x-admin.card-header>

<div class="row">
    <!-- Plant Image and Basic Info -->
    <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm" style="border-radius: 24px;">
            <div class="card-body p-4">
                <!-- Plant Images -->
                <div class="text-center mb-4">
                    @if($plant->image)
                        @php
                            $images = json_decode($plant->image, true);
                        @endphp
                        
                        @if(is_array($images) && count($images) > 0)
                            <div class="plant-gallery">
                                <!-- Main Image with Zoom -->
                                <div class="main-image-container mb-3">
                                    <img 
                                        src="{{ asset('storage/' . $images[0]) }}" 
                                        class="img-fluid rounded-4 main-image" 
                                        alt="{{ $plant->name }} - Main Image"
                                        style="max-height: 300px; width: 100%; object-fit: cover; cursor: zoom-in;"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#imageModal"
                                        data-image="{{ asset('storage/' . $images[0]) }}"
                                        data-alt="{{ $plant->name }} - Image 1"
                                    >
                                </div>
                                
                                <!-- Thumbnails -->
                                @if(count($images) > 1)
                                    <div class="thumbnails-container d-flex flex-wrap justify-content-center gap-2">
                                        @foreach($images as $index => $imgPath)
                                            <img 
                                                src="{{ asset('storage/' . $imgPath) }}" 
                                                class="img-fluid rounded-2 thumbnail {{ $index == 0 ? 'active' : '' }}" 
                                                alt="{{ $plant->name }} - Image {{ $index + 1 }}"
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
                                src="{{ asset('storage/' . $plant->image) }}" 
                                class="img-fluid rounded-4 mb-3" 
                                alt="{{ $plant->name }}"
                                style="max-height: 300px; width: 100%; object-fit: cover; cursor: zoom-in;"
                                data-bs-toggle="modal" 
                                data-bs-target="#imageModal"
                                data-image="{{ asset('storage/' . $plant->image) }}"
                                data-alt="{{ $plant->name }}"
                            >
                        @endif
                    @else
                        <div class="bg-light rounded-4 d-flex align-items-center justify-content-center mb-3" style="height: 300px;">
                            <div class="text-center">
                                <i class="fa-solid fa-seedling fa-3x text-success opacity-50 mb-3"></i>
                                <p class="text-secondary mb-0">No Image Available</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Quick Info -->
                <div class="border-top pt-3">
                    <h6 class="fw-bold text-dark mb-3">Quick Information</h6>
                    
                    @if($plant->scientific_name)
                        <div class="mb-3">
                            <small class="text-secondary d-block">Scientific Name</small>
                            <span class="text-dark fst-italic">{{ $plant->scientific_name }}</span>
                        </div>
                    @endif

                    @if($plant->local_name)
                        <div class="mb-3">
                            <small class="text-secondary d-block">Local Name</small>
                            <span class="text-dark">{{ $plant->local_name }}</span>
                        </div>
                    @endif

                    @if($plant->region)
                        <div class="mb-3">
                            <small class="text-secondary d-block">Region</small>
                            <span class="text-dark">{{ $plant->region }}</span>
                        </div>
                    @endif

                    <div class="mb-3">
                        <small class="text-secondary d-block">Price</small>
                        @if($plant->price)
                            <span class="badge bg-success-subtle text-success rounded-pill px-3">
                                ETB {{ number_format($plant->price, 2, '.', ',') }}
                            </span>
                        @else
                            <span class="badge bg-secondary-subtle text-secondary rounded-pill px-3">
                                Free
                            </span>
                        @endif
                    </div>

                    <div class="mb-0">
                        <small class="text-secondary d-block">Medical Uses</small>
                        <span class="badge bg-info-subtle text-info rounded-pill px-3">
                            {{ $plant->uses->count() }} Uses
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Information -->
    <div class="col-lg-8 mb-4">
        <!-- Description -->
        @if($plant->description)
            <div class="card border-0 shadow-sm mb-4" style="border-radius: 24px;">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-dark mb-3">
                        <i class="fa-solid fa-info-circle text-primary me-2"></i>Description
                    </h6>
                    <div class="text-dark">
                        {!! $plant->description !!}
                    </div>
                </div>
            </div>
        @endif

        <!-- Medical Uses -->
        <div class="card border-0 shadow-sm mb-4" style="border-radius: 24px;">
            <div class="card-body p-4">
                <h6 class="fw-bold text-dark mb-4">
                    <i class="fa-solid fa-stethoscope text-success me-2"></i>Medical Uses
                </h6>
                
                @forelse($plant->uses as $use)
                    <div class="border rounded-3 p-3 mb-3" style="background: #f8f9fa;">
                        <div class="row">
                            @if($use->disease)
                                <div class="col-md-6 mb-3">
                                    <small class="text-secondary d-block">Treats</small>
                                    <strong class="text-dark">{{ $use->disease }}</strong>
                                </div>
                            @endif

                            @if($use->preparation)
                                <div class="col-md-6 mb-3">
                                    <small class="text-secondary d-block">Preparation</small>
                                    <span class="text-dark">{{ $use->preparation }}</span>
                                </div>
                            @endif

                            @if($use->dosage)
                                <div class="col-md-6 mb-3">
                                    <small class="text-secondary d-block">Dosage</small>
                                    <span class="text-dark">{{ $use->dosage }}</span>
                                </div>
                            @endif

                            @if($use->warning)
                                <div class="col-md-6 mb-0">
                                    <small class="text-secondary d-block">Warning</small>
                                    <span class="text-warning">{{ $use->warning }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center py-4 text-secondary">
                        <i class="fa-solid fa-stethoscope fa-2x opacity-25 mb-3"></i>
                        <p class="mb-0">No medical uses recorded for this plant.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Safety Warning -->
        @if($plant->safety_warning)
            <div class="card border-0 shadow-sm mb-4" style="border-radius: 24px; border-left: 4px solid #dc3545 !important;">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-danger mb-3">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i>Safety Warning
                    </h6>
                    <div class="text-dark">
                        {!! nl2br(e($plant->safety_warning)) !!}
                    </div>
                </div>
            </div>
        @endif
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
