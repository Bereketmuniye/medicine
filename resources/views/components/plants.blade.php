<section class="plants-section" id="plants">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">{{ __('messages.plants_subtitle') }}</span>
            <h2 class="section-title">{{ __('messages.plants_title') }} <span>{{ __('messages.plants_span') }}</span></h2>
            <p class="section-description">{{ __('messages.plants_description') }}</p>
            <div class="view-full-link">
                <a href="{{ route('plants.index') }}" class="btn btn-link">{{ __('messages.view_all_plants') }} →</a>
            </div>
        </div>
        
        <!-- Curated Products Grid -->
        <div class="curated-grid">
            <div class="row g-4">
                @forelse($featuredPlants as $index => $plant)
                    @if($index == 0)
                        <!-- Large Feature Card - First Plant -->
                        <div class="col-lg-6" data-aos="fade-up">
                            <div class="curated-card large-card">
                                <div class="curated-image">
                                    <img src="{{ $plant->image_url ?? 'https://picsum.photos/seed/' . urlencode($plant->name) . '/800/600.jpg' }}" alt="{{ $plant->name }}" class="img-fluid" onerror="this.src='https://picsum.photos/seed/{{ urlencode($plant->name) }}/800/600.jpg'">
                                    <div class="curated-overlay">
                                        <div class="curated-content">
                                            <h3 class="curated-title">{{ $plant->name }}</h3>
                                            <p class="curated-description">{{ Str::limit(strip_tags($plant->description), 100) }}</p>
                                            <a href="{{ route('plants.show', $plant->id) }}" class="btn btn-primary">{{ __('messages.view_details') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Right Column for remaining plants -->
                        <div class="col-lg-6">
                            <div class="row g-4">
                    @endif
                    
                    @if($index == 1)
                        <!-- Medium Card - Second Plant -->
                        <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                            <div class="curated-card medium-card">
                                <div class="curated-image">
                                    <img src="{{ $plant->image_url ?? 'https://picsum.photos/seed/' . urlencode($plant->name) . '/800/400.jpg' }}" alt="{{ $plant->name }}" class="img-fluid" onerror="this.src='https://picsum.photos/seed/{{ urlencode($plant->name) }}/800/400.jpg'">
                                    <div class="curated-overlay">
                                        <div class="curated-content">
                                            <h4 class="curated-title">{{ $plant->name }}</h4>
                                            <p class="curated-description">{{ Str::limit(strip_tags($plant->description), 80) }}</p>
                                            <a href="{{ route('plants.show', $plant->id) }}" class="btn btn-outline-light btn-sm">{{ __('messages.view_details') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    @if($index == 2)
                        <!-- Small Card - Third Plant -->
                        <div class="col-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="curated-card small-card">
                                <div class="curated-image">
                                    <img src="{{ $plant->image_url ?? 'https://picsum.photos/seed/' . urlencode($plant->name) . '/400/300.jpg' }}" alt="{{ $plant->name }}" class="img-fluid" onerror="this.src='https://picsum.photos/seed/{{ urlencode($plant->name) }}/400/300.jpg'">
                                    <div class="curated-overlay">
                                        <div class="curated-content">
                                            <h5 class="curated-title">{{ $plant->name }}</h5>
                                            <p class="curated-description">{{ Str::limit(strip_tags($plant->description), 60) }}</p>
                                            <a href="{{ route('plants.show', $plant->id) }}" class="btn btn-outline-light btn-sm">{{ __('messages.view_details') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    @if($index == 3)
                        <!-- Small Card - Fourth Plant -->
                        <div class="col-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="curated-card small-card">
                                <div class="curated-image">
                                    <img src="{{ $plant->image_url ?? 'https://picsum.photos/seed/' . urlencode($plant->name) . '/400/300.jpg' }}" alt="{{ $plant->name }}" class="img-fluid" onerror="this.src='https://picsum.photos/seed/{{ urlencode($plant->name) }}/400/300.jpg'">
                                    <div class="curated-overlay">
                                        <div class="curated-content">
                                            <h5 class="curated-title">{{ $plant->name }}</h5>
                                            <p class="curated-description">{{ Str::limit(strip_tags($plant->description), 60) }}</p>
                                            <a href="{{ route('plants.show', $plant->id) }}" class="btn btn-outline-light btn-sm">{{ __('messages.view_details') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <!-- Fallback content when no plants available -->
                    <div class="col-12 text-center py-5">
                        <div class="text-muted">
                            <i class="bi bi-flower1 fa-3x mb-3"></i>
                            <p>{{ __('messages.no_plants_available') }}</p>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
        
        @if($featuredPlants->count() > 0)
        <div class="text-center mt-5">
            <a href="{{ route('plants.index') }}" class="btn btn-primary rounded-pill px-5 py-3">
                <i class="bi bi-grid-3x3-gap me-2"></i>{{ __('messages.view_all_plants') }}
            </a>
        </div>
        @endif
    </div>
</section>

<style>
.plants-section {
    padding: 100px 0;
    background: #ffffff;
}

.section-header {
    text-align: center;
    margin-bottom: 4rem;
}

.section-title {
    font-size: 3rem;
    font-weight: 700;
    color: #2d3748;
    margin-bottom: 1rem;
    font-family: 'Georgia', serif;
}

.section-description {
    font-size: 1.1rem;
    color: #718096;
    line-height: 1.8;
    max-width: 600px;
    margin: 0 auto 2rem;
    font-family: 'Georgia', serif;
}

.view-full-link {
    margin-top: 2rem;
}

.view-full-link .btn-link {
    color: #2d3748;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: all 0.3s ease;
    border: none;
    background: none;
    padding: 0;
}

.view-full-link .btn-link:hover {
    color: #718096;
    transform: translateX(5px);
}

.curated-grid {
    margin-top: 3rem;
}

.curated-card {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    background: #ffffff;
}

.curated-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.15);
}

.curated-image {
    position: relative;
    overflow: hidden;
}

.large-card .curated-image {
    height: 650px;
}

.medium-card .curated-image {
    height: 320px;
}

.small-card .curated-image {
    height: 280px;
}

.curated-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.curated-card:hover .curated-image img {
    transform: scale(1.05);
}

.curated-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, rgba(0,0,0,0.1), rgba(0,0,0,0.7));
    display: flex;
    align-items: flex-end;
    padding: 2rem;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.curated-card:hover .curated-overlay {
    opacity: 1;
}

.curated-content {
    color: white;
    width: 100%;
}

.large-card .curated-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    font-family: 'Georgia', serif;
}

.medium-card .curated-title {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    font-family: 'Georgia', serif;
}

.small-card .curated-title {
    font-size: 1.2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    font-family: 'Georgia', serif;
}

.curated-description {
    font-size: 0.9rem;
    margin-bottom: 1.5rem;
    opacity: 0.9;
    line-height: 1.4;
}

.curated-content .btn {
    border-radius: 50px;
    padding: 0.5rem 1.5rem;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    transition: all 0.3s ease;
    border: 2px solid transparent;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.curated-content .btn-primary {
    background: #ffffff;
    color: #2d3748;
    border-color: #ffffff;
}

.curated-content .btn-primary:hover {
    background: transparent;
    color: #ffffff;
    border-color: #ffffff;
}

.curated-content .btn-outline-light {
    background: transparent;
    color: #ffffff;
    border-color: #ffffff;
}

.curated-content .btn-outline-light:hover {
    background: #ffffff;
    color: #2d3748;
}

.curated-content .btn-sm {
    padding: 0.4rem 1rem;
    font-size: 0.75rem;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .plants-section {
        padding: 60px 0;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .section-description {
        font-size: 1rem;
    }
    
    .large-card .curated-image {
        height: 450px;
    }
    
    .medium-card .curated-image {
        height: 280px;
    }
    
    .small-card .curated-image {
        height: 240px;
    }
    
    .curated-overlay {
        padding: 1.5rem;
    }
    
    .large-card .curated-title {
        font-size: 1.5rem;
    }
    
    .medium-card .curated-title {
        font-size: 1.2rem;
    }
    
    .small-card .curated-title {
        font-size: 1rem;
    }
}

@media (max-width: 576px) {
    .curated-grid .row > div {
        margin-bottom: 1.5rem;
    }
    
    .large-card .curated-image,
    .medium-card .curated-image,
    .small-card .curated-image {
        height: 320px;
    }
}
</style>
