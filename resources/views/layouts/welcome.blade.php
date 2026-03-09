<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'HerbMed Ethiopia – Ancient Wisdom, Modern Healing')</title>

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

        /* --- Buttons --- */
        .btn-luxury {
            background: var(--accent); color: white; border-radius: 100px;
            padding: 15px 45px; font-weight: 600; border: none;
            transition: var(--transition);
        }
        .btn-luxury:hover { transform: scale(1.05); box-shadow: 0 10px 20px rgba(146, 64, 14, 0.3); }

        /* --- Cards --- */
        .card {
            background: transparent;
            border: none;
            transition: var(--transition);
            margin-bottom: 2rem;
        }
        .card:hover { transform: translateY(-5px); }

        /* --- Footer --- */
        footer { background: #051a14; color: rgba(255,255,255,0.7); }
        .footer-logo { font-family: 'Cinzel', serif; font-size: 1.8rem; color: white; letter-spacing: 4px; }

    </style>
</head>
<body>

<!-- Animated Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold cinzel" href="{{ route('welcome') }}">HERBMED<span style="color:var(--accent)">.</span>ET</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="#">REMEDIES</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}" href="{{ route('articles.index') }}">LITERATURE</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('consultation.*') ? 'active' : '' }}" href="{{ route('consultation.index') }}">CONSULTATION</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">BOOKS</a></li>
            </ul>
            <div class="d-flex align-items-center gap-4">
                <a href="#" class="text-dark position-relative"><i class="bi bi-cart3 fs-5"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-accent">2</span></a>
                <a href="{{ route('login') }}" class="btn btn-dark btn-sm rounded-pill px-4">Account</a>
            </div>
        </div>
    </div>
</nav>

@yield('content')

<!-- Footer -->
<footer class="py-5 mt-auto">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-md-4">
                <div class="footer-logo mb-4">HERBMED</div>
                <p class="small opacity-50">Reviving the heritage of Ethiopian medicinal plants through science and storytelling. Authentically sourced from local healers.</p>
                <div class="d-flex gap-3 fs-5 mt-4">
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-facebook"></i>
                    <i class="bi bi-youtube"></i>
                </div>
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
</script>

@yield('scripts')

</body>
</html>
