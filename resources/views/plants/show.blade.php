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
    <link rel="stylesheet" href="{{ asset('css/books-shared.css') }}?v={{ filemtime(public_path('css/books-shared.css')) }}&t={{ time() }}">
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
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <!-- Plant Image -->
                            <div class="mb-4">
                                <img src="{{ $plant->image_url }}" alt="{{ $plant->name }}" class="img-fluid rounded-3" style="width: 100%; max-height: 400px; object-fit: cover;">
                            </div>

                            <!-- Plant Information -->
                            <h1 class="mb-3" style="color: var(--primary);">{{ $plant->name }}</h1>
                            
                            @if($plant->local_name)
                                <p class="text-muted mb-2"><strong>{{ __('messages.local_name') }}:</strong> {{ $plant->local_name }}</p>
                            @endif
                            
                            @if($plant->scientific_name)
                                <p class="text-muted mb-3 fst-italic"><strong>{{ __('messages.scientific_name') }}:</strong> {{ $plant->scientific_name }}</p>
                            @endif

                            @if($plant->region)
                                <p class="mb-3">
                                    <i class="bi bi-geo-alt text-primary"></i> 
                                    <strong>{{ __('messages.region') }}:</strong> {{ $plant->region }}
                                </p>
                            @endif

                            @if($plant->description)
                                <div class="mb-4">
                                    <h5>{{ __('messages.description') }}</h5>
                                    <div class="text-muted">{!! $plant->description !!}</div>
                                </div>
                            @endif

                            @if($plant->safety_warning)
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <i class="bi bi-exclamation-triangle me-2"></i>
                                    <strong>{{ __('messages.safety_warning') }}:</strong> {{ $plant->safety_warning }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <!-- Plant Uses -->
                            @if($plant->uses && $plant->uses->count() > 0)
                                <div class="mb-4">
                                    <h5>{{ __('messages.medicinal_uses') }}</h5>
                                    <ul class="list-group">
                                        @foreach($plant->uses as $use)
                                            <li class="list-group-item">
                                                <strong>{{ $use->use_name }}:</strong> {{ $use->description }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Action Buttons -->
                            <div class="d-flex gap-3">
                                <a href="{{ route('plants.index') }}" class="btn btn-outline-primary rounded-pill px-4">
                                    <i class="bi bi-arrow-left me-2"></i>{{ __('messages.back_to_plants') }}
                                </a>
                                <button class="btn btn-primary rounded-pill px-4" onclick="window.print()">
                                    <i class="bi bi-printer me-2"></i>{{ __('messages.print') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Quick Info Card -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="mb-3">{{ __('messages.quick_info') }}</h5>
                            
                            <div class="mb-3">
                                <small class="text-muted">{{ __('messages.plant_id') }}</small>
                                <p class="mb-0 fw-bold">{{ $plant->plant_id ?? $plant->id }}</p>
                            </div>

                            @if($plant->price)
                                <div class="mb-3">
                                    <small class="text-muted">{{ __('messages.price') }}</small>
                                    <p class="mb-0 fw-bold text-primary">{{ number_format($plant->price, 2) }} {{ __('messages.currency') }}</p>
                                </div>
                            @endif

                            <div class="mb-3">
                                <small class="text-muted">{{ __('messages.availability') }}</small>
                                <p class="mb-0">
                                    <span class="badge bg-success">{{ __('messages.available') }}</span>
                                </p>
                            </div>

                            <!-- Contact Button -->
                            <div class="mt-4">
                                <button class="btn btn-success w-100 rounded-pill contact-btn" data-phone="{{ $owner_phone ?? '0911274140' }}">
                                    <i class="bi bi-whatsapp me-2"></i>{{ __('messages.contact') }}
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Related Plants -->
                    @if($relatedPlants->count() > 0)
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h5 class="mb-3">{{ __('messages.related_plants') }}</h5>
                                <div class="row g-3">
                                    @foreach($relatedPlants as $relatedPlant)
                                        <div class="col-12">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $relatedPlant->image_url }}" alt="{{ $relatedPlant->name }}" class="rounded-2 me-3" style="width: 60px; height: 60px; object-fit: cover;">
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">
                                                        <a href="{{ route('plants.show', $relatedPlant->id) }}" class="text-decoration-none">
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
                this.classList.remove('btn-success');
                this.classList.add('btn-primary');
            });
        });
    </script>

    <style>
        .card {
            border-radius: 15px;
        }

        .breadcrumb-item + .breadcrumb-item::before {
            content: ">";
            color: var(--primary);
        }

        .btn-close:focus {
            box-shadow: none;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
        }
    </style>
</body>
</html>
