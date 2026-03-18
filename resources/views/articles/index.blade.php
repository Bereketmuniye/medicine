<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ጽሑፍ - የኢትዮጵያ ጥንታዊ ሕክምና ጽሑፍት</title>

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
    <style>
        /* Shared styles are now in global.css */


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
        .articles-hero {
            padding: 140px 0 80px;
            background: linear-gradient(135deg, var(--primary) 0%, #2a1f02 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .articles-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1515377901034-d2535478c6c6?auto=format&fit=crop&w=1920&q=80') center/cover;
            opacity: 0.1;
            z-index: 1;
        }

        .articles-hero .container {
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

        /* Articles Section */
        .articles-section {
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

        /* Article Cards */
        .article-card {
            background: white;
            border: 1px solid #f0f0f0;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            height: 100%;
            box-shadow: var(--card-shadow);
        }

        .article-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--card-hover-shadow);
        }

        .article-image {
            height: 200px;
            background: #f8f8f8;
            position: relative;
            overflow: hidden;
        }

        .article-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s;
        }

        .article-card:hover .article-image img {
            transform: scale(1.05);
        }

        .article-badge {
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

        .article-body {
            padding: 1.5rem;
        }

        .article-date {
            color: var(--text-light);
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .article-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1rem;
            line-height: 1.3;
        }

        .article-excerpt {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .article-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn-read {
            background: var(--primary);
            color: white;
            font-weight: 700;
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .btn-read:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .article-views {
            color: var(--text-light);
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .no-articles {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-light);
        }

        .no-articles i {
            font-size: 4rem;
            color: var(--primary-light);
            margin-bottom: 1rem;
        }

        .no-articles h3 {
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
<body class="pt-5">

<!-- Navigation -->
<x-navigation />

<!-- Hero Section -->
<section class="articles-hero">
    <div class="container">
        <div class="hero-content" data-aos="fade-up">
            <span class="section-subtitle">እውቀት እና ጥበብ</span>
            <h1>ጥንታዊ የኢትዮጵያ <span>ጽሑፍ</span></h1>
            <p>ስለ ጥንታዊ የፈውስ እውቀቶች፣ ስለ መድሃኒትነት ያላቸው ዕጽዋቶች እና ስለ አጠቃላይ ጤናዎ ያሉንን ጽሑፎች ስብስብ እዚህ ያግኙ</p>
        </div>
    </div>
</section>

<!-- Search Section -->
<section class="search-section">
    <div class="container">
        <div class="search-form" data-aos="fade-up">
            <form method="GET" action="{{ route('articles.index') }}" class="row g-3">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control" placeholder="ጽሑፉዎትን ይፈልጉ..." value="{{ request('search') }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn-search w-100">
                        <i class="bi bi-search me-2"></i>ፈልጉ
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="articles-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">የቅርብ ጊዜ ጽሑፎች</span>
            <h2 class="section-title">የተለያዩ <span>ጽሑፎች</span></h2>
        </div>

        <div class="row g-4">
            @forelse($articles as $article)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                    <div class="article-card">
                        <div class="article-image">
                            @php
                                $images = is_string($article->featured_image) 
                                    ? json_decode($article->featured_image, true) 
                                    : (is_array($article->featured_image) ? $article->featured_image : []);
                                $mainImage = !empty($images) ? $images[0] : ($article->featured_image ?? 'images/placeholder-plant.jpg');
                            @endphp

                            @if($mainImage)
                                <img 
                                    src="{{ asset('storage/' . $mainImage) }}" 
                                    alt="{{ $article->title }}" 
                                    class="w-100 h-100 object-fit-cover"
                                    loading="lazy"
                                >
                            @else
                                <div class="w-100 h-100 d-flex align-items-center justify-center bg-gradient-to-br from-[var(--primary)] to-[var(--coffee)] text-white opacity-60">
                                    <i class="bi bi-flower1 fs-1"></i>
                                </div>
                            @endif

                            <span class="article-badge">
                                {{ $article->category->name ?? 'ጥንታዊ' }}
                            </span>
                        </div>

                        <div class="article-body">
                            <div class="article-meta">
                                <span><i class="bi bi-calendar3"></i> {{ $article->published_at ? $article->published_at->format('M d, Y') : 'በቅርብ' }}</span>
                                <span class="ms-auto article-views">
                                    <i class="bi bi-eye"></i> {{ $article->views ?? 0 }}
                                </span>
                            </div>

                            <h5 class="article-title">{{ Str::limit($article->title, 65) }}</h5>
                            <p class="article-excerpt">{{ Str::limit(strip_tags($article->content), 140) }}</p>

                            <div class="article-footer">
                                <a href="{{ route('articles.show', $article->slug) }}" class="btn-read">ጽሑፉን ያንብቡ</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="no-articles" data-aos="fade-up">
                        <i class="bi bi-journal-text"></i>
                        <h3>ጽሑፍ አልተገኘም</h3>
                        <p>የተለየው የፍለግ ቃል ይሞክሩ ወይም የሙሉን ያስልፍሉ።</p>
                        <a href="{{ route('welcome') }}" class="btn btn-lg mt-3" style="background:var(--primary-light); color:var(--primary); border:none; padding:0.9rem 2.2rem; border-radius:50px; font-weight:700;">
                            ወደ ቤት ይመለሱ
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        @if($articles->hasPages())
            <div class="d-flex justify-content-center mt-5 pt-4" data-aos="fade-up">
                {{ $articles->links('pagination::bootstrap-5') }}
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
