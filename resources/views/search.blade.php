<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Search Results - HerbMed Ethiopia</title>

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
    <link rel="stylesheet" href="{{ asset('css/books-shared.css') }}?v={{ filemtime(public_path('css/books-shared.css')) }}">

    <style>
        /* Search Specific Styles */
        .search-section {
            padding: 140px 0 80px;
            min-height: 80vh;
        }

        .search-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .search-subtitle {
            color: var(--primary-light);
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 0.5rem;
            display: block;
        }

        .search-title {
            font-size: 3rem;
            font-weight: 900;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .search-title span {
            color: var(--primary-light);
        }

        .search-query {
            font-style: italic;
            color: var(--text-light);
            font-size: 1.2rem;
        }

        /* Result Cards */
        .result-card {
            background: white;
            border: 1px solid #f0f0f0;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            box-shadow: var(--card-shadow);
            position: relative;
        }

        .result-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--card-hover-shadow);
        }

        .result-type-badge {
            position: absolute;
            top: 1rem;
            right: 1rem;
            z-index: 10;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .badge-plant { background: #e8f5e9; color: #2e7d32; }
        .badge-book { background: #fff8e1; color: #f57f17; }
        .badge-article { background: #e3f2fd; color: #1565c0; }

        .result-image {
            height: 240px;
            overflow: hidden;
            position: relative;
            background: #f8f8f8;
        }

        .result-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s;
        }

        .result-card:hover .result-image img {
            transform: scale(1.1);
        }

        .result-body {
            padding: 1.5rem;
        }

        .result-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 3rem;
        }

        .result-excerpt {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 4.5rem;
        }

        .result-footer {
            padding-top: 1rem;
            border-top: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-view {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: color 0.3s;
        }

        .btn-view:hover {
            color: var(--primary-light);
        }

        .no-results {
            text-align: center;
            padding: 5rem 0;
        }

        .no-results i {
            font-size: 5rem;
            color: #eee;
            margin-bottom: 2rem;
            display: block;
        }
    </style>
</head>
<body>

@include('components.navigation')

<section class="search-section">
    <div class="container">
        <div class="search-header" data-aos="fade-up">
            <span class="search-subtitle">Search Results</span>
            <h2 class="search-title">Found <span>{{ $results->count() }}</span> Items</h2>
            @if($query)
                <p class="search-query">for "{{ $query }}"</p>
            @endif
        </div>

        @if($results->count() > 0)
            <div class="row g-4">
                @foreach($results as $result)
                    <div class="col-md-6 col-lg-4 col-xl-3" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 100 }}">
                        @if($result->search_type === 'book')
                            <x-book-card :book="$result" />
                        @else
                            <div class="result-card">
                                <span class="result-type-badge badge-{{ $result->search_type }}">
                                    {{ $result->search_type }}
                                </span>
                                
                                <div class="result-image">
                                    @php
                                        $imageUrl = 'https://images.unsplash.com/photo-1615485242221-39656461c360?auto=format&fit=crop&w=800&q=80';
                                        
                                        if ($result->search_type === 'plant' && $result->image) {
                                            $imageUrl = asset('storage/' . $result->image);
                                        } elseif ($result->search_type === 'article') {
                                            $featImg = $result->featured_image;
                                            $images = is_string($featImg) ? json_decode($featImg, true) : (is_array($featImg) ? $featImg : []);
                                            $mainImg = !empty($images) ? $images[0] : (is_string($featImg) ? $featImg : null);
                                            
                                            if ($mainImg) {
                                                $imageUrl = asset('storage/' . $mainImg);
                                            } else {
                                                $imageUrl = asset('images/placeholder-plant.jpg');
                                            }
                                        }
                                    @endphp
                                    <img src="{{ $imageUrl }}" alt="{{ $result->name ?? $result->title }}" onerror="this.src='https://images.unsplash.com/photo-1615485242221-39656461c360?auto=format&fit=crop&w=800&q=80'">
                                </div>

                                <div class="result-body">
                                    <h3 class="result-title">{{ $result->name ?? $result->title }}</h3>
                                    <p class="result-excerpt">
                                        {{ Str::limit(strip_tags($result->description ?? $result->content), 120) }}
                                    </p>
                                    
                                    <div class="result-footer">
                                        @if($result->search_type === 'plant')
                                            <button class="btn btn-sm btn-outline-dark contact-btn" data-phone="{{ $owner_phone ?? '+251911XXXXXX' }}" style="border-radius: 50px; font-weight: 700;">
                                                CONTACT
                                            </button>
                                        @endif
                                        
                                        @php
                                            $url = '#';
                                            if($result->search_type === 'article') {
                                                $url = route('articles.show', $result->slug ?? $result->id);
                                            }
                                        @endphp
                                        
                                        <a href="{{ $url }}" class="btn-view">
                                            VIEW DETAILS <i class="bi bi-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-results" data-aos="fade-up">
                <i class="bi bi-search"></i>
                <h3>No matches found</h3>
                <p class="text-muted">Try using different keywords or broad categories.</p>
                <div class="mt-4">
                    <a href="{{ route('welcome') }}" class="btn-account" style="background: var(--primary); color: white; border: none;">
                        BACK TO HOME
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>

@include('components.footer')

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    // Initialize AOS
    AOS.init({
        duration: 800,
        once: true,
        easing: 'ease-out'
    });

    // Contact button interaction
    document.querySelectorAll('.contact-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const phone = this.getAttribute('data-phone');
            this.innerHTML = `<i class="bi bi-telephone"></i> ${phone}`;
            this.classList.remove('btn-outline-dark');
            this.classList.add('btn-success');
            this.style.fontSize = '0.75rem';
        });
    });

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });
</script>

</body>
</html>