<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $book->title }}{{ __('messages.page_title_suffix') }}</title>

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

        /* Book Hero */
        .book-hero {
            padding: 140px 0 60px;
            background: linear-gradient(135deg, var(--primary) 0%, #2a1f02 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .book-hero::before {
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

        .book-hero .container {
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
            color: var(--primary-light) !important;
            font-weight: 500;
        }

        .book-title {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: white;
        }

        .book-meta {
            display: flex;
            align-items: center;
            gap: 2rem;
            color: rgba(255,255,255,0.8);
            font-size: 0.9rem;
        }

        .book-meta i {
            color: var(--primary-light);
            margin-right: 0.5rem;
        }

        /* Book Content */
        .book-content-section {
            padding: 80px 0;
            background: #ffffff;
        }

        .book-gallery {
            margin-bottom: 2rem;
        }

        .main-image-container {
            width: 100%;
            height: 550px;
            margin-bottom: 1.5rem;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            border: 1px solid rgba(0,0,0,0.05);
        }

        .main-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .main-image:hover {
            transform: scale(1.02);
        }

        .thumbnail-container {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            padding: 10px 0;
            scrollbar-width: thin;
        }

        .thumbnail-container::-webkit-scrollbar {
            height: 6px;
        }

        .thumbnail-container::-webkit-scrollbar-thumb {
            background: rgba(0,0,0,0.1);
            border-radius: 10px;
        }

        .thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.2s ease;
            flex-shrink: 0;
        }

        .thumbnail:hover {
            opacity: 0.8;
        }

        .thumbnail.active {
            border-color: var(--primary-light);
            box-shadow: 0 0 10px rgba(255, 202, 8, 0.3);
        }

        .book-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 15px;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
        }

        .book-price-section {
            background: var(--white);
            border: 1px solid rgba(0,0,0,0.05);
            border-radius: 24px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-md);
        }

        .price-tag {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        /* Book Description */
        .book-description {
            background: var(--white);
            border: 1px solid rgba(0,0,0,0.05);
            border-radius: 24px;
            padding: 2.5rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow-md);
        }

        .book-description h2 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.5rem;
        }

        .book-description p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
        }

        .book-details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .detail-item {
            background: #f9f9f9;
            padding: 1rem;
            border-radius: 10px;
        }

        .detail-item strong {
            color: var(--primary);
            display: block;
            margin-bottom: 0.3rem;
            font-size: 0.9rem;
            text-transform: uppercase;
        }

        .detail-item span {
            color: var(--text-dark);
            font-weight: 500;
        }

        .info-icon {
            color: var(--primary-light);
            margin-right: 0.5rem;
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

        .sidebar-book {
            padding: 1rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .sidebar-book:last-child {
            border-bottom: none;
        }

        .sidebar-book h6 {
            margin-bottom: 0.5rem;
        }

        .sidebar-book h6 a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            line-height: 1.3;
        }

        .sidebar-book h6 a:hover {
            color: var(--primary-light);
        }

        .sidebar-book small {
            color: var(--text-light);
            font-size: 0.8rem;
        }

        .sidebar-book .price {
            color: var(--primary);
            font-weight: 700;
            font-size: 0.9rem;
        }

        /* Sidebar Title (Related Books) */
        .sidebar-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
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
            color: white;
            background: rgba(255,255,255,0.1);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            text-decoration: none;
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

        .newsletter-message {
            margin-top: 1rem;
            font-size: 0.9rem;
            border-radius: 10px;
            padding: 10px 15px;
            display: none;
        }

        .newsletter-message.success {
            display: block;
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
            border: 1px solid #28a745;
        }



        .newsletter-message.error {
            display: block;
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid #dc3545;
        }

        .footer-bottom {
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            text-align: center;
            color: rgba(255,255,255,0.4);
            font-size: 0.8rem;
            letter-spacing: 2px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .book-title {
                font-size: 1.8rem;
            }
            
            .book-meta {
                flex-direction: column;
                gap: 1rem;
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
            
            .book-details-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body id="home" class="pt-5">

<!-- Navigation -->
<x-navigation />


<!-- Book Hero -->
<section class="book-hero">
    <div class="container">
        <nav aria-label="breadcrumb" data-aos="fade-up">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome') }}">{{ __('messages.breadcrumb_home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('books.index') }}">{{ __('messages.breadcrumb_books') }}</a></li>
                <li class="breadcrumb-item active">{{ Str::limit($book->title, 40) }}</li>
            </ol>
        </nav>
        
        <div data-aos="fade-up">
            <h1 class="book-title">{{ $book->title }}</h1>
            <div class="book-meta">
                <div><i class="bi bi-tag"></i> {{ ucfirst($book->type) }}</div>
                <div>
                    <i class="bi bi-currency-dollar"></i>
                    @if($book->price && $book->price > 0)
                        {{ number_format($book->price, 2) }} ETB
                    @else
                        {{ __('messages.free') }}
                    @endif
                </div>
                @if($book->stock !== null)
                    <div><i class="bi bi-box"></i> {{ $book->stock > 0 ? $book->stock . ' ' . __('messages.stock_available') : __('messages.out_of_stock') }}</div>
                @else
                    <div><i class="bi bi-download"></i> {{ __('messages.digital_download') }}</div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Book Content -->
<section class="book-content-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div data-aos="fade-up">
                    @php
                        $coverPaths = [];
                        $coverData = $book->cover;
                        
                        // Handle double encoding if it exists
                        if (is_string($coverData) && str_starts_with($coverData, '[')) {
                            $coverData = json_decode($coverData, true);
                        }
                        
                        if (is_array($coverData)) {
                            $coverPaths = array_filter($coverData); // Remove empty strings
                        } elseif (is_string($coverData) && !empty($coverData)) {
                            $coverPaths = [$coverData];
                        }
                    @endphp

                    <div class="book-gallery">
                        @if(count($coverPaths) > 0)
                            <div class="main-image-container">
                                <img src="{{ asset('storage/' . $coverPaths[0]) }}" class="main-image" id="mainBookImage" alt="{{ $book->title }}">
                            </div>
                            
                            @if(count($coverPaths) > 1)
                                <div class="thumbnail-container">
                                    @foreach($coverPaths as $path)
                                        <img src="{{ asset('storage/' . $path) }}" 
                                             class="thumbnail {{ $loop->first ? 'active' : '' }}" 
                                             alt="{{ $book->title }} - Cover {{ $loop->iteration }}">
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <div class="main-image-container bg-light d-flex align-items-center justify-content-center">
                                <i class="bi bi-book fs-1 text-muted"></i>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Price & Actions -->
                    <div class="book-price-section">
                        <div class="price-tag">
                            @if($book->price && $book->price > 0)
                                {{ number_format($book->price, 2) }} ETB
                            @else
                                {{ __('messages.free') }}
                            @endif
                        </div>
                        
                        @if($book->stock !== null)
                            <div class="mb-3">
                                <span class="badge-custom">
                                    <i class="bi bi-box"></i> {{ $book->stock }} {{ __('messages.copies_available') }}
                                </span>
                            </div>
                        @else
                            <div class="mb-3">
                                <span class="badge-custom">
                                    <i class="bi bi-download"></i> {{ __('messages.download_now') }}
                                </span>
                            </div>
                        @endif
                        
                        <div class="d-grid gap-2">
                            <button class="btn-reserve contact-btn" data-phone="{{ $owner_phone ?? '+251 91 163 1253' }}">
                                <i class="bi bi-whatsapp"></i> {{ __('messages.order_now') }}
                            </button>
                            
                            @if($book->type === 'digital' || $book->file)
                                <button class="btn-reserve" style="background: var(--white); color: var(--primary); border: 2px solid var(--primary);" onclick="downloadBook()">
                                    <i class="bi bi-download"></i> {{ __('messages.download_now') }}
                                </button>
                            @endif
                        </div>
                        
                        <div class="mt-4 text-center">
                            <small class="text-muted">
                                <i class="bi bi-shield-check" style="color: var(--primary-light);"></i> {{ __('messages.secure_payment') }} • {{ __('messages.feature5_title') }}
                            </small>
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-lg-7">
                <div data-aos="fade-up" data-aos-delay="100">
                    <!-- Book Description -->
                    <div class="book-description">
                        <h2>{{ __('messages.about_book') }}</h2>
                        <div class="content-format">
                            <p class="lead">{{ $book->description }}</p>
                        </div>
                        
                        <!-- Book Details -->
                        <h2 class="mt-4">{{ __('messages.book_content') }}</h2>
                        <div class="book-details-grid">
                            <div class="detail-item">
                                <strong>{{ __('messages.book_type') }}</strong>
                                <span>{{ ucfirst($book->type) }}</span>
                            </div>
                            <div class="detail-item">
                                <strong>{{ __('messages.format') }}</strong>
                                <span>{{ $book->type === 'digital' ? __('messages.pdf_download') : __('messages.physical_copy') }}</span>
                            </div>
                            @if($book->stock !== null)
                                <div class="detail-item">
                                    <strong>{{ __('messages.book_quantity') }}</strong>
                                    <span>{{ $book->stock > 0 ? __('messages.in_stock') : __('messages.out_of_stock') }}</span>
                                </div>
                            @endif
                            @if($book->pages)
                                <div class="detail-item">
                                    <strong>{{ __('messages.page') }}</strong>
                                    <span>{{ $book->pages }}</span>
                                </div>
                            @endif
                            @if($book->language)
                                <div class="detail-item">
                                    <strong>{{ __('messages.language') }}</strong>
                                    <span>{{ $book->language }}</span>
                                </div>
                            @endif
                            @if($book->isbn)
                                <div class="detail-item">
                                    <strong>ISBN</strong>
                                    <span>{{ $book->isbn }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Comments Section -->
                    <x-comments :model="$book" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Books -->
@if(isset($relatedBooks) && $relatedBooks->isNotEmpty())
<section class="book-content-section" style="padding-top: 0;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div data-aos="fade-up">
                    <h2 class="sidebar-title text-center mb-5" style="font-size: 2rem;">{{ __('messages.related_books') }}</h2>
                </div>
            </div>
            
            @foreach($relatedBooks as $related)
                <div class="col-md-6 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <x-book-card :book="$related" :ownerPhone="$owner_phone ?? '+251 91 163 1253'" />
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div data-aos="fade-up">
            <h2 class="cta-title">{{ __('messages.need_consultation') }}</h2>
            <p class="cta-description">{{ __('messages.consultation_desc') }}</p>
            <div class="cta-buttons">
                <a href="{{ route('consultation.index') }}" class="btn-reserve">
                    <i class="bi bi-chat-dots"></i> {{ __('messages.consultation_service') }}
                </a>
                <a href="{{ route('articles.index') }}" class="btn-cta btn-cta-outline">
                    <i class="bi bi-journal-text"></i> {{ __('messages.view_articles') }}
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
@include('components.footer')

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

    // Image gallery functionality
    const mainImage = document.getElementById('mainBookImage');
    const thumbnails = document.querySelectorAll('.thumbnail');
    
    if (mainImage && thumbnails.length > 0) {
        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                // Update main image source
                mainImage.src = this.src;
                
                // Update active state
                thumbnails.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            });
        });
    }

    // Contact button interaction
    document.querySelectorAll('.contact-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const phone = this.getAttribute('data-phone');
            
            // Show phone number on button
            this.innerHTML = `<i class="bi bi-telephone-fill"></i> ${phone}`;
            this.classList.remove('btn-reserve');
            this.classList.add('btn-success');
            this.style.background = '#28a745';
            this.style.color = 'white';
            this.style.boxShadow = '0 8px 20px rgba(40, 167, 69, 0.3)';
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

    // Add to cart functionality
    async function addToCart() {
        try {
            const response = await fetch(`/books/{{ $book->id }}/cart`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                // Update cart count
                const cartCount = document.querySelector('.btn-cart span');
                const currentCount = parseInt(cartCount.textContent);
                cartCount.textContent = currentCount + 1;
                
                // Show success message (you can enhance this with a toast notification)
                alert('Book added to cart successfully!');
            }
        } catch (error) {
            console.error('Error adding to cart:', error);
        }
    }

    // Download book functionality
    async function downloadBook() {
        try {
            const response = await fetch(`/books/{{ $book->id }}/download`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            
            const data = await response.json();
            
            if (data.success && data.url) {
                window.location.href = data.url;
            } else {
                // If not purchased yet, redirect to checkout
                window.location.href = `/books/{{ $book->id }}/checkout`;
            }
        } catch (error) {
            console.error('Error downloading book:', error);
        }
    }

    // Newsletter subscription
    const newsletterForm = document.getElementById('newsletterForm');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const submitBtn = form.querySelector('button');
            const messageDiv = document.getElementById('newsletterMessage');
            const email = form.querySelector('input[name="email"]').value;
            
            // Get CSRF token safely
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
            
            if (!csrfToken) {
                messageDiv.textContent = 'Security token not found. Please refresh the page.';
                messageDiv.className = 'newsletter-message error';
                return;
            }
            
            // Validate email
            if (!email || !email.includes('@')) {
                messageDiv.textContent = 'Please enter a valid email address.';
                messageDiv.className = 'newsletter-message error';
                return;
            }
            
            // Disable button and show loading
            submitBtn.disabled = true;
            submitBtn.textContent = 'JOINING...';
            
            // Send request
            fetch('{{ route("newsletter.subscribe") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({
                    email: email
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    messageDiv.textContent = data.message;
                    messageDiv.className = 'newsletter-message success';
                    form.reset();
                } else {
                    messageDiv.textContent = data.message;
                    messageDiv.className = 'newsletter-message error';
                }
            })
            .catch(error => {
                console.error('Newsletter subscription error:', error);
                messageDiv.textContent = 'Something went wrong. Please try again.';
                messageDiv.className = 'newsletter-message error';
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.textContent = 'JOIN';
                
                // Hide message after 5 seconds
                setTimeout(() => {
                    messageDiv.textContent = '';
                    messageDiv.className = 'newsletter-message';
                }, 5000);
            });
        });
    }
</script>

</body>
</html>