<section class="plants-section" id="plants">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">{{ __('messages.plants_subtitle') }}</span>
            <h2 class="section-title">{{ __('messages.plants_title') }} <span>{{ __('messages.plants_span') }}</span></h2>
            <p class="text-muted">{{ __('messages.plants_description') }}</p>
        </div>
        
        <!-- Plants Grid -->
        <div class="row g-4">
            @forelse($featuredPlants as $plant)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="plant-card">
                        <div class="plant-image">
                            <img src="{{ $plant->image_url }}" alt="{{ $plant->name }}" class="img-fluid" onerror="this.src='https://picsum.photos/seed/{{ urlencode($plant->name) }}/400/300.jpg'">
                            <div class="plant-overlay">
                                <div class="plant-actions">
                                    <a href="{{ route('plants.show', $plant->id) }}" class="btn btn-sm btn-light rounded-pill">
                                        <i class="bi bi-eye"></i> {{ __('messages.view_details') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="plant-content">
                            <h5 class="plant-name">{{ $plant->name }}</h5>
                            @if($plant->local_name)
                                <p class="plant-local-name text-muted">{{ $plant->local_name }}</p>
                            @endif
                            @if($plant->scientific_name)
                                <p class="plant-scientific text-muted fst-italic">{{ $plant->scientific_name }}</p>
                            @endif
                            @if($plant->region)
                                <p class="plant-region">
                                    <i class="bi bi-geo-alt"></i> {{ $plant->region }}
                                </p>
                            @endif
                            @if($plant->description)
                                <p class="plant-description">{{ Str::limit($plant->description, 100) }}</p>
                            @endif
                            @if($plant->safety_warning)
                                <div class="plant-warning alert alert-warning alert-sm">
                                    <i class="bi bi-exclamation-triangle"></i> {{ $plant->safety_warning }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="text-muted">
                        <i class="bi bi-flower1 fa-3x mb-3"></i>
                        <p>{{ __('messages.no_plants_available') }}</p>
                    </div>
                </div>
            @endforelse
        </div>
        
        @if($featuredPlants->count() > 0)
        <div class="text-center mt-5">
            <a href="#" class="btn btn-primary rounded-pill px-5 py-3">
                <i class="bi bi-grid-3x3-gap me-2"></i>{{ __('messages.view_all_plants') }}
            </a>
        </div>
        @endif
    </div>
</section>

<style>
.plants-section {
    padding: 80px 0;
    background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
}

.plant-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.plant-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.plant-image {
    position: relative;
    height: 250px;
    overflow: hidden;
}

.plant-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.plant-card:hover .plant-image img {
    transform: scale(1.1);
}

.plant-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.7));
    display: flex;
    align-items: flex-end;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.plant-card:hover .plant-overlay {
    opacity: 1;
}

.plant-actions {
    padding: 1.5rem;
    width: 100%;
}

.plant-content {
    padding: 1.5rem;
}

.plant-name {
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 0.5rem;
    font-size: 1.3rem;
}

.plant-local-name {
    font-size: 0.9rem;
    margin-bottom: 0.25rem;
    font-weight: 500;
}

.plant-scientific {
    font-size: 0.85rem;
    margin-bottom: 0.5rem;
}

.plant-region {
    font-size: 0.85rem;
    color: var(--primary-light);
    margin-bottom: 0.5rem;
}

.plant-description {
    font-size: 0.9rem;
    color: var(--text-light);
    line-height: 1.6;
    margin-bottom: 1rem;
}

.plant-warning {
    font-size: 0.8rem;
    padding: 0.5rem 0.75rem;
    margin-bottom: 0;
    border-radius: 10px;
}

.alert-sm {
    font-size: 0.8rem;
    padding: 0.5rem 0.75rem;
}

@media (max-width: 768px) {
    .plants-section {
        padding: 60px 0;
    }
    
    .plant-image {
        height: 200px;
    }
}
</style>
