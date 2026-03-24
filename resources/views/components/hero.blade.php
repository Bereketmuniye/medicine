<section class="hero-section" id="home">
    <!-- Video Background with fallback -->
    <video class="hero-video-background" autoplay muted loop playsinline preload="auto" webkit-playsinline poster="https://images.unsplash.com/photo-1615485290382-441e4d049cb5?auto=format&fit=crop&w=1920&q=80">
        <source src="https://assets.mixkit.co/videos/preview/mixkit-herbalist-hand-pouring-dry-tea-leaves-40153-large.mp4" type="video/mp4">
        <source src="https://assets.mixkit.co/videos/preview/mixkit-herbalist-hand-pouring-dry-tea-leaves-40153-medium.mp4" type="video/mp4">
        <!-- Fallback message if video doesn't load -->
        Your browser does not support the video tag.
    </video>
    <!-- <div class="hero-overlay"></div> -->
    
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
