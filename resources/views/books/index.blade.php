<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Books - Ethiopian Traditional Medicine Library</title>

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
            border: 2px solid #f0f0f0;
            border-radius: 10px;
            padding: 0.8rem 1.2rem;
            font-weight: 500;
        }

        .search-form .form-control:focus,
        .search-form .form-select:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.2rem rgba(255,202,8,0.25);
        }

        .btn-search {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-weight: 700;
            transition: all 0.3s;
        }

        .btn-search:hover {
            background: var(--primary-light);
            color: var(--primary);
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

        /* Book Cards */
        .book-card {
            background: white;
            border: 1px solid #f0f0f0;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            height: 100%;
            box-shadow: var(--card-shadow);
            display: flex;
            flex-direction: column;
        }

        .book-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--card-hover-shadow);
        }

        .book-image {
            height: 180px;
            background: #f8f8f8;
            position: relative;
            overflow: hidden;
        }

        .book-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s;
        }

        .book-card:hover .book-image img {
            transform: scale(1.05);
        }

        .book-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 600;
            font-size: 0.65rem;
            padding: 0.2rem 0.8rem;
            border-radius: 20px;
            z-index: 2;
        }

        .book-content {
            padding: 1.2rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .book-type {
            color: var(--primary-light);
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }

        .book-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .book-description {
            color: var(--text-light);
            font-size: 0.8rem;
            line-height: 1.4;
            margin-bottom: 1rem;
            flex: 1;
        }

        .book-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 0.8rem;
        }

        .book-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--primary);
        }

        .book-stock {
            font-size: 0.7rem;
            color: var(--text-light);
        }

        .book-card .btn-reserve {
            background: var(--primary);
            color: white;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            border: 2px solid transparent;
            transition: all 0.3s;
            cursor: pointer;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .book-card .btn-reserve:hover {
            background: var(--primary-light);
            color: var(--primary);
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
                    <a class="nav-link active" href="{{ route('books.index') }}">BOOKS</a>
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

<!-- Hero Section -->
<section class="books-hero">
    <div class="container">
        <div class="hero-content" data-aos="fade-up">
            <span class="section-subtitle">THE LIBRARY</span>
            <h1>Ancient Wisdom & <span>Modern Knowledge</span></h1>
            <p>Discover our curated collection of books on Ethiopian traditional medicine, from ancient Ge'ez manuscripts to modern botanical studies.</p>
        </div>
    </div>
</section>

<!-- Search Section -->
<section class="search-section">
    <div class="container">
        <div class="search-form" data-aos="fade-up">
            <form method="GET" action="{{ route('books.index') }}" class="row g-3">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" placeholder="Search books..." value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn-search w-100">
                        <i class="bi bi-search me-2"></i>SEARCH
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
            <span class="section-subtitle">BOOKS</span>
            <h2 class="section-title">Featured <span>Books</span></h2>
        </div>

        <div class="row g-4">
            @forelse($books as $book)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="book-card">
                        <a href="{{ route('books.show', $book->slug) }}" class="text-decoration-none">
                            <div class="book-image">
                                @php
                                    $coverPath = null;
                                    $coverData = $book->cover;
                                    
                                    // Handle double encoding if it exists
                                    if (is_string($coverData) && str_starts_with($coverData, '[')) {
                                        $coverData = json_decode($coverData, true);
                                    }
                                    
                                    if (is_array($coverData) && count($coverData) > 0) {
                                        $coverPath = $coverData[0];
                                    } elseif (is_string($coverData)) {
                                        $coverPath = $coverData;
                                    }
                                @endphp

                                @if($coverPath)
                                    <img src="{{ asset('storage/' . $coverPath) }}" alt="{{ $book->title }}" class="active">
                                @else
                                    <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=400&q=80" alt="{{ $book->title }}" class="active">
                                @endif
                                <span class="book-badge">{{ ucfirst($book->type) }}</span>
                            </div>
                        </a>
                        <div class="book-content">
                            <div class="book-type">{{ ucfirst($book->type) }}</div>
                            <h5 class="book-title">
                                <a href="{{ route('books.show', $book->slug) }}" class="text-decoration-none text-dark">
                                    {{ Str::limit($book->title, 40) }}
                                </a>
                            </h5>
                            <div class="book-description">{{ Str::limit($book->description, 60) }}</div>
                            <div class="book-footer">
                                <div>
                                    <div class="book-price">{{ number_format($book->price, 2) }} ETB</div>
                                    <div class="book-stock">
                                        @if($book->stock !== null)
                                            {{ $book->stock }} in stock
                                        @else
                                            Digital Download
                                        @endif
                                    </div>
                                </div>
                                <button class="btn-reserve contact-btn" data-phone="{{ $owner_phone ?? '+251911XXXXXX' }}">
                                    <i class="bi bi-whatsapp"></i> Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="no-books" data-aos="fade-up">
                        <i class="bi bi-book"></i>
                        <h3>No books found</h3>
                        <p>Try adjusting your search or browse all categories.</p>
                        <a href="{{ route('welcome') }}" class="btn-account" style="background: var(--primary-light); color: var(--primary); border: none; padding: 1rem 2.5rem; display: inline-block; margin-top: 1rem;">BACK TO HOME</a>
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
</script>

</body>
</html>
