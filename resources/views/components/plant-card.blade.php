@props(['plant'])

<div class="plant-card" data-aos="fade-up">
    <!-- Image Section -->
    <a href="{{ route('plants.show', $plant->id) }}" class="text-decoration-none">
        <div class="plant-image-wrapper">
            @if($plant->image_url)
                <img src="{{ $plant->image_url }}" alt="{{ $plant->name }}" loading="lazy" onerror="this.src='https://picsum.photos/seed/{{ urlencode($plant->name) }}/400/300.jpg'">
            @else
                <img src="https://picsum.photos/seed/{{ urlencode($plant->name) }}/400/300.jpg" alt="{{ $plant->name }}" loading="lazy">
            @endif
            
            <!-- Region/Type Badge -->
            @if($plant->region)
                <span class="plant-badge"><i class="bi bi-geo-alt me-1"></i> {{ $plant->region }}</span>
            @endif
            
            <!-- Price Badge -->
            <span class="plant-price-badge {{ ($plant->price && $plant->price > 0) ? '' : 'free' }}">
                @if($plant->price && $plant->price > 0)
                    {{ number_format($plant->price, 0) }} {{ __('messages.currency') }}
                @else
                    {{ __('messages.free') }}
                @endif
            </span>
        </div>
    </a>

    <!-- Content Section -->
    <div class="plant-card-content">
        <div class="plant-card-category">{{ __('messages.medicinal_plants') }}</div>
        
        <h5 class="plant-card-title">
            <a href="{{ route('plants.show', $plant->id) }}" class="text-decoration-none text-dark">
                {{ Str::limit($plant->name, 40) }}
            </a>
        </h5>
        
        @if($plant->scientific_name)
            <div class="plant-card-scientific">{{ $plant->scientific_name }}</div>
        @endif
        
        <p class="plant-card-desc">
            {{ Str::limit(strip_tags($plant->description), 100) }}
        </p>
        
        <!-- Action Row -->
        <div class="plant-card-footer">
            <div class="plant-card-price">
                @if($plant->price && $plant->price > 0)
                    {{ number_format($plant->price, 0) }}<small>{{ __('messages.currency') }}</small>
                @else
                    {{ __('messages.free') }}
                @endif
            </div>
            
            <a href="{{ route('plants.show', $plant->id) }}" class="btn-plant-view">
                {{ __('messages.view_details') }} <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
