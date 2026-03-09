<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>HerbMed Ethiopia – Ancient Wisdom, Modern Healing</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Premium Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary: #042f2e;      /* Deep Emerald */
            --accent: #92400e;       /* Burnished Amber */
            --soft-cream: #fbfaf7;   /* Luxury Paper White */
            --glass: rgba(255, 255, 255, 0.85);
            --transition: all 0.5s cubic-bezier(0.16, 1, 0.3, 1);
        }

        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: var(--soft-cream);
            color: #1a1a1a;
            overflow-x: hidden;
        }

        h1, h2, h3, .serif { font-family: 'Playfair Display', serif; }
        .cinzel { font-family: 'Cinzel', serif; letter-spacing: 2px; }

        /* --- World Class Navigation --- */
        .navbar {
            backdrop-filter: blur(15px);
            background: var(--glass);
            padding: 1rem 0;
            transition: var(--transition);
            border-bottom: 1px solid rgba(0,0,0,0.03);
        }
        .navbar.scrolled { padding: 0.6rem 0; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .nav-link { 
            font-weight: 500; 
            font-size: 0.85rem; 
            letter-spacing: 1px; 
            color: var(--primary) !important;
            margin: 0 10px;
            position: relative;
        }
        .nav-link::after {
            content: ''; position: absolute; bottom: 0; left: 50%; width: 0; height: 1.5px;
            background: var(--accent); transition: var(--transition); transform: translateX(-50%);
        }
        .nav-link:hover::after { width: 100%; }

        /* --- Cinematic Hero --- */
        .hero {
            height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            background: #000;
            clip-path: polygon(0 0, 100% 0, 100% 95%, 0 100%);
        }
        .hero-video {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            object-fit: cover;
            opacity: 0.5;
            filter: grayscale(30%);
        }
        .hero-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: linear-gradient(180deg, rgba(4,47,46,0.4) 0%, rgba(0,0,0,0.8) 100%);
        }
        .hero-content { position: relative; z-index: 10; color: white; }

        /* --- Search Bar Upgrade --- */
        .search-glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 100px;
            padding: 8px;
            max-width: 800px;
            margin: 0 auto;
            transition: var(--transition);
        }
        .search-glass:focus-within { background: white; width: 850px; }
        .search-glass input {
            background: transparent; border: none; color: rgba(255, 255, 255, 0.9); padding: 15px 30px; font-size: 1.1rem;
        }
        .search-glass input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .search-glass:focus-within input { color: var(--primary); }
        .search-glass:focus-within input::placeholder { color: rgba(4, 47, 46, 0.6); }
        .btn-luxury {
            background: var(--accent); color: white; border-radius: 100px;
            padding: 15px 45px; font-weight: 600; border: none;
            transition: var(--transition);
        }
        .btn-luxury:hover { transform: scale(1.05); box-shadow: 0 10px 20px rgba(146, 64, 14, 0.3); }

        /* --- Premium Product Cards --- */
        .product-card {
            background: transparent;
            border: none;
            transition: var(--transition);
            margin-bottom: 2rem;
        }
        .product-img-wrapper {
            background: #f0f0f0;
            aspect-ratio: 3/4;
            overflow: hidden;
            position: relative;
            border-radius: 4px;
        }
        .product-img-wrapper img {
            width: 100%; height: 100%; object-fit: cover;
            transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .product-card:hover .product-img-wrapper img { transform: scale(1.08); }
        
        /* Floating Action Icons */
        .card-actions {
            position: absolute; bottom: 20px; left: 50%; transform: translate(-50%, 20px);
            opacity: 0; transition: var(--transition); display: flex; gap: 10px;
        }
        .product-card:hover .card-actions { opacity: 1; transform: translate(-50%, 0); }
        .action-btn {
            width: 45px; height: 45px; border-radius: 50%; background: white;
            display: flex; align-items: center; justify-content: center; color: var(--primary);
            text-decoration: none; box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* --- Book Section Specialty --- */
        .book-section { background: #111811; color: white; padding: 100px 0; }
        .book-cover {
            box-shadow: 20px 20px 60px rgba(0,0,0,0.5);
            transition: var(--transition);
            border-left: 5px solid rgba(255,255,255,0.1);
        }
        .book-cover:hover { transform: rotateY(-10deg) scale(1.02); }

        /* --- Trust Badges --- */
        .trust-icon-box {
            padding: 40px; border-right: 1px solid rgba(0,0,0,0.05); transition: var(--transition);
        }
        .trust-icon-box:hover { background: white; transform: translateY(-5px); }

        /* --- Footer --- */
        footer { background: #051a14; color: rgba(255,255,255,0.7); }
        .footer-logo { font-family: 'Cinzel', serif; font-size: 1.8rem; color: white; letter-spacing: 4px; }

    </style>
</head>
<body>

<!-- Animated Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold cinzel" href="#">HERBMED<span style="color:var(--accent)">.</span>ET</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="#">REMEDIES</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('articles.index') }}">LITERATURE</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('consultation.index') }}">CONSULTATION</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">BOOKS</a></li>
            </ul>
            <div class="d-flex align-items-center gap-4">
                <a href="#" class="text-dark position-relative"><i class="bi bi-cart3 fs-5"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-accent">2</span></a>
                <a href="{{ route('login') }}" class="btn btn-dark btn-sm rounded-pill px-4">Account</a>
            </div>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <video class="hero-video" autoplay muted loop playsinline>
        <source src="https://assets.mixkit.co/videos/preview/mixkit-herbalist-hand-pouring-dry-tea-leaves-40153-large.mp4" type="video/mp4">
    </video>
    <div class="hero-overlay"></div>
    <div class="container hero-content text-center">
        <div data-aos="fade-up" data-aos-duration="1000">
            <span class="text-uppercase small fw-bold mb-3 d-block" style="letter-spacing: 5px; color: var(--accent);">Ethically Sourced • Ancestral Wisdom</span>
            <h1 class="display-2 mb-4">Healing for the <br><span class="fst-italic">Modern Soul</span></h1>
            <p class="lead fs-4 mb-5 opacity-75 mx-auto" style="max-width: 650px;">Direct from the lush highlands of Ethiopia, we bring you clinical-grade traditional remedies.</p>

            <div class="search-glass" data-aos="zoom-in" data-aos-delay="400">
                <form class="d-flex align-items-center" action="{{ route('products.search') }}" method="GET">
                    <input type="text" name="q" class="form-control" placeholder="Search for 'Tena Adam' or 'Respiratory'..." value="{{ request('q') }}">
                    <button type="submit" class="btn btn-luxury shadow">DISCOVER</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Latest Articles Section -->
@if($latestArticles->isNotEmpty())
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5" data-aos="fade-right">
            <div>
                <h2 class="display-4 mb-0">Knowledge & Wisdom</h2>
                <p class="text-muted">Latest insights on traditional Ethiopian medicine.</p>
            </div>
            <a href="#" class="btn btn-link text-dark text-decoration-none fw-bold">VIEW ALL <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="row g-4">
            @foreach($latestArticles->take(3) as $article)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="card border-0 shadow-sm h-100">
                        @if($article->featured_image)
                            <img src="{{ asset('storage/' . $article->featured_image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="bi bi-journal-text fs-1 text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body p-4">
                            <div class="mb-2">
                                <small class="text-muted">{{ $article->published_at ? $article->published_at->format('M d, Y') : 'Recently' }}</small>
                            </div>
                            <h5 class="card-title mb-3">{{ Str::limit($article->title, 60) }}</h5>
                            <p class="card-text text-muted">{{ Str::limit(strip_tags($article->content), 120) }}</p>
                            <a href="#" class="btn btn-outline-dark btn-sm rounded-0">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Trust Badges -->
<section class="py-5">
    <div class="container">
        <div class="row g-0">
            <div class="col-6 col-md-3 trust-icon-box text-center" data-aos="fade-up" data-aos-delay="100">
                <i class="bi bi-flower1 fs-1 mb-3 text-success"></i>
                <h6 class="fw-bold">Wild Harvested</h6>
            </div>
            <div class="col-6 col-md-3 trust-icon-box text-center" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-shield-check fs-1 mb-3 text-success"></i>
                <h6 class="fw-bold">Lab Tested</h6>
            </div>
            <div class="col-6 col-md-3 trust-icon-box text-center" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-droplet fs-1 mb-3 text-success"></i>
                <h6 class="fw-bold">Pure Potency</h6>
            </div>
            <div class="col-6 col-md-3 trust-icon-box text-center" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-truck fs-1 mb-3 text-success"></i>
                <h6 class="fw-bold">Global Shipping</h6>
            </div>
        </div>
    </div>
</section>

<!-- Featured Remedies -->
<section class="py-5 mt-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5" data-aos="fade-right">
            <div>
                <h2 class="display-4 mb-0">The Apothecary</h2>
                <p class="text-muted">Masterfully prepared herbal extractions.</p>
            </div>
            <a href="#" class="btn btn-link text-dark text-decoration-none fw-bold">BROWSE ALL <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row g-4">
            @forelse ($featuredPlants as $plant)
                <div class="col-md-6 col-lg-3" data-aos="fade-up">
                    <div class="product-card">
                        <div class="product-img-wrapper">
                            @if($plant->image)
                                <img src="{{ asset('storage/' . $plant->image) }}" alt="{{ $plant->name }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1615485242221-39656461c360?auto=format&fit=crop&w=800&q=80" alt="{{ $plant->name }}">
                            @endif
                            <div class="card-actions">
                                <a href="#" class="action-btn"><i class="bi bi-heart"></i></a>
                                <a href="#" class="action-btn"><i class="bi bi-eye"></i></a>
                            </div>
                        </div>
                        <div class="pt-3 text-center">
                            <span class="text-uppercase text-muted tiny fw-bold" style="font-size: 0.65rem; letter-spacing: 2px;">{{ $plant->region ?? 'Ethiopia' }}</span>
                            <h5 class="serif mt-1 mb-0">{{ $plant->name }}</h5>
                            @if($plant->scientific_name)
                                <small class="text-muted fst-italic">{{ $plant->scientific_name }}</small>
                            @endif
                            <p class="text-accent fw-bold small">{{ $plant->local_name ?? 'Traditional Herb' }}</p>
                            <button class="btn btn-outline-dark btn-sm rounded-0 w-100 contact-btn" data-phone="{{ $owner_phone ?? '+251911XXXXXX' }}">RESERVE NOW</button>
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

<!-- Dedicated Books Section -->
<section class="book-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <h6 class="text-accent mb-3 text-uppercase fw-bold" style="letter-spacing: 3px;">The Literature</h6>
                <h2 class="display-3 mb-4 serif">Knowledge is the <br>First Remedy</h2>
                <p class="opacity-75 mb-5 lead">Our curated collection of ancient Ge'ez manuscripts and modern botanical studies provide the foundation for true holistic health.</p>
                <div class="d-flex gap-4">
                    <div class="text-center">
                        <h2 class="serif mb-0">{{ $featuredBooks->count() }}+</h2>
                        <small class="opacity-50 text-uppercase">Books</small>
                    </div>
                    <div class="vr opacity-25"></div>
                    <div class="text-center">
                        <h2 class="serif mb-0">{{ $featuredPlants->count() }}</h2>
                        <small class="opacity-50 text-uppercase">Herbs</small>
                    </div>
                </div>
                <button class="btn btn-luxury mt-5 px-5">EXPLORE THE LIBRARY</button>
            </div>
            <div class="col-lg-6 offset-lg-1" data-aos="zoom-in-left">
                <div class="row g-4">
                    @forelse ($featuredBooks->take(3) as $book)
                        <div class="col-6">
                            @if($book->cover)
                                <img src="{{ asset('storage/' . $book->cover) }}" class="img-fluid book-cover mb-4" alt="{{ $book->title }}">
                            @else
                                <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=800&q=80" class="img-fluid book-cover mb-4" alt="{{ $book->title }}">
                            @endif
                        </div>
                    @empty
                        <div class="col-6">
                            <img src="https://images.unsplash.com/photo-1544947950-fa07a98d237f?auto=format&fit=crop&w=800&q=80" class="img-fluid book-cover mb-4" alt="Traditional Medicine Book">
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
@if($testimonials && count($testimonials) > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-4 mb-3">What Our Community Says</h2>
            <p class="text-muted">Real experiences from real people</p>
        </div>
        <div class="row g-4">
            @foreach($testimonials as $testimonial)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="bi bi-star{{ $i <= ($testimonial['rating'] ?? 5) ? '-fill' : '' }} text-warning"></i>
                                @endfor
                            </div>
                            <blockquote class="mb-3">"{{ $testimonial['content'] }}"</blockquote>
                            <footer class="d-flex align-items-center">
                                <div class="ms-3">
                                    <strong class="d-block">{{ $testimonial['author'] }}</strong>
                                    <small class="text-muted">{{ $testimonial['location'] }}</small>
                                </div>
                            </footer>
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
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-4 mb-3">Current Offers</h2>
            <p class="text-muted">Special promotions on selected items</p>
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
<footer class="py-5 mt-auto">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-4">
                <div class="footer-logo mb-4">HERBMED</div>
                <p class="small opacity-50">Reviving the heritage of Ethiopian medicinal plants through science and storytelling. Authentically sourced from local healers.</p>
                @if($socialAccounts->isNotEmpty())
                    <div class="d-flex gap-3 fs-5 mt-4">
                        @foreach($socialAccounts as $account)
                            <a href="{{ $account->url }}" target="_blank" class="text-reset">
                                <i class="bi bi-{{ $account->platform }}"></i>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="d-flex gap-3 fs-5 mt-4">
                        <i class="bi bi-instagram"></i>
                        <i class="bi bi-facebook"></i>
                        <i class="bi bi-youtube"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-2 offset-md-1">
                <h6 class="text-white mb-4">SHOP</h6>
                <ul class="list-unstyled small d-grid gap-2">
                    <li><a href="#" class="text-decoration-none text-reset">Herbal Extracts</a></li>
                    <li><a href="#" class="text-decoration-none text-reset">Dry Roots</a></li>
                    <li><a href="#" class="text-decoration-none text-reset">Ancient Books</a></li>
                </ul>
            </div>
            <div class="col-md-5">
                <h6 class="text-white mb-4">WEEKLY WISDOM</h6>
                <p class="small opacity-50">Subscribe to receive guides on seasonal remedies.</p>
                <div class="input-group mb-3 glass-input">
                    <input type="text" class="form-control bg-transparent border-secondary text-white" placeholder="Email Address">
                    <button class="btn btn-accent px-4 bg-white text-dark fw-bold">JOIN</button>
                </div>
            </div>
        </div>
        <hr class="my-5 opacity-10">
        <div class="text-center small opacity-50">
            © 2026 HERBMED ETHIOPIA. ALL RIGHTS RESERVED.
        </div>
    </div>
</footer>

<!-- JS Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    // Initialize Animations
    AOS.init({
        duration: 1000,
        once: true,
        easing: 'ease-in-out'
    });

    // Navbar Scroll Effect
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            document.querySelector('.navbar').classList.add('scrolled');
        } else {
            document.querySelector('.navbar').classList.remove('scrolled');
        }
    });

    // Luxury Contact Interaction
    document.querySelectorAll('.contact-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const phone = this.getAttribute('data-phone');
            this.innerHTML = `<i class="bi bi-whatsapp me-2"></i> ${phone}`;
            this.classList.replace('btn-outline-dark', 'btn-success');
        });
    });

    // Copy Promo Code Function
    function copyPromoCode(code) {
        navigator.clipboard.writeText(code).then(function() {
            // Show success message
            const toast = document.createElement('div');
            toast.className = 'position-fixed top-0 end-0 p-3';
            toast.style.zIndex = '9999';
            toast.innerHTML = `
                <div class="toast show" role="alert">
                    <div class="toast-body">
                        Promo code "${code}" copied to clipboard!
                    </div>
                </div>
            `;
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        });
    }
</script>

</body>
</html>