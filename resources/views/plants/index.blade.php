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
        <div class="container py-5">
            <!-- Page Header -->
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold" style="color: var(--primary);">
                    {{ __('messages.medicinal_plants') }}
                </h1>
                <p class="lead text-muted">{{ __('messages.plants_description') }}</p>
            </div>

            <!-- Plants Grid -->
            <div class="row g-4">
                @forelse($plants as $plant)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm plant-card">
                            <div class="position-relative">
                                <img src="{{ $plant->image_url }}" alt="{{ $plant->name }}" class="card-img-top" style="height: 250px; object-fit: cover;">
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="badge bg-primary">{{ __('messages.available') }}</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $plant->name }}</h5>
                                @if($plant->local_name)
                                    <p class="text-muted small mb-2">{{ $plant->local_name }}</p>
                                @endif
                                @if($plant->scientific_name)
                                    <p class="text-muted fst-italic small mb-3">{{ $plant->scientific_name }}</p>
                                @endif
                                @if($plant->region)
                                    <p class="mb-3">
                                        <i class="bi bi-geo-alt text-primary"></i> {{ $plant->region }}
                                    </p>
                                @endif
                                @if($plant->description)
                                    <p class="card-text text-muted">{{ Str::limit($plant->description, 80) }}</p>
                                @endif
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    @if($plant->price)
                                        <span class="fw-bold text-primary">{{ number_format($plant->price, 2) }} {{ __('messages.currency') }}</span>
                                    @else
                                        <span></span>
                                    @endif
                                    <a href="{{ route('plants.show', $plant->id) }}" class="btn btn-primary btn-sm rounded-pill">
                                        {{ __('messages.view_details') }}
                                    </a>
                                </div>
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

            <!-- Back to Home -->
            <div class="text-center mt-5">
                <a href="{{ route('welcome') }}" class="btn btn-outline-primary rounded-pill px-5">
                    <i class="bi bi-house me-2"></i>{{ __('messages.back_to_home') }}
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <style>
        .plant-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 15px;
        }

        .plant-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        .card-img-top {
            border-radius: 15px 15px 0 0;
        }

        .badge {
            font-size: 0.75rem;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
        }
    </style>
</body>
</html>
