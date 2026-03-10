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

    <style>
        :root {
            --primary: #1c1601;
            --primary-light: #ffca08;
            --text-light: #8e8e8e;
            --text-dark: #232222;
            --border-color: rgba(255,255,255,0.1);
            --card-shadow: 0 20px 40px rgba(0,0,0,0.05);
            --card-hover-shadow: 0 30px 60px rgba(0,0,0,0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #ffffff;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Navigation */
        .navbar {
            background: var(--primary) !important;
            padding: 0.5rem 0;
            border-bottom: 1px solid var(--border-color);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: white !important;
            letter-spacing: 2px;
        }

        .navbar-brand span {
            color: var(--primary-light);
        }

        .nav-link {
            color: #d9d9d9 !important;
            font-weight: 600;
            font-style: italic;
            font-size: 0.9rem;
            padding: 1.5rem 1rem !important;
            margin: 0 0.2rem;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary-light) !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 1rem;
            left: 50%;
            transform: translateX(-50%);
            width: 8px;
            height: 8px;
            background: var(--primary-light);
            border-radius: 50%;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            opacity: 1;
        }

        .btn-cart {
            position: relative;
            color: white;
            font-size: 1.2rem;
            margin-right: 1rem;
            text-decoration: none;
        }

        .btn-cart span {
            position: absolute;
            top: -5px;
            right: -10px;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 0.7rem;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 50px;
        }

        .btn-account {
            background: transparent;
            border: 2px solid var(--primary-light);
            color: var(--primary-light);
            font-weight: 700;
            font-style: italic;
            padding: 0.5rem 1.8rem;
            border-radius: 50px;
            font-size: 0.9rem;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-account:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        /* Search Results Section */
        .search-section {
            padding: 120px 0 80px;
            min-height: 100vh;
        }

        .search-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .search-subtitle {
            color: var(--primary-light);
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 0.5rem;
            display: block;
        }

        .search-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .search-title span {
            color: var(--primary-light);
            border-bottom: 4px solid var(--primary-light);
            padding-bottom: 2px;
        }

        .search-info {
            color: var(--text-light);
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        /* Product Cards */
        .product-card {
            background: white;
            border: 1px solid #f0f0f0;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            height: 100%;
            box-shadow: var(--card-shadow);
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--card-hover-shadow);
        }

        .product-image {
            height: 250px;
            background: #f8f8f8;
            position: relative;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s;
        }

        .product-card:hover .product-image img {
            transform: scale(1.1);
        }

        .product-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 700;
            font-size: 0.7rem;
            padding: 0.3rem 1rem;
            border-radius: 50px;
            z-index: 2;
        }

        .product-actions {
            position: absolute;
            top: 1rem;
            right: 1rem;
            display: flex;
            gap: 0.5rem;
            opacity: 0;
            transition: opacity 0.3s;
            z-index: 2;
        }

        .product-card:hover .product-actions {
            opacity: 1;
        }

        .action-btn {
            width: 35px;
            height: 35px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            text-decoration: none;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .action-btn:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .product-body {
            padding: 1.5rem;
        }

        .product-region {
            color: var(--primary-light);
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.3rem;
        }

        .product-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.3rem;
        }

        .product-scientific {
            color: var(--text-light);
            font-style: italic;
            font-size: 0.8rem;
            margin-bottom: 0.5rem;
        }

        .product-local {
            color: var(--primary-light);
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .product-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .product-price small {
            font-size: 0.8rem;
            color: var(--text-light);
            font-weight: 400;
        }

        .product-footer {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .btn-reserve {
            background: var(--primary);
            color: white;
            font-weight: 700;
            font-style: italic;
            padding: 0.8rem;
            border-radius: 50px;
            flex: 1;
            border: 2px solid transparent;
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn-reserve:hover {
            background: var(--primary-light);
            color: var(--primary);
            border-color: var(--primary);
        }

        .btn-price {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 700;
            padding: 0.8rem 1rem;
            border-radius: 50px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            border: 2px solid transparent;
            transition: all 0.3s;
        }

        .btn-price:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary-light);
        }

        .no-results {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-light);
        }

        .no-results i {
            font-size: 4rem;
            color: var(--primary-light);
            margin-bottom: 1rem;
        }

        .no-results h3 {
            color: var(--primary);
            margin-bottom: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .search-title {
                font-size: 2rem;
            }
            
            .navbar-nav {
                background: var(--primary);
                padding: 1rem;
                border-radius: 15px;
                margin-top: 1rem;
            }
            
            .nav-link {
                padding: 0.8rem 1rem !important;
            }
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">HERBMED<span>.</span>ET</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}#about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}#videos">VIDEOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('welcome') }}#contact">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">LITERATURE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('books.index') }}">BOOKS</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <a href="#" class="btn-cart">
                    <i class="bi bi-cart3"></i>
                    <span>2</span>
                </a>
                <a href="{{ route('login') }}" class="btn-account">ACCOUNT</a>
            </div>
        </div>
    </div>
</nav>

<!-- Search Results Section -->
<section class="search-section">
    <div class="container">
        <div class="search-header" data-aos="fade-up">
            <span class="search-subtitle">SEARCH RESULTS</span>
            <h2 class="search-title">Found <span>{{ $searchResults->count() }}</span> Results</h2>
            @if($query)
                <p class="search-info">for "{{ $query }}"</p>
            @endif
        </div>

        @forelse($searchResults as $plant)
            <div class="row g-4 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="col-md-6 col-lg-3">
                    <div class="product-card">
                        <div class="product-image">
                            @if($plant->image)
                                <img src="{{ asset('storage/' . $plant->image) }}" alt="{{ $plant->name }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1615485242221-39656461c360?auto=format&fit=crop&w=800&q=80" alt="{{ $plant->name }}">
                            @endif
                            <span class="product-badge">Premium</span>
                            <div class="product-actions">
                                <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                            </div>
                        </div>
                        <div class="product-body">
                            <div class="product-region">{{ $plant->region ?? 'Ethiopian Highlands' }}</div>
                            <h5 class="product-name">{{ $plant->name }}</h5>
                            @if($plant->scientific_name)
                                <div class="product-scientific">{{ $plant->scientific_name }}</div>
                            @endif
                            <div class="product-local">{{ $plant->local_name ?? 'Traditional Herb' }}</div>
                            <div class="product-price">29.99 ETB</div>
                            <div class="product-footer">
                                <button class="btn-reserve contact-btn" data-phone="{{ $owner_phone ?? '+251911XXXXXX' }}">
                                    <i class="bi bi-whatsapp"></i>
                                </button>
                                <a href="#" class="btn-price">
                                    <i class="bi bi-bag"></i> Buy
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="no-results" data-aos="fade-up">
                <i class="bi bi-search"></i>
                <h3>No results found</h3>
                <p>Try searching with different keywords or browse our featured remedies.</p>
                <a href="{{ route('welcome') }}" class="btn-account" style="background: var(--primary-light); color: var(--primary); border: none; padding: 1rem 2.5rem; display: inline-block; margin-top: 1rem;">BACK TO HOME</a>
            </div>
        @endforelse
    </div>
</section>

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

    // Contact button interaction
    document.querySelectorAll('.contact-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const phone = this.getAttribute('data-phone');
            
            // Show phone number on button
            this.innerHTML = phone;
            this.classList.add('bg-success');
            this.style.border = 'none';
            this.style.fontSize = '0.8rem';
            this.style.padding = '0.8rem';
        });
    });

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('.navbar');
        if (window.scrollY > 100) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });
</script>

</body>
</html>
                      