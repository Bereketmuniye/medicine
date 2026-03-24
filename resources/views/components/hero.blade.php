<section class="hero-section" id="home">
    <!-- Static Image Background -->
    <div class="hero-image-background"></div>
    
    <div class="container">
        <div class="hero-content" data-aos="fade-up">
            <div class="hero-subtitle">{{ __('messages.subtitle') }}</div>
            <h1 class="hero-title">
                {{ __('messages.title') }} <span>{{ __('messages.title_span') }}</span>
            </h1>
            
            <!-- Search Form -->
            <div class="search-wrapper">
                <form class="d-flex" action="{{ route('products.search') }}" method="GET">
                    <input type="text" name="q" class="form-control" placeholder="{{ __('messages.search_placeholder') }}" value="{{ request('q') }}">
                    <button type="submit" class="btn">{{ __('messages.search_button') }}</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Hero Stats - Fixed at bottom -->
    <div class="hero-stats" data-aos="fade-up" data-aos-delay="200">
        <div class="hero-stat-item">
            <div class="hero-stat-number count-up">{{ $stats['herbs_count'] ?? 50 }}</div>
            <div class="hero-stat-label">{{ __('messages.natural_remedies') }}</div>
        </div>
        <div class="hero-stat-item">
            <div class="hero-stat-number count-up">{{ $stats['clients_count'] ?? 1250 }}</div>
            <div class="hero-stat-label">{{ __('messages.happy_clients') }}</div>
        </div>
        <div class="hero-stat-item">
            <div class="hero-stat-number count-up">{{ $stats['experts_count'] ?? 24 }}</div>
            <div class="hero-stat-label">{{ __('messages.expert_consultations') }}</div>
        </div>
    </div>
</section>
