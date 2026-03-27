<!DOCTYPE html>
<html lang="{{ app()->getLocale() == 'am' ? 'am' : 'en' }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SEO Meta Tags -->
    <title>{{ $plant->name }} - {{ __('messages.medicinal_plants') }} | Shalom Herbal Healing</title>
    <meta name="description" content="{{ Str::limit($plant->description ?? '', 150) }}">
    <meta name="keywords" content="{{ $plant->name }}, {{ $plant->scientific_name ?? '' }}, Ethiopian traditional medicine, herbal remedies, Dr. Shalom">
    <meta name="author" content="Dr. Shalom - Shalom Herbal Healing">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:locale" content="{{ app()->getLocale() == 'am' ? 'am_ET' : 'en_US' }}">
    <meta property="og:type" content="article">
    <meta property="og:title" content="{{ $plant->name }} - {{ __('messages.medicinal_plants') }}">
    <meta property="og:description" content="{{ Str::limit($plant->description ?? '', 150) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="Shalom Herbal Healing">
    <meta property="og:image" content="{{ $plant->image_url }}">
    
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
    <link rel="stylesheet" href="{{ asset('css/plants-shared.css') }}?v={{ filemtime(public_path('css/plants-shared.css')) }}&t={{ time() }}">
</head>
<body>
    <!-- Navigation -->
    @include('components.navigation')

    <!-- Main Content -->
    <main>
        <div class="container py-5">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('welcome') }}" class="text-decoration-none">{{ __('messages.home') }}</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('plants.index') }}" class="text-decoration-none">{{ __('messages.plants') }}</a>
                    </li>
                    <li class="breadcrumb-item active">{{ $plant->name }}</li>
                </ol>
            </nav>

            <!-- Plant Details -->
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="plant-detail-card p-4">
                        <!-- Plant Image -->
                        <div class="mb-5">
                            <img src="{{ $plant->image_url }}" alt="{{ $plant->name }}" class="plant-main-image" onerror="this.src='https://picsum.photos/seed/{{ urlencode($plant->name) }}/800/600.jpg'">
                        </div>

                        <!-- Plant Information -->
                        <h1 class="display-5 fw-bold mb-4" style="color: var(--plant-primary);">{{ $plant->name }}</h1>
                        
                        <div class="row mb-5">
                            @if($plant->local_name)
                                <div class="col-md-6 mb-3">
                                    <div class="info-card">
                                        <h5>{{ __('messages.local_name') }}</h5>
                                        <p class="mb-0 fw-bold">{{ $plant->local_name }}</p>
                                    </div>
                                </div>
                            @endif
                            
                            @if($plant->scientific_name)
                                <div class="col-md-6 mb-3">
                                    <div class="info-card">
                                        <h5>{{ __('messages.scientific_name') }}</h5>
                                        <p class="mb-0 fw-bold fst-italic">{{ $plant->scientific_name }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if($plant->description)
                            <div class="mb-5">
                                <h4 class="mb-3" style="color: var(--plant-primary); font-weight: 800;">{{ __('messages.description') }}</h4>
                                <div class="lead text-muted" style="line-height: 1.8;">{!! $plant->description !!}</div>
                            </div>
                        @endif

                        @if($plant->safety_warning)
                            <div class="alert alert-warning border-0 shadow-sm p-4 rounded-4 mb-5" role="alert">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-exclamation-triangle-fill fs-3 me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">{{ __('messages.safety_warning') }}</h6>
                                        <p class="mb-0">{{ $plant->safety_warning }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Plant Uses -->
                        @if($plant->uses && $plant->uses->count() > 0)
                            <div class="mb-5">
                                <h4 class="mb-3" style="color: var(--plant-primary); font-weight: 800;">{{ __('messages.medicinal_uses') }}</h4>
                                <div class="row g-3">
                                    @foreach($plant->uses as $use)
                                        <div class="col-12">
                                            <div class="p-3 rounded-4" style="background: rgba(26, 71, 42, 0.05); border-left: 4px solid var(--plant-primary);">
                                                <h6 class="fw-bold mb-1">{{ $use->use_name }}</h6>
                                                <p class="mb-0 text-muted">{{ $use->description }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Action Buttons -->
                        <div class="d-flex gap-3 pt-4 border-top">
                            <a href="{{ route('plants.index') }}" class="btn-print text-decoration-none">
                                <i class="bi bi-arrow-left me-2"></i>{{ __('messages.back_to_plants') }}
                            </a>
                            <button class="btn-print" onclick="window.print()">
                                <i class="bi bi-printer me-2"></i>{{ __('messages.print') }}
                            </button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Quick Info Card -->
                    <div class="plant-detail-card p-4 mb-4">
                        <h5 class="mb-4 fw-bold" style="color: var(--plant-primary);">{{ __('messages.quick_info') }}</h5>
                        
                        <div class="mb-4">
                            <small class="text-uppercase text-muted fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">{{ __('messages.plant_id') }}</small>
                            <p class="mb-0 fw-bold">{{ $plant->plant_id ?? $plant->id }}</p>
                        </div>

                        <div class="mb-4">
                            <small class="text-uppercase text-muted fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">{{ __('messages.price') }}</small>
                            <p class="mb-0 fs-3 fw-bold" style="color: var(--plant-primary);">
                                @if($plant->price && $plant->price > 0)
                                    {{ number_format($plant->price, 0) }} <small class="fs-6 text-muted">{{ __('messages.currency') }}</small>
                                @else
                                    {{ __('messages.free') }}
                                @endif
                            </p>
                        </div>

                        <div class="mb-4">
                            <small class="text-uppercase text-muted fw-bold" style="font-size: 0.7rem; letter-spacing: 1px;">{{ __('messages.availability') }}</small>
                            <p class="mb-0">
                                <span class="badge" style="background: rgba(40, 167, 69, 0.1); color: #2ecc71; padding: 8px 16px; border-radius: 8px;">{{ __('messages.available') }}</span>
                            </p>
                        </div>

                        <!-- Contact Button -->
                        <div class="mt-4 pt-4 border-top">
                            <button class="btn-plant-view w-100 py-3 justify-content-center contact-btn" data-phone="{{ $owner_phone ?? '0911274140' }}">
                                <i class="bi bi-whatsapp"></i> {{ __('messages.contact') }}
                            </button>
                        </div>
                    </div>

                    <!-- Related Plants -->
                    @if($relatedPlants->count() > 0)
                        <div class="plant-detail-card p-4">
                            <h5 class="mb-4 fw-bold" style="color: var(--plant-primary);">{{ __('messages.related_plants') }}</h5>
                            <div class="row g-4">
                                @foreach($relatedPlants as $relatedPlant)
                                    <div class="col-12">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $relatedPlant->image_url }}" alt="{{ $relatedPlant->name }}" class="rounded-4 me-3" style="width: 70px; height: 70px; object-fit: cover; box-shadow: var(--shadow-sm);">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1 fw-bold">
                                                    <a href="{{ route('plants.show', $relatedPlant->id) }}" class="text-decoration-none" style="color: var(--plant-primary);">
                                                        {{ $relatedPlant->name }}
                                                    </a>
                                                </h6>
                                                @if($relatedPlant->local_name)
                                                    <small class="text-muted">{{ $relatedPlant->local_name }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Contact button interaction
        document.querySelectorAll('.contact-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const phone = this.getAttribute('data-phone');
                
                // Show phone number on button
                this.innerHTML = `<i class="bi bi-telephone-fill me-2"></i>${phone}`;
                this.classList.remove('btn-plant-view');
                this.classList.add('bg-success');
                this.style.color = 'white';
                this.style.boxShadow = '0 8px 20px rgba(40, 167, 69, 0.3)';
            });
        });
    </script>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--white);
            color: var(--plant-text-main);
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: ">";
            color: var(--plant-primary);
        }

        .breadcrumb-item a {
            color: var(--plant-primary);
            font-weight: 600;
        }

        .breadcrumb-item.active {
            color: var(--plant-text-muted);
        }

        .plant-detail-card {
            border-radius: 24px;
            background: white;
            box-shadow: var(--shadow-md);
            overflow: hidden;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .plant-main-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: var(--shadow-sm);
        }

        .info-card {
            background: #fdfdfd;
            border: 1px solid rgba(0,0,0,0.05);
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: var(--shadow-sm);
        }

        .info-card h5 {
            color: var(--plant-primary);
            font-weight: 800;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
        }

        .btn-print {
            background: transparent;
            border: 2px solid var(--plant-primary);
            color: var(--plant-primary);
            font-weight: 700;
            padding: 0.8rem 1.5rem;
            border-radius: 14px;
            transition: var(--transition-smooth);
        }

        .btn-print:hover {
            background: var(--plant-primary);
            color: white;
        }

        @media (max-width: 768px) {
            .plant-main-image { height: 300px; }
        }
    </style>
</body>
</html>
