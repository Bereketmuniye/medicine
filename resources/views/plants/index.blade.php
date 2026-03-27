<!DOCTYPE html>
<html lang="{{ app()->getLocale() == 'am' ? 'am' : 'en' }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SEO Meta Tags -->
    <title>{{ __('messages.medicinal_plants') }} | Shalom Herbal Healing</title>
    <meta name="description" content="{{ __('messages.plants_description') }}">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom Shared Styles -->
    <link rel="stylesheet" href="{{ asset('css/global.css') }}?v={{ filemtime(public_path('css/global.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/plants-shared.css') }}?v={{ filemtime(public_path('css/plants-shared.css')) }}&t={{ time() }}">

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--white);
            color: var(--plant-text-main);
            overflow-x: hidden;
        }

        /* Hero Section - Premium Herbal Look */
        .plants-hero {
            padding: 140px 0 80px;
            background: linear-gradient(135deg, var(--plant-primary) 0%, #102a1a 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .plants-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1512428559087-3e014338df44?auto=format&fit=crop&w=1920&q=80') center/cover;
            opacity: 0.12;
            z-index: 1;
        }

        .plants-hero .container {
            position: relative;
            z-index: 2;
        }

        .hero-badge {
            display: inline-block;
            background: rgba(197, 225, 165, 0.15);
            color: var(--plant-primary-light);
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(197, 225, 165, 0.2);
        }

        .plants-hero h1 {
            font-size: 3.5rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            letter-spacing: -1px;
        }

        .plants-hero p {
            font-size: 1.25rem;
            opacity: 0.85;
            max-width: 600px;
            line-height: 1.6;
        }

        /* Section Layout */
        .plants-section {
            padding: 100px 0;
            background: var(--white);
        }

        .section-header {
            margin-bottom: 5rem;
            text-align: center;
        }

        .section-subtitle {
            font-size: 0.8rem;
            font-weight: 800;
            color: var(--plant-accent);
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 1rem;
            display: block;
        }

        .section-title {
            font-size: 3rem;
            font-weight: 900;
            color: var(--plant-primary);
        }

        @media (max-width: 768px) {
            .plants-hero h1 { font-size: 2.5rem; }
            .section-title { font-size: 2.2rem; }
        }
    </style>
</head>
<body>

<!-- Navigation -->
<x-navigation />

<!-- Hero Section -->
<section class="plants-hero">
    <div class="container">
        <div data-aos="fade-up">
            <span class="hero-badge">{{ __('messages.natural_remedies') }}</span>
            <h1>{{ __('messages.medicinal_plants') }}</h1>
            <p>{{ __('messages.plants_description') }}</p>
        </div>
    </div>
</section>

<!-- Plants Grid Section -->
<section class="plants-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">{{ __('messages.botanical_wisdom') }}</span>
            <h2 class="section-title">{{ __('messages.discover_nature') }}</h2>
        </div>

        <div class="row g-4">
            @forelse($plants as $plant)
                <div class="col-lg-4 col-md-6">
                    <x-plant-card :plant="$plant" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="text-muted">
                        <i class="bi bi-flower1 fa-4x mb-4" style="color: var(--plant-primary-light);"></i>
                        <h3>{{ __('messages.no_plants_available') }}</h3>
                        <p>{{ __('messages.check_back_later') }}</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Footer -->
<x-footer />

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init({
        duration: 1000,
        once: true,
        easing: 'ease-out'
    });
</script>

</body>
</html>
