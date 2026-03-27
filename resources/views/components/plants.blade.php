@php
    $featuredPlants = $featuredPlants ?? collect();
@endphp

@if($featuredPlants->isNotEmpty())
<section class="plants-section-unified py-5" id="plants">
    <div class="container">
        <!-- Section Header -->
        <div class="section-header text-center mb-5" data-aos="fade-up">
            <span class="section-subtitle">{{ __('messages.botanical_wisdom') }}</span>
            <h2 class="section-title">{{ __('messages.medicinal_plants') }}</h2>
        </div>
        
        <!-- Curated Grid - World Class Restored -->
        <div class="curated-plants-grid">
            <div class="row g-4">
                @foreach($featuredPlants->take(4) as $index => $plant)
                    @if($index == 0)
                        <!-- Large Feature Card -->
                        <div class="col-lg-7" data-aos="fade-right">
                            <div class="plant-card large-feature h-100">
                                <div class="plant-image-wrapper" style="height: 500px;">
                                    <img src="{{ $plant->image_url ?? 'https://picsum.photos/seed/' . urlencode($plant->name) . '/800/600.jpg' }}" alt="{{ $plant->name }}" onerror="this.src='https://picsum.photos/seed/{{ urlencode($plant->name) }}/800/600.jpg'">
                                    <span class="plant-price-badge {{ ($plant->price && $plant->price > 0) ? '' : 'free' }}">
                                        @if($plant->price && $plant->price > 0)
                                            {{ number_format($plant->price, 0) }} {{ __('messages.currency') }}
                                        @else
                                            {{ __('messages.free') }}
                                        @endif
                                    </span>
                                </div>
                                <div class="plant-card-content">
                                    <h3 class="plant-card-title fs-2">{{ $plant->name }}</h3>
                                    <p class="plant-card-desc">{{ Str::limit(strip_tags($plant->description), 150) }}</p>
                                    <div class="plant-card-footer">
                                        <a href="{{ route('plants.show', $plant->id) }}" class="btn-plant-view">
                                            {{ __('messages.view_details') }} <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="row g-4">
                    @else
                        <div class="col-12" data-aos="fade-left" data-aos-delay="{{ $index * 100 }}">
                            <div class="plant-card horizontal-mini shadow-sm">
                                <div class="d-flex align-items-center p-3">
                                    <div class="plant-image-wrapper m-0 me-3" style="width: 120px; height: 120px; flex-shrink: 0;">
                                        <img src="{{ $plant->image_url ?? 'https://picsum.photos/seed/' . urlencode($plant->name) . '/200/200.jpg' }}" alt="{{ $plant->name }}" onerror="this.src='https://picsum.photos/seed/{{ urlencode($plant->name) }}/200/200.jpg'">
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="plant-card-title mb-1 fs-5">{{ Str::limit($plant->name, 30) }}</h5>
                                        <p class="plant-card-desc mb-2" style="-webkit-line-clamp: 2; line-clamp: 2;">{{ Str::limit(strip_tags($plant->description), 60) }}</p>
                                        <a href="{{ route('plants.show', $plant->id) }}" class="text-decoration-none fw-bold" style="color: var(--plant-primary); font-size: 0.8rem;">
                                            {{ __('messages.view_details') }} →
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @if($featuredPlants->count() > 1)
                            </div>
                        </div>
                @endif
            </div>
        </div>
        
        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('plants.index') }}" class="btn-plant-view px-5 py-3" style="max-width: 320px; margin: 0 auto; justify-content: center;">
                {{ __('messages.view_all_plants') }} <i class="bi bi-grid-3x3-gap ms-2"></i>
            </a>
        </div>
    </div>
</section>
@endif

<style>
    .plants-section-unified .section-subtitle {
        font-size: 0.8rem;
        font-weight: 800;
        color: var(--plant-accent);
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-bottom: 0.5rem;
        display: block;
    }
    .plants-section-unified .section-title {
        font-size: clamp(1.8rem, 5vw, 3rem);
        font-weight: 900;
        color: var(--plant-primary);
        margin-bottom: 2.5rem;
        line-height: 1.2;
    }
    
    @media (max-width: 576px) {
        .plants-section-unified .section-title {
            margin-bottom: 1.5rem;
        }
        .plants-section-unified .section-subtitle {
            font-size: 0.7rem;
            letter-spacing: 2px;
        }
    }
    .plants-section-unified .section-title span {
        color: var(--plant-primary-light);
    }
</style>
