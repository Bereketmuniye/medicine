<!DOCTYPE html>
<html lang="{{ app()->getLocale() == 'am' ? 'am' : 'en' }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SEO Meta Tags -->
    <title>{{ __('messages.medicinal_plants') }} | Shalom Herbal Healing</title>
    <meta name="description" content="{{ __('messages.plants_description') }}">
    <meta name="keywords" content="medicinal plants, Ethiopian traditional medicine, herbal remedies, Dr. Shalom">
    <meta name="author" content="Dr. Shalom - Shalom Herbal Healing">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:locale" content="{{ app()->getLocale() == 'am' ? 'am_ET' : 'en_US' }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ __('messages.medicinal_plants') }}">
    <meta property="og:description" content="{{ __('messages.plants_description') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Shalom Herbal Healing">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ShalomHerbCare">
    <meta name="twitter:creator" content="@DrShalom">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom Shared Styles -->
    <link rel="stylesheet" href="{{ asset('css/global.css') }}?v={{ filemtime(public_path('css/global.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/books-shared.css') }}?v={{ filemtime(public_path('css/books-shared.css')) }}&t={{ time() }}">
</head>
<body>
    <!-- Navigation -->
    @include('components.navigation')

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="plants-hero">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-right">
                        <h1 class="display-3 fw-bold text-white mb-4">
                            {{ __('messages.medicinal_plants') }}
                        </h1>
                        <p class="lead text-white-50 mb-4">
                            {{ __('messages.plants_description') }}
                        </p>
                        <div class="d-flex gap-3">
                            <div class="text-white">
                                <i class="bi bi-flower2 fa-2x mb-2"></i>
                                <h5 class="fw-bold">{{ $plants->count() }}+</h5>
                                <small>{{ __('messages.medicinal_plants') }}</small>
                            </div>
                            <div class="text-white">
                                <i class="bi bi-award fa-2x mb-2"></i>
                                <h5 class="fw-bold">100%</h5>
                                <small>{{ __('messages.natural') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" data-aos="fade-left">
                        <div class="hero-image">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Plants Section -->
        <section class="plants-content py-5">
            <div class="container">

                <!-- Plants Grid -->
                <div class="row g-4">
                    @forelse($plants as $plant)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="plant-card h-100">
                                <div class="plant-image">
                                    <img src="{{ $plant->image_url }}" alt="{{ $plant->name }}" class="img-fluid" onerror="this.src='https://picsum.photos/seed/{{ urlencode($plant->name) }}/400/300.jpg'">
                                    <div class="plant-overlay">
                                        <div class="plant-actions">
                                            <a href="{{ route('plants.show', $plant->id) }}" class="btn btn-light btn-sm rounded-pill">
                                                <i class="bi bi-eye me-1"></i> {{ __('messages.view_details') }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="plant-price">
                                        @if($plant->price && $plant->price > 0)
                                            <span class="badge bg-success">{{ number_format($plant->price, 2) }} {{ __('messages.currency') }}</span>
                                        @else
                                            <span class="badge bg-success">{{ __('messages.free') }}</span>
                                        @endif
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
                                            <i class="bi bi-geo-alt text-primary"></i> {{ $plant->region }}
                                        </p>
                                    @endif
                                    @if($plant->description)
                                        <p class="plant-description text-muted">{{ Str::limit(strip_tags($plant->description), 80) }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <div class="text-muted">
                                <i class="bi bi-flower1 fa-3x mb-3"></i>
                                <h4>{{ __('messages.no_plants_available') }}</h4>
                                <p>{{ __('messages.check_back_later') }}</p>
                            </div>
                        </div>
                    @endforelse
                </div>

            </div>
        </section>
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            easing: 'ease-out'
        });
    </script>

    <style>
        /* Hero Section */
        .plants-hero {
            background: linear-gradient(135deg, var(--primary) 0%, #2a1f02 100%);
            padding: 100px 0 80px;
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
            opacity: 0.15;
            z-index: 1;
        }
        
        .plants-hero .container {
            position: relative;
            z-index: 2;
        }
        
        .hero-image img {
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }
        
        /* Plants Content */
        .plants-content {
            background: #f8f9fa;
            min-height: 60vh;
        }
        
        /* Plant Cards */
        .plant-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        
        .plant-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
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
            transition: transform 0.3s ease;
        }
        
        .plant-card:hover .plant-image img {
            transform: scale(1.05);
        }
        
        .plant-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .plant-card:hover .plant-overlay {
            opacity: 1;
        }
        
        .plant-price {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 10;
        }
        
        .plant-content {
            padding: 1.5rem;
        }
        
        .plant-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }
        
        .plant-local-name {
            font-size: 0.9rem;
            margin-bottom: 0.3rem;
        }
        
        .plant-scientific {
            font-size: 0.85rem;
            margin-bottom: 0.5rem;
        }
        
        .plant-region {
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }
        
        .plant-description {
            font-size: 0.9rem;
            line-height: 1.5;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .plants-hero {
                padding: 60px 0 40px;
            }
            
            .display-3 {
                font-size: 2rem;
            }
            
            .plant-card {
                margin-bottom: 1.5rem;
            }
        }
    </style>
</body>
</html>
