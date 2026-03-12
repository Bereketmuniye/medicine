<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $article->title }} - Ethiopian Traditional Medicine</title>

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

        /* Article Hero */
        .article-hero {
            padding: 140px 0 60px;
            background: linear-gradient(135deg, var(--primary) 0%, #2a1f02 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .article-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1481627834876-b7833e62f1a1?auto=format&fit=crop&w=1920&q=80') center/cover;
            opacity: 0.1;
            z-index: 1;
        }

        .article-hero .container {
            position: relative;
            z-index: 2;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
            margin-bottom: 2rem;
        }

        .breadcrumb-item a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--primary-light);
        }

        .article-title {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .article-meta {
            display: flex;
            align-items: center;
            gap: 2rem;
            color: rgba(255,255,255,0.8);
            font-size: 0.9rem;
        }

        .article-meta i {
            color: var(--primary-light);
            margin-right: 0.5rem;
        }

        /* Article Content */
        .article-content-section {
            padding: 80px 0;
            background: #ffffff;
        }

        .article-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
        }

        .article-body {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-dark);
        }

        .article-body h2,
        .article-body h3 {
            color: var(--primary);
            font-weight: 700;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }

        .article-body p {
            margin-bottom: 1.5rem;
        }

        .article-body ul,
        .article-body ol {
            margin-bottom: 1.5rem;
            padding-left: 2rem;
        }

        .article-body li {
            margin-bottom: 0.5rem;
        }

        .article-actions {
            display: flex;
            gap: 1rem;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 2px solid #f0f0f0;
        }

        .btn-action {
            background: var(--primary);
            color: white;
            font-weight: 700;
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-action:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .btn-action-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-action-outline:hover {
            background: var(--primary);
            color: white;
        }

        /* Sidebar */
        .sidebar-card {
            background: white;
            border: 1px solid #f0f0f0;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
        }

        .sidebar-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .sidebar-article {
            padding: 1rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .sidebar-article:last-child {
            border-bottom: none;
        }

        .sidebar-article h6 {
            margin-bottom: 0.5rem;
        }

        .sidebar-article h6 a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            line-height: 1.3;
        }

        .sidebar-article h6 a:hover {
            color: var(--primary-light);
        }

        .sidebar-article small {
            color: var(--text-light);
            font-size: 0.8rem;
        }

        /* CTA Section */
        .cta-section {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--primary) 0%, #2a1f02 100%);
            color: white;
            text-align: center;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .cta-description {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-cta {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 700;
            padding: 1rem 2rem;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-cta:hover {
            background: white;
            color: var(--primary);
        }

        .btn-cta-outline {
            background: transparent;
            border: 2px solid white;
            color: white;
        }

        .btn-cta-outline:hover {
            background: white;
            color: var(--primary);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .article-title {
                font-size: 1.8rem;
            }
            
            .article-meta {
                flex-direction: column;
                gap: 1rem;
            }
            
            .article-actions {
                flex-direction: column;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
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
                    <a class="nav-link active" href="{{ route('articles.index') }}">LITERATURE</a>
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

<!-- Article Hero -->
<section class="article-hero">
    <div class="container">
        <nav aria-label="breadcrumb" data-aos="fade-up">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Literature</a></li>
                <li class="breadcrumb-item active">{{ Str::limit($article->title, 40) }}</li>
            </ol>
        </nav>
        
        <div data-aos="fade-up">
            <h1 class="article-title">{{ $article->title }}</h1>
            <div class="article-meta">
                <div><i class="bi bi-calendar3"></i> {{ $article->published_at ? $article->published_at->format('F d, Y') : 'Recently' }}</div>
                <div><i class="bi bi-eye"></i> {{ $article->views ?? 0 }} views</div>
                @if($article->author)
                    <div><i class="bi bi-person"></i> {{ $article->author->name }}</div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="article-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <article data-aos="fade-up">
                    <!-- Article Featured Image -->
                    @php
                        $images = is_string($article->featured_image) 
                            ? json_decode($article->featured_image, true) 
                            : (is_array($article->featured_image) ? $article->featured_image : []);
                        $mainImage = !empty($images) ? $images[0] : null;
                    @endphp
                    
                    @if($mainImage)
                        <div class="article-hero-image mb-4">
                            <img 
                                src="{{ asset('storage/' . $mainImage) }}" 
                                alt="{{ $article->title }}" 
                                class="img-fluid rounded-3 shadow-sm"
                                loading="lazy"
                            >
                        </div>
                    @endif
                    
                    <!-- Article Content -->
                    <div class="article-body content-format">
                        {!! $article->content !!}
                    </div>
                    
                    <!-- Article Actions -->
                    <div class="article-actions mt-5 pt-4 border-top">
                        <div class="d-flex gap-3 align-items-center">
                            <button onclick="markHelpful()" class="btn btn-outline-primary d-flex align-items-center gap-2" id="helpful-btn">
                                <i class="bi bi-hand-thumbs-up"></i> 
                                <span id="helpful-text">Helpful</span>
                            </button>
                            <button onclick="shareArticle()" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                                <i class="bi bi-share"></i> 
                                Share
                            </button>
                        </div>
                    </div>
                </article>
            </div>
            
            <div class="col-lg-4">
                <!-- Latest Articles -->
                @if(isset($latestArticles) && $latestArticles->isNotEmpty())
                    <div class="sidebar-card" data-aos="fade-up" data-aos-delay="100">
                        <h5 class="sidebar-title">Latest Articles</h5>
                        @foreach($latestArticles as $latest)
                            <div class="sidebar-article">
                                <h6>
                                    <a href="{{ route('articles.show', $latest->slug) }}">
                                        {{ Str::limit($latest->title, 60) }}
                                    </a>
                                </h6>
                                <small>{{ $latest->published_at ? $latest->published_at->format('M d, Y') : 'Recently' }}</small>
                            </div>
                        @endforeach
                    </div>
                @endif
                
                <!-- Related Articles -->
                @if(isset($relatedArticles) && $relatedArticles->isNotEmpty())
                    <div class="sidebar-card" data-aos="fade-up" data-aos-delay="200">
                        <h5 class="sidebar-title">Related Articles</h5>
                        @foreach($relatedArticles as $related)
                            <div class="sidebar-article">
                                <h6>
                                    <a href="{{ route('articles.show', $related->slug) }}">
                                        {{ Str::limit($related->title, 60) }}
                                    </a>
                                </h6>
                                <small>{{ $related->published_at ? $related->published_at->format('M d, Y') : 'Recently' }}</small>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div data-aos="fade-up">
            <h2 class="cta-title">Ready to Learn More?</h2>
            <p class="cta-description">Explore our collection of traditional Ethiopian medicine books and remedies.</p>
            <div class="cta-buttons">
                <a href="{{ route('books.index') }}" class="btn-cta">
                    <i class="bi bi-book"></i> Browse Books
                </a>
                <a href="{{ route('consultation.index') }}" class="btn-cta btn-cta-outline">
                    <i class="bi bi-chat-dots"></i> Get Consultation
                </a>
            </div>
        </div>
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

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('.navbar');
        if (window.scrollY > 100) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });

    // Helpful functionality
    function markHelpful() {
        const btn = document.getElementById('helpful-btn');
        const text = document.getElementById('helpful-text');
        
        if (btn.classList.contains('active')) {
            btn.classList.remove('active');
            text.textContent = 'Helpful';
        } else {
            btn.classList.add('active');
            text.textContent = 'Helped!';
        }
    }

    // Share functionality
    function shareArticle() {
        const url = window.location.href;
        const title = document.querySelector('h1').textContent;
        
        if (navigator.share) {
            navigator.share({
                title: title,
                url: url
            });
        } else {
            navigator.clipboard.writeText(url).then(() => {
                const shareBtn = event.target.closest('button');
                const originalHTML = shareBtn.innerHTML;
                shareBtn.innerHTML = '<i class="bi bi-check"></i> Copied!';
                setTimeout(() => {
                    shareBtn.innerHTML = originalHTML;
                }, 2000);
            });
        }
    }
</script>

</body>
</html>
