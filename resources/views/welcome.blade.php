<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>HerbMed Ethiopia – Ancient Wisdom, Modern Healing</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts - Clean & Professional -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary: #1c1601;        /* Dark background from car rental */
            --primary-light: #ffca08;   /* Yellow accent */
            --text-light: #8e8e8e;      /* Gray text */
            --text-dark: #232222;        /* Dark text */
            --border-color: rgba(255,255,255,0.1);
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #ffffff;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* ===== Navigation ===== */
        .navbar {
            background: var(--primary) !important;
            padding: 0.5rem 0;
            border-bottom: 1px solid var(--border-color);
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
        }

        .btn-account:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        /* ===== Hero Section (Slider Style) ===== */
        .hero-section {
            background: var(--primary);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1615485290382-441e4d049cb5?auto=format&fit=crop&w=1920&q=80') center/cover;
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-subtitle {
            color: var(--text-light);
            font-size: 1.2rem;
            font-weight: 500;
            font-style: italic;
            margin-bottom: 1rem;
        }

        .hero-title {
            font-size: 4.5rem;
            font-weight: 900;
            font-style: italic;
            color: white;
            line-height: 1;
            margin-bottom: 2rem;
        }

        .hero-title span {
            color: var(--primary-light);
            display: block;
            font-size: 3rem;
            font-weight: 400;
        }

        .hero-image {
            position: relative;
            z-index: 2;
        }

        .hero-image img {
            max-width: 100%;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        /* ===== Search Form ===== */
        .search-wrapper {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 50px;
            padding: 5px;
            max-width: 700px;
        }

        .search-wrapper .form-control {
            background: transparent;
            border: none;
            color: white;
            padding: 1rem 1.5rem;
            font-size: 1rem;
        }

        .search-wrapper .form-control::placeholder {
            color: rgba(255,255,255,0.5);
            font-style: italic;
        }

        .search-wrapper .form-control:focus {
            box-shadow: none;
        }

        .search-wrapper .btn {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 700;
            font-style: italic;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            border: 2px solid transparent;
            transition: all 0.3s;
        }

        .search-wrapper .btn:hover {
            background: transparent;
            border-color: var(--primary-light);
            color: var(--primary-light);
        }

        /* ===== Section Headers ===== */
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
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

        /* ===== Feature Cards (Like Car Rental) ===== */
        .feature-card {
            text-align: center;
            padding: 2rem;
            transition: all 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: var(--primary-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
        }

        .feature-icon i {
            font-size: 2.5rem;
            color: var(--primary);
        }

        .feature-card h4 {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .feature-card p {
            color: var(--text-light);
            font-size: 0.95rem;
        }

        /* ===== Article Cards ===== */
        .article-card {
            background: white;
            border: 1px solid #f0f0f0;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            height: 100%;
        }

        .article-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
        }

        .article-image {
            height: 200px;
            overflow: hidden;
        }

        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s;
        }

        .article-card:hover .article-image img {
            transform: scale(1.1);
        }

        .article-content {
            padding: 1.5rem;
        }

        .article-meta {
            color: var(--primary-light);
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .article-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--primary);
        }

        .article-excerpt {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .btn-read {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-read:hover {
            color: var(--primary-light);
        }

        /* ===== Product Cards ===== */
        .product-card {
            background: white;
            border: 1px solid #f0f0f0;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
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
        }

        .product-actions {
            position: absolute;
            top: 1rem;
            right: 1rem;
            display: flex;
            gap: 0.5rem;
            opacity: 0;
            transition: opacity 0.3s;
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

        .btn-reserve {
            background: var(--primary);
            color: white;
            font-weight: 700;
            font-style: italic;
            padding: 0.8rem;
            border-radius: 50px;
            width: 100%;
            border: 2px solid transparent;
            transition: all 0.3s;
        }

        .btn-reserve:hover {
            background: var(--primary-light);
            color: var(--primary);
            border-color: var(--primary);
        }

        /* ===== Pricing/Plans Section ===== */
        .plans-section {
            background: var(--primary);
            color: white;
            padding: 60px 0;
        }

        .plan-card {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 25px;
            padding: 2rem;
            text-align: center;
            height: 100%;
            transition: all 0.3s;
        }

        .plan-card:hover {
            background: rgba(255,255,255,0.15);
            transform: translateY(-10px);
        }

        .plan-card.popular {
            background: var(--primary-light);
            color: var(--primary);
            position: relative;
            overflow: hidden;
        }

        .popular-badge {
            position: absolute;
            top: 1rem;
            right: -2rem;
            background: var(--primary);
            color: var(--primary-light);
            padding: 0.3rem 3rem;
            transform: rotate(45deg);
            font-size: 0.8rem;
            font-weight: 700;
        }

        .plan-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .plan-price {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 2rem;
        }

        .plan-price small {
            font-size: 1rem;
            opacity: 0.7;
        }

        .plan-features {
            list-style: none;
            padding: 0;
            margin: 0 0 2rem;
        }

        .plan-features li {
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .plan-features li:last-child {
            border-bottom: none;
        }

        .plan-features i {
            color: var(--primary-light);
            margin-right: 0.5rem;
        }

        .popular .plan-features i {
            color: var(--primary);
        }

        .btn-plan {
            background: transparent;
            border: 2px solid var(--primary-light);
            color: var(--primary-light);
            font-weight: 700;
            font-style: italic;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            width: 100%;
            transition: all 0.3s;
        }

        .btn-plan:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .popular .btn-plan {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .popular .btn-plan:hover {
            background: transparent;
            color: var(--primary);
        }

        /* ===== Stats Section ===== */
        .stats-section {
            padding: 60px 0;
            background: #f8f8f8;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary);
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--text-light);
            font-weight: 500;
        }

        /* ===== Testimonials ===== */
        .testimonial-card {
            background: white;
            border: 1px solid #f0f0f0;
            border-radius: 25px;
            padding: 2rem;
            height: 100%;
            transition: all 0.3s;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
        }

        .testimonial-stars {
            color: var(--primary-light);
            margin-bottom: 1rem;
        }

        .testimonial-content {
            color: var(--text-dark);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            background: var(--primary-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-weight: 700;
        }

        .author-info h6 {
            margin: 0;
            font-weight: 700;
            color: var(--primary);
        }

        .author-info small {
            color: var(--text-light);
        }

        /* ===== Footer ===== */
        .footer {
            background: var(--primary);
            color: white;
            padding: 60px 0 30px;
        }

        .footer h5 {
            color: white;
            font-weight: 700;
            margin-bottom: 1.5rem;
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
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-links a {
            color: white;
            background: rgba(255,255,255,0.1);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
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

        .newsletter-form button {
            background: var(--primary-light);
            border: none;
            border-radius: 50px;
            padding: 0.8rem 2rem;
            color: var(--primary);
            font-weight: 700;
            font-style: italic;
            transition: all 0.3s;
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
            color: rgba(255,255,255,0.4);
            font-size: 0.9rem;
        }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 3rem;
            }
            
            .hero-title span {
                font-size: 2rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .navbar-nav {
                background: var(--primary);
                padding: 1rem;
                border-radius: 15px;
            }
            
            .nav-link {
                padding: 0.8rem 1rem !important;
            }
        }
    </style>
</head>
<body>

<!-- Navigation - Exactly like car rental -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">HERBMED<span>.</span>ET</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">REMEDIES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">LITERATURE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('consultation.index') }}">CONSULTATION</a>
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

<!-- Hero Section - Like car rental slider -->
<section class="hero-section" style="height: 100vh;">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-lg-6 d-flex align-items-center"> 
                <div class="hero-content" data-aos="fade-right">
                    <div class="hero-subtitle">Ethically Sourced • Ancestral Wisdom</div>
                    <h1 class="hero-title">
                        Healing for the <span>Modern Soul</span>
                    </h1>
                    
                    <!-- Search Form - Like the booking form -->
                    <div class="search-wrapper mb-5">
                        <form class="d-flex" action="{{ route('products.search') }}" method="GET">
                            <input type="text" name="q" class="form-control" placeholder="Search for 'Tena Adam' or 'Respiratory'..." value="{{ request('q') }}">
                            <button type="submit" class="btn">DISCOVER</button>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Why Choose Us - Like car rental features -->
<section class="py-5">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">WHY CHOOSE US</span>
            <h2 class="section-title">We compare traditional wisdom, <span>you save!</span></h2>
        </div>
        
        <div class="row">
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-flower1"></i>
                    </div>
                    <h4>Wild Harvested</h4>
                    <p>Ethically sourced from Ethiopian highlands</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4>Lab Tested</h4>
                    <p>Certified purity and potency</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-translate"></i>
                    </div>
                    <h4>Multilingual</h4>
                    <p>Support in 8+ languages</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-truck"></i>
                    </div>
                    <h4>Global Shipping</h4>
                    <p>To your doorstep worldwide</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Articles - Like car rental blog section -->
@if($latestArticles->isNotEmpty())
<section class="py-5 bg-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">KNOWLEDGE & WISDOM</span>
            <h2 class="section-title">Latest <span>Insights</span></h2>
        </div>
        
        <div class="row g-4">
            @foreach($latestArticles->take(3) as $article)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="article-card">
                        <div class="article-image">
                            @if($article->featured_image)
                                <img src="{{ asset('storage/' . $article->featured_image) }}" alt="{{ $article->title }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&w=800&q=80" alt="Article">
                            @endif
                        </div>
                        <div class="article-content">
                            <div class="article-meta">{{ $article->published_at ? $article->published_at->format('M d, Y') : 'Recently' }}</div>
                            <h5 class="article-title">{{ Str::limit($article->title, 50) }}</h5>
                            <p class="article-excerpt">{{ Str::limit(strip_tags($article->content), 100) }}</p>
                            <a href="#" class="btn-read">
                                Read More <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Featured Remedies - Like car rental products -->
<section class="py-5">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">THE APOTHECARY</span>
            <h2 class="section-title">Featured <span>Remedies</span></h2>
        </div>

        <div class="row g-4">
            @forelse ($featuredPlants as $plant)
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
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
                            <button class="btn-reserve contact-btn" data-phone="{{ $owner_phone ?? '+251911XXXXXX' }}">
                                <i class="bi bi-whatsapp me-2"></i>RESERVE NOW
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted">No medicinal plants available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Plans Section - Like car rental pricing -->
<section class="plans-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle" style="color: var(--primary-light);">HEALING PLANS</span>
            <h2 class="section-title" style="color: white;">Find the perfect <span style="color: var(--primary-light);">wellness package</span></h2>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="plan-card">
                    <h3>Weekly Wellness</h3>
                    <div class="plan-price">$49 <small>/week</small></div>
                    <ul class="plan-features">
                        <li><i class="bi bi-check-circle"></i> 3 herbal tinctures</li>
                        <li><i class="bi bi-check-circle"></i> Weekly consultation</li>
                        <li><i class="bi bi-check-circle"></i> Free digital guide</li>
                        <li><i class="bi bi-check-circle"></i> Email support</li>
                        <li><i class="bi bi-check-circle"></i> 10% member discount</li>
                        <li><i class="bi bi-check-circle"></i> Free shipping</li>
                    </ul>
                    <button class="btn-plan">Get Started</button>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="plan-card popular">
                    <div class="popular-badge">MOST POPULAR</div>
                    <h3>Monthly Healing</h3>
                    <div class="plan-price">$149 <small>/month</small></div>
                    <ul class="plan-features">
                        <li><i class="bi bi-check-circle"></i> 10 herbal tinctures</li>
                        <li><i class="bi bi-check-circle"></i> 4 consultations</li>
                        <li><i class="bi bi-check-circle"></i> Premium book access</li>
                        <li><i class="bi bi-check-circle"></i> Priority support</li>
                        <li><i class="bi bi-check-circle"></i> 25% member discount</li>
                        <li><i class="bi bi-check-circle"></i> Free express shipping</li>
                    </ul>
                    <button class="btn-plan">Get Started</button>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="plan-card">
                    <h3>Annual Wisdom</h3>
                    <div class="plan-price">$499 <small>/year</small></div>
                    <ul class="plan-features">
                        <li><i class="bi bi-check-circle"></i> Unlimited herbs</li>
                        <li><i class="bi bi-check-circle"></i> Unlimited consultations</li>
                        <li><i class="bi bi-check-circle"></i> All books included</li>
                        <li><i class="bi bi-check-circle"></i> VIP support</li>
                        <li><i class="bi bi-check-circle"></i> 40% member discount</li>
                        <li><i class="bi bi-check-circle"></i> Free worldwide shipping</li>
                    </ul>
                    <button class="btn-plan">Get Started</button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section - Like car rental stats -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-item">
                    <div class="stat-number">145+</div>
                    <div class="stat-label">Countries</div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-item">
                    <div class="stat-number">10k+</div>
                    <div class="stat-label">Happy Clients</div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-item">
                    <div class="stat-number">50+</div>
                    <div class="stat-label">Traditional Herbs</div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-item">
                    <div class="stat-number">38+</div>
                    <div class="stat-label">Languages</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section - Like car rental -->
@if($testimonials && count($testimonials) > 0)
<section class="py-5">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">TESTIMONIALS</span>
            <h2 class="section-title">What our <span>customers say</span></h2>
        </div>
        
        <div class="row g-4">
            @foreach($testimonials as $testimonial)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star{{ $i <= ($testimonial['rating'] ?? 5) ? '-fill' : '' }}"></i>
                            @endfor
                        </div>
                        <p class="testimonial-content">"{{ $testimonial['content'] }}"</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                {{ substr($testimonial['author'], 0, 1) }}
                            </div>
                            <div class="author-info">
                                <h6>{{ $testimonial['author'] }}</h6>
                                <small>{{ $testimonial['location'] }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Footer - Like car rental -->
<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-logo">HERBMED<span>.</span>ET</div>
                <p class="footer-text">Reviving the heritage of Ethiopian medicinal plants through science and storytelling. Authentically sourced from local healers.</p>
                <div class="social-links">
                    @if($socialAccounts->isNotEmpty())
                        @foreach($socialAccounts as $account)
                            <a href="{{ $account->url }}" target="_blank">
                                <i class="bi bi-{{ $account->platform }}"></i>
                            </a>
                        @endforeach
                    @else
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-2">
                <h5>SHOP</h5>
                <ul>
                    <li><a href="#">Herbal Extracts</a></li>
                    <li><a href="#">Dry Roots</a></li>
                    <li><a href="#">Ancient Books</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h5>SUPPORT</h5>
                <ul>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5>WEEKLY WISDOM</h5>
                <p class="footer-text">Subscribe to receive guides on seasonal remedies.</p>
                <div class="newsletter-form">
                    <input type="email" placeholder="Email Address">
                    <button>JOIN</button>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            © 2026 HERBMED ETHIOPIA. ALL RIGHTS RESERVED.
        </div>
    </div>
</footer>

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
            this.innerHTML = `<i class="bi bi-whatsapp me-2"></i> ${phone}`;
            this.classList.add('bg-success');
            this.style.border = 'none';
        });
    });

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('.navbar');
        if (window.scrollY > 100) {
            nav.style.background = 'var(--primary)';
            nav.style.boxShadow = '0 5px 20px rgba(0,0,0,0.1)';
        } else {
            nav.style.background = 'var(--primary)';
            nav.style.boxShadow = 'none';
        }
    });
</script>

</body>
</html>