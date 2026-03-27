<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>መጻሕፍት - የኢትዮጵያ ጥንታዊ ሕክምና መጻሕፍት ቤተም</title>

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
    <link rel="stylesheet" href="{{ asset('css/books-shared.css') }}?v={{ filemtime(public_path('css/books-shared.css')) }}&t={{ time() }}">

    <style>

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

        /* Shared navigation styles are now in navigation component */


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

        /* Hero Section */
        .books-hero {
            padding: 140px 0 80px;
            background: linear-gradient(135deg, var(--primary) 0%, #2a1f02 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .books-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=1920&q=80') center/cover;
            opacity: 0.1;
            z-index: 1;
        }

        .books-hero .container {
            position: relative;
            z-index: 2;
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .hero-content h1 span {
            color: var(--primary-light);
            border-bottom: 4px solid var(--primary-light);
            padding-bottom: 5px;
        }

        .hero-content p {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        /* Search Section */
        .search-section {
            padding: 3rem 0;
            background: #f8f9fa;
        }

        .search-form {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
        }

        .search-form .form-control,
        .search-form .form-select {
            border: 1px solid rgba(0,0,0,0.08);
            border-radius: 16px;
            padding: 1rem 1.5rem;
            font-weight: 500;
            background: #fcfcfc;
            transition: var(--transition-base);
        }

        .search-form .form-control:focus {
            border-color: var(--primary-light);
            background: white;
            box-shadow: 0 0 0 4px rgba(255,202,8,0.1);
        }

        .btn-search {
            background: var(--primary);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 16px;
            font-weight: 700;
            transition: var(--transition-base);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-search:hover {
            background: var(--accent);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            color: white;
        }

        /* Books Section */
        .books-section {
            padding: 80px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-subtitle {
            color: var(--primary-light);
            font-size: 0.9rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 0.5rem;
            display: block;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .section-title span {
            color: var(--primary-light);
            border-bottom: 4px solid var(--primary-light);
            padding-bottom: 2px;
        }

        .no-books {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-light);
        }

        .no-books i {
            font-size: 4rem;
            color: var(--primary-light);
            margin-bottom: 1rem;
        }

        .no-books h3 {
            color: var(--primary);
            margin-bottom: 1rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2rem;
            }
            
            .section-title {
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

        /* Footer */
        .footer {
            background: var(--primary);
            color: white;
            padding: 60px 0 30px;
        }

        .footer h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .footer ul {
            list-style: none;
            padding: 0;
        }

        .footer ul li {
            margin-bottom: 0.8rem;
        }

        .footer ul li a {
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer ul li a:hover {
            color: var(--primary-light);
        }

        .footer-logo {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .footer-logo span {
            color: var(--primary-light);
        }

        .footer-text {
            color: rgba(255,255,255,0.6);
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255,255,255,0.1);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: all 0.3s;
        }

        .social-links a:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .newsletter-form {
            display: flex;
            gap: 0.5rem;
        }

        .newsletter-form input {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 50px;
            padding: 0.8rem 1.2rem;
            color: white;
            flex: 1;
        }

        .newsletter-form input::placeholder {
            color: rgba(255,255,255,0.4);
            font-style: italic;
        }

        .newsletter-form input:focus {
            outline: none;
            border-color: var(--primary-light);
        }

        .newsletter-form button {
            background: var(--primary-light);
            border: none;
            border-radius: 50px;
            padding: 0.8rem 2rem;
            color: var(--primary);
            font-weight: 700;
            font-style: italic;
            transition: all 0.3s;
            cursor: pointer;
        }

        .newsletter-form button:hover {
            background: transparent;
            border: 2px solid var(--primary-light);
            color: var(--primary-light);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 3rem;
            padding-top: 2rem;
            text-align: center;
            color: rgba(255,255,255,0.6);
        }
    </style>
</head>
<body id="home" class="pt-5">

<!-- Navigation -->
<x-navigation />


<!-- Hero Section -->
<section class="books-hero">
    <div class="container">
        <div class="hero-content" data-aos="fade-up">
            <span class="section-subtitle">{{ __('messages.books_title') }}</span>
            <h1>{{ __('messages.books_subtitle') }}</h1>
            <p>{{ __('messages.books_description') }}</p>
        </div>
    </div>
</section>

<!-- Search Section -->
<section class="search-section">
    <div class="container">
        <div class="search-form" data-aos="fade-up">
            <form method="GET" action="{{ route('books.index') }}" class="row g-3">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" placeholder="{{ __('messages.books_search_placeholder') }}" value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn-search w-100">
                        <i class="bi bi-search me-2"></i>{{ __('messages.books_search_button') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Books Section -->
<section class="books-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">{{ __('messages.books') }}</span>
            <h2 class="section-title">{{ __('messages.feature5_title') }} <span>{{ __('messages.books') }}</span></h2>
        </div>

        <div class="row g-4">
            @forelse($books as $book)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <x-book-card :book="$book" :ownerPhone="$owner_phone ?? '0911274140'" />
                </div>
            @empty
                <div class="col-12">
                    <div class="no-books" data-aos="fade-up">
                        <i class="bi bi-book"></i>
                        <h3>{{ __('messages.no_books_found') }}</h3>
                        <p>{{ __('messages.no_books_description') }}</p>
                        <a href="{{ route('welcome') }}" class="btn-account" style="background: var(--primary-light); color: var(--primary); border: none; padding: 1rem 2.5rem; display: inline-block; margin-top: 1rem;">{{ __('messages.back_to_home') }}</a>
                    </div>
                </div>
            @endforelse
        </div>


        <!-- Pagination -->
        @if(isset($books) && $books->hasPages())
            <div class="d-flex justify-content-center mt-5" data-aos="fade-up">
                {{ $books->links() }}
            </div>
        @endif
    </div>
</section>

<!-- Footer -->
<x-footer />

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

    // Mobile Navigation Self-Closing Fix (Robust version)
    document.addEventListener('click', function (e) {
        const isNavLink = e.target.closest('.navbar-nav .nav-link');
        const isDropdownToggle = e.target.closest('.dropdown-toggle');
        const isDropdownItem = e.target.closest('.dropdown-item');
        
        if ((isNavLink && !isDropdownToggle) || isDropdownItem) {
            if (window.innerWidth < 992) { // Only on mobile
                const menuToggle = document.getElementById('nav') || document.getElementById('navbarNav');
                if (menuToggle && menuToggle.classList.contains('show')) {
                    const bsCollapse = (window.bootstrap && window.bootstrap.Collapse) 
                        ? (window.bootstrap.Collapse.getInstance(menuToggle) || new window.bootstrap.Collapse(menuToggle, {toggle: false}))
                        : null;
                    
                    if (bsCollapse) {
                        bsCollapse.hide();
                    } else if (typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
                        const bsColl = bootstrap.Collapse.getInstance(menuToggle) || new bootstrap.Collapse(menuToggle, {toggle: false});
                        bsColl.hide();
                    }
                }
            }
        }
    });
</script>

</body>
</html>
