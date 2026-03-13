<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $article->title }} - Ethiopian Traditional Medicine</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">    <!-- Custom Shared Styles -->
    <link rel="stylesheet" href="{{ asset('css/global.css') }}?v={{ filemtime(public_path('css/global.css')) }}">

    <style>
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

        .main-image-container {
            width: 100%;
            height: 450px;
            margin-bottom: 1rem;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
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
<body class="pt-5">

<!-- Navigation -->
<x-navigation />

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
                        $articleImages = is_string($article->featured_image) 
                            ? json_decode($article->featured_image, true) 
                            : (is_array($article->featured_image) ? $article->featured_image : []);
                        
                        // Filter out empty strings
                        $articleImages = array_filter($articleImages);
                    @endphp
                    
                    @if(!empty($articleImages))
                        <div class="article-gallery mb-4">
                            <div class="main-image-container">
                                <img src="{{ asset('storage/' . $articleImages[0]) }}" class="main-image" id="mainArticleImage" alt="{{ $article->title }}">
                            </div>
                            
                            @if(count($articleImages) > 1)
                                <div class="thumbnail-container">
                                    @foreach($articleImages as $index => $path)
                                        <img src="{{ asset('storage/' . $path) }}" 
                                             class="thumbnail {{ $index === 0 ? 'active' : '' }}" 
                                             alt="{{ $article->title }} - Image {{ $index + 1 }}">
                                    @endforeach
                                </div>
                            @endif
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
                                <span class="badge bg-primary" id="helpful-count">{{ $article->helpfulCount() }}</span>
                            </button>
                            <button onclick="showShareModal()" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                                <i class="bi bi-share"></i> 
                                Share
                                <span class="badge bg-secondary" id="share-count">{{ $article->shareCount() }}</span>
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

<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel">Share this Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-grid gap-2">
                    <a href="#" onclick="shareOnFacebook()" class="btn btn-primary d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-facebook"></i> Share on Facebook
                    </a>
                    <a href="#" onclick="shareOnTwitter()" class="btn btn-info d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-twitter"></i> Share on Twitter
                    </a>
                    <a href="#" onclick="shareOnLinkedIn()" class="btn btn-primary d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-linkedin"></i> Share on LinkedIn
                    </a>
                    <a href="#" onclick="shareOnWhatsApp()" class="btn btn-success d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-whatsapp"></i> Share on WhatsApp
                    </a>
                    <a href="#" onclick="shareViaEmail()" class="btn btn-secondary d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-envelope"></i> Share via Email
                    </a>
                    <button onclick="copyLink()" class="btn btn-outline-dark d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-link-45deg"></i> Copy Link
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

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

    // Image gallery functionality
    const mainImage = document.getElementById('mainArticleImage');
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

    // Helpful functionality
    async function markHelpful() {
        const btn = document.getElementById('helpful-btn');
        const text = document.getElementById('helpful-text');
        const count = document.getElementById('helpful-count');
        
        try {
            const response = await fetch(`/articles/{{ $article->id }}/helpful`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            
            const data = await response.json();
            
            if (data.success) {
                if (data.action === 'added') {
                    btn.classList.add('active', 'btn-primary');
                    btn.classList.remove('btn-outline-primary');
                    text.textContent = 'Helped!';
                } else {
                    btn.classList.remove('active', 'btn-primary');
                    btn.classList.add('btn-outline-primary');
                    text.textContent = 'Helpful';
                }
                count.textContent = data.count;
            }
        } catch (error) {
            console.error('Error marking helpful:', error);
        }
    }

    // Share functionality
    let shareModal;

    function showShareModal() {
        if (!shareModal) {
            shareModal = new bootstrap.Modal(document.getElementById('shareModal'));
        }
        shareModal.show();
    }

    async function recordShareAndOpen(url) {
        try {
            // Record share in database
            await fetch(`/articles/{{ $article->id }}/share`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            
            // Update share count
            const shareCount = document.getElementById('share-count');
            const currentCount = parseInt(shareCount.textContent);
            shareCount.textContent = currentCount + 1;
            
            // Close modal
            shareModal.hide();
            
            // Open share URL
            window.open(url, '_blank', 'width=600,height=400');
        } catch (error) {
            console.error('Error sharing article:', error);
        }
    }

    function shareOnFacebook() {
        const url = window.location.href;
        const title = document.querySelector('h1').textContent;
        const shareUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}&quote=${encodeURIComponent(title)}`;
        recordShareAndOpen(shareUrl);
    }

    function shareOnTwitter() {
        const url = window.location.href;
        const title = document.querySelector('h1').textContent;
        const shareUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(title)}&url=${encodeURIComponent(url)}`;
        recordShareAndOpen(shareUrl);
    }

    function shareOnLinkedIn() {
        const url = window.location.href;
        const title = document.querySelector('h1').textContent;
        const shareUrl = `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}&title=${encodeURIComponent(title)}`;
        recordShareAndOpen(shareUrl);
    }

    function shareOnWhatsApp() {
        const url = window.location.href;
        const title = document.querySelector('h1').textContent;
        const shareUrl = `https://wa.me/?text=${encodeURIComponent(title + ' ' + url)}`;
        recordShareAndOpen(shareUrl);
    }

    function shareViaEmail() {
        const url = window.location.href;
        const title = document.querySelector('h1').textContent;
        const subject = encodeURIComponent(title);
        const body = encodeURIComponent(`I thought you might find this article interesting: ${title}\n\n${url}`);
        const shareUrl = `mailto:?subject=${subject}&body=${body}`;
        recordShareAndOpen(shareUrl);
    }

    async function copyLink() {
        const url = window.location.href;
        const copyBtn = event.target.closest('button');
        
        try {
            // Record share in database
            await fetch(`/articles/{{ $article->id }}/share`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
            
            // Update share count
            const shareCount = document.getElementById('share-count');
            const currentCount = parseInt(shareCount.textContent);
            shareCount.textContent = currentCount + 1;
            
            // Copy to clipboard
            await navigator.clipboard.writeText(url);
            
            // Show feedback
            const originalHTML = copyBtn.innerHTML;
            copyBtn.innerHTML = '<i class="bi bi-check"></i> Copied!';
            copyBtn.classList.add('btn-success');
            copyBtn.classList.remove('btn-outline-dark');
            
            setTimeout(() => {
                copyBtn.innerHTML = originalHTML;
                copyBtn.classList.remove('btn-success');
                copyBtn.classList.add('btn-outline-dark');
                shareModal.hide();
            }, 1500);
        } catch (error) {
            console.error('Error copying link:', error);
            // Fallback for older browsers
            const textArea = document.createElement('textarea');
            textArea.value = url;
            document.body.appendChild(textArea);
            textArea.select();
            try {
                document.execCommand('copy');
                const originalHTML = copyBtn.innerHTML;
                copyBtn.innerHTML = '<i class="bi bi-check"></i> Copied!';
                copyBtn.classList.add('btn-success');
                copyBtn.classList.remove('btn-outline-dark');
                
                setTimeout(() => {
                    copyBtn.innerHTML = originalHTML;
                    copyBtn.classList.remove('btn-success');
                    copyBtn.classList.add('btn-outline-dark');
                    shareModal.hide();
                }, 1500);
            } catch (fallbackError) {
                console.error('Fallback copy failed:', fallbackError);
                alert('Failed to copy link. Please copy manually: ' + url);
            }
            document.body.removeChild(textArea);
        }
    }
</script>

</body>
</html>
