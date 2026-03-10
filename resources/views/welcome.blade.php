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

        /* Hero Section */
        .hero-section {
            background: var(--primary);
            padding: 100px 0 60px;
            position: relative;
            overflow: hidden;
            text-align: center;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1615485290382-441e4d049cb5?auto=format&fit=crop&w=1920&q=80') center/cover;
            opacity: 0.2;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-subtitle {
            color: var(--text-light);
            font-size: 1rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 1rem;
        }

        .hero-title {
            font-size: 4.5rem;
            font-weight: 900;
            font-style: italic;
            color: white;
            line-height: 1.1;
            margin-bottom: 2rem;
        }

        .hero-title span {
            color: var(--primary-light);
            display: block;
            font-size: 3rem;
            font-weight: 400;
        }

        /* Search Form */
        .search-wrapper {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 50px;
            padding: 5px;
            max-width: 600px;
            margin: 0 auto 3rem;
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
            padding: 1rem 2rem;
            border-radius: 50px;
            border: 2px solid transparent;
            transition: all 0.3s;
        }

        .search-wrapper .btn:hover {
            background: transparent;
            border-color: var(--primary-light);
            color: var(--primary-light);
        }

        /* Hero Stats */
        .hero-stats {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: center;
            gap: 4rem;
            padding: 2rem 0;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .hero-stat-item {
            text-align: center;
        }

        .hero-stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-light);
            line-height: 1;
            margin-bottom: 0.3rem;
        }

        .hero-stat-label {
            color: rgba(255,255,255,0.7);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Section Headers */
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

        /* About Section */
        .about-section {
            padding: 80px 0;
            background: #f8f8f8;
        }

        .about-image {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .about-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .about-content h3 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .about-content p {
            color: var(--text-light);
            font-size: 1rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .about-features {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin: 2rem 0;
        }

        .about-feature {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .about-feature i {
            color: var(--primary-light);
            font-size: 1.2rem;
        }

        .about-feature span {
            font-weight: 500;
        }

        /* Video Section */
        .video-section {
            padding: 60px 0;
            background: white;
        }

        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .video-card {
            background: white;
            border: 1px solid #f0f0f0;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
        }

        .video-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.05);
        }

        .video-wrapper {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
            height: 0;
            overflow: hidden;
        }

        .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }

        .video-info {
            padding: 1rem;
        }

        .video-title {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.3rem;
        }

        .video-meta {
            color: var(--text-light);
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .video-meta i {
            color: var(--primary-light);
            margin-right: 0.2rem;
        }

        .btn-upload {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 700;
            font-style: italic;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            border: none;
            transition: all 0.3s;
            margin-top: 2rem;
        }

        .btn-upload:hover {
            background: var(--primary);
            color: white;
        }

        /* Contact Section */
        .contact-section {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--primary) 0%, #2a1f02 100%);
            color: white;
        }

        .contact-info {
            padding-right: 2rem;
        }

        .contact-info h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--primary-light);
        }

        .contact-info p {
            color: rgba(255,255,255,0.7);
            margin-bottom: 2rem;
            line-height: 1.8;
        }

        .contact-details {
            list-style: none;
            padding: 0;
            margin-bottom: 2rem;
        }

        .contact-details li {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .contact-details i {
            width: 40px;
            height: 40px;
            background: rgba(255,202,8,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-light);
            font-size: 1.2rem;
        }

        .contact-details span {
            color: rgba(255,255,255,0.9);
        }

        .contact-social {
            display: flex;
            gap: 1rem;
        }

        .contact-social a {
            width: 45px;
            height: 45px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s;
        }

        .contact-social a:hover {
            background: var(--primary-light);
            color: var(--primary);
            transform: translateY(-5px);
        }

        .contact-form {
            background: white;
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 30px 60px rgba(0,0,0,0.2);
        }

        .contact-form h4 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .contact-form .form-control,
        .contact-form .form-select {
            border: 1px solid #f0f0f0;
            border-radius: 10px;
            padding: 0.8rem 1rem;
            margin-bottom: 1rem;
        }

        .contact-form .form-control:focus,
        .contact-form .form-select:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.2rem rgba(255,202,8,0.1);
        }

        .contact-form textarea {
            min-height: 120px;
        }

        .contact-form button {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 700;
            font-style: italic;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            border: none;
            width: 100%;
            transition: all 0.3s;
        }

        .contact-form button:hover {
            background: var(--primary);
            color: white;
        }

        /* Product Cards */
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

        /* Article Cards */
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

        /* Feature Cards */
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

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 3rem;
            padding-top: 2rem;
            text-align: center;
            color: rgba(255,255,255,0.4);
            font-size: 0.9rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 3rem;
            }
            
            .hero-title span {
                font-size: 2rem;
            }
            
            .hero-stats {
                flex-direction: column;
                gap: 1.5rem;
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
            
            .about-features {
                grid-template-columns: 1fr;
            }
            
            .contact-info {
                padding-right: 0;
                margin-bottom: 2rem;
            }
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">HERBMED<span>.</span>ET</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#home">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#remedies">REMEDIES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#videos">VIDEOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">LITERATURE</a>
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
<section class="hero-section" id="home">
    <div class="container">
        <div class="hero-content" data-aos="fade-up">
            <div class="hero-subtitle">Ethiopian Heritage • Since 2020</div>
            <h1 class="hero-title">
                Ancient Wisdom <span>Modern Healing</span>
            </h1>
            
            <!-- Search Form -->
            <div class="search-wrapper">
                <form class="d-flex" action="{{ route('products.search') }}" method="GET">
                    <input type="text" name="q" class="form-control" placeholder="Search for 'Tena Adam'..." value="{{ request('q') }}">
                    <button type="submit" class="btn">DISCOVER</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Hero Stats - Now at bottom of hero section -->
    <div class="hero-stats" data-aos="fade-up" data-aos-delay="200">
        <div class="hero-stat-item">
            <div class="hero-stat-number count-up">50</div>
            <div class="hero-stat-label">Traditional Herbs</div>
        </div>
        <div class="hero-stat-item">
            <div class="hero-stat-number count-up">10</div>
            <div class="hero-stat-label">Happy Clients</div>
        </div>
        <div class="hero-stat-item">
            <div class="hero-stat-number count-up">24</div>
            <div class="hero-stat-label">Expert Support</div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
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

<!-- Featured Remedies -->
<section class="py-5" id="remedies">
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

<!-- About Section -->
<section class="about-section" id="about">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="about-image">
                    <img src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?auto=format&fit=crop&w=800&q=80" alt="About HerbMed" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="about-content">
                    <span class="section-subtitle">OUR STORY</span>
                    <h3>Reviving Ethiopia's Healing Heritage</h3>
                    <p>For generations, Ethiopian healers have passed down knowledge of medicinal plants through oral tradition. HerbMed was founded to preserve this wisdom while making it accessible to the modern world.</p>
                    <p>We work directly with local communities in the Ethiopian highlands, ensuring fair trade practices and sustainable harvesting. Every product is lab-tested for purity while maintaining traditional preparation methods.</p>
                    
                    <div class="about-features">
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>100% Natural Ingredients</span>
                        </div>
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Fair Trade Certified</span>
                        </div>
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Traditional Knowledge</span>
                        </div>
                        <div class="about-feature">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Modern Science Backed</span>
                        </div>
                    </div>
                    
                    <a href="#" class="btn-account" style="background: var(--primary-light); color: var(--primary); border: none; padding: 1rem 2.5rem;">LEARN MORE</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Section -->
<section class="video-section" id="videos">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">COMMUNITY VIDEOS</span>
            <h2 class="section-title">Healing <span>Stories</span></h2>
            <p class="text-muted">Watch and share your own experiences with traditional medicine</p>
        </div>
        
        <!-- Video Grid - Sample videos (replace with dynamic content) -->
        <div class="video-grid">
            <div class="video-card" data-aos="fade-up" data-aos-delay="100">
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h6 class="video-title">Tena Adam for Immunity</h6>
                    <div class="video-meta">
                        <span><i class="bi bi-person"></i> Alemitu B.</span>
                        <span><i class="bi bi-calendar"></i> 2 days ago</span>
                    </div>
                </div>
            </div>
            
            <div class="video-card" data-aos="fade-up" data-aos-delay="200">
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h6 class="video-title">Traditional Preparation Methods</h6>
                    <div class="video-meta">
                        <span><i class="bi bi-person"></i> Tadesse W.</span>
                        <span><i class="bi bi-calendar"></i> 1 week ago</span>
                    </div>
                </div>
            </div>
            
            <div class="video-card" data-aos="fade-up" data-aos-delay="300">
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h6 class="video-title">Damakasse for Digestive Health</h6>
                    <div class="video-meta">
                        <span><i class="bi bi-person"></i> Meseret K.</span>
                        <span><i class="bi bi-calendar"></i> 2 weeks ago</span>
                    </div>
                </div>
            </div>
            
            <div class="video-card" data-aos="fade-up" data-aos-delay="400">
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h6 class="video-title">Eucalyptus Oil Extraction</h6>
                    <div class="video-meta">
                        <span><i class="bi bi-person"></i> Worku D.</span>
                        <span><i class="bi bi-calendar"></i> 3 weeks ago</span>
                    </div>
                </div>
            </div>
            
            <div class="video-card" data-aos="fade-up" data-aos-delay="500">
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h6 class="video-title">Neem for Skin Conditions</h6>
                    <div class="video-meta">
                        <span><i class="bi bi-person"></i> Genet A.</span>
                        <span><i class="bi bi-calendar"></i> 1 month ago</span>
                    </div>
                </div>
            </div>
            
            <div class="video-card" data-aos="fade-up" data-aos-delay="600">
                <div class="video-wrapper">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h6 class="video-title">My Journey with HerbMed</h6>
                    <div class="video-meta">
                        <span><i class="bi bi-person"></i> Sarah J.</span>
                        <span><i class="bi bi-calendar"></i> 2 months ago</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Upload Button -->
        <div class="text-center">
            <button class="btn-upload" data-bs-toggle="modal" data-bs-target="#uploadModal">
                <i class="bi bi-upload me-2"></i> SHARE YOUR VIDEO
            </button>
        </div>
    </div>
</section>

<!-- Upload Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Share Your Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" class="form-control" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">YouTube / Vimeo Link</label>
                        <input type="url" class="form-control" placeholder="https://youtube.com/watch?v=...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Video Title</label>
                        <input type="text" class="form-control" placeholder="Enter video title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description (Optional)</label>
                        <textarea class="form-control" rows="3" placeholder="Tell us about your video"></textarea>
                    </div>
                    <button type="submit" class="btn-upload w-100">SUBMIT VIDEO</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Contact Section -->
<section class="contact-section" id="contact">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="contact-info">
                    <span class="section-subtitle" style="color: var(--primary-light);">GET IN TOUCH</span>
                    <h3>Let's Connect</h3>
                    <p>Have questions about our products or traditional medicine? Reach out to us anytime. Our team of experts is here to help you on your wellness journey.</p>
                    
                    <ul class="contact-details">
                        <li>
                            <i class="bi bi-geo-alt"></i>
                            <span>Bole Road, Addis Ababa, Ethiopia</span>
                        </li>
                        <li>
                            <i class="bi bi-telephone"></i>
                            <span>+251 911 234 567</span>
                        </li>
                        <li>
                            <i class="bi bi-envelope"></i>
                            <span>hello@herbmed.et</span>
                        </li>
                        <li>
                            <i class="bi bi-clock"></i>
                            <span>Mon - Fri: 9:00 AM - 6:00 PM</span>
                        </li>
                    </ul>
                    
                    <div class="contact-social">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                        <a href="#"><i class="bi bi-telegram"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="contact-form">
                    <h4>Send us a Message</h4>
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" placeholder="Your Message"></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit">SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Latest Articles -->
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

<!-- Testimonials Section -->
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

<!-- Promotions Section -->
@if($activePromotions->isNotEmpty())
<section class="py-5 bg-light">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">SPECIAL OFFERS</span>
            <h2 class="section-title">Current <span>Promotions</span></h2>
        </div>
        
        <div class="row g-4">
            @foreach($activePromotions as $promotion)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="card border-0 shadow-sm h-100">
                        @if($promotion->image)
                            <img src="{{ asset('storage/' . $promotion->image) }}" class="card-img-top" alt="{{ $promotion->title }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0">{{ $promotion->title }}</h5>
                                <span class="badge bg-danger">{{ $promotion->discount_display ?? 'Special Offer' }}</span>
                            </div>
                            <p class="card-text text-muted">{{ Str::limit($promotion->description, 100) }}</p>
                            @if($promotion->promo_code)
                                <div class="input-group">
                                    <input type="text" class="form-control" value="{{ $promotion->promo_code }}" readonly>
                                    <button class="btn btn-outline-secondary" type="button" onclick="copyPromoCode('{{ $promotion->promo_code }}')">Copy</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Footer -->
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

    // Live Counter Animation
    function animateCounter(element) {
        const target = parseInt(element.innerText);
        let count = 0;
        const duration = 2000; // 2 seconds
        const step = target / (duration / 16); // 60fps
        
        function updateCount() {
            count += step;
            if (count < target) {
                element.innerText = Math.floor(count) + '+';
                requestAnimationFrame(updateCount);
            } else {
                element.innerText = target + '+';
            }
        }
        
        updateCount();
    }

    // Trigger counters when they come into view
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counters = entry.target.querySelectorAll('.count-up');
                counters.forEach(counter => animateCounter(counter));
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    // Observe hero stats section
    const heroStats = document.querySelector('.hero-stats');
    if (heroStats) {
        observer.observe(heroStats);
    }

    // Contact button interaction
    document.querySelectorAll('.contact-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const phone = this.getAttribute('data-phone');
            this.innerHTML = `<i class="bi bi-whatsapp me-2"></i> ${phone}`;
            this.classList.add('bg-success');
            this.style.border = 'none';
        });
    });

    // Copy promo code
    function copyPromoCode(code) {
        navigator.clipboard.writeText(code).then(() => {
            alert('Promo code copied to clipboard!');
        });
    }

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

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>

</body>
</html>