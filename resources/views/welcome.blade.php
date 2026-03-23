<!DOCTYPE html>
<html lang="am">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- SEO Meta Tags -->
    <title>Shalom Herbal Healing - Traditional Ethiopian Medicine & Natural Remedies | Dr. Shalom</title>
    <meta name="description" content="Discover authentic Ethiopian traditional herbal medicine and natural healing remedies at Shalom Herbal Healing. Led by Dr. Shalom, we offer ancient wisdom combined with modern wellness solutions for your health journey.">
    <meta name="keywords" content="Ethiopian traditional medicine, herbal remedies, natural healing, Dr. Shalom, Shalom Herbal Healing, traditional herbs, wellness, alternative medicine, Ethiopian herbs, natural health">
    <meta name="author" content="Dr. Shalom - Shalom Herbal Healing">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">
    <meta name="bingbot" content="index, follow">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Shalom Herbal Healing - Traditional Ethiopian Medicine & Natural Remedies">
    <meta property="og:description" content="Discover authentic Ethiopian traditional herbal medicine and natural healing remedies at Shalom Herbal Healing. Led by Dr. Shalom, we offer ancient wisdom combined with modern wellness solutions.">
    <meta property="og:url" content="https://shalomherbcare.com/">
    <meta property="og:site_name" content="Shalom Herbal Healing">
    <meta property="article:publisher" content="https://www.facebook.com/shalomherbcare">
    <meta property="article:author" content="Dr. Shalom">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ShalomHerbCare">
    <meta name="twitter:creator" content="@DrShalom">
    <meta name="twitter:title" content="Shalom Herbal Healing - Traditional Ethiopian Medicine">
    <meta name="twitter:description" content="Discover authentic Ethiopian traditional herbal medicine and natural healing remedies.">
    
    <!-- Additional SEO Meta Tags -->
    <meta name="theme-color" content="#2d5016">
    <meta name="msapplication-TileColor" content="#2d5016">
    <meta name="application-name" content="Shalom Herbal Healing">
    <meta name="apple-mobile-web-app-title" content="Shalom Herbal Healing">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://shalomherbcare.com/">
    
    <!-- Alternate Language Links -->
    <link rel="alternate" hreflang="en" href="https://shalomherbcare.com/">
    <link rel="alternate" hreflang="x-default" href="https://shalomherbcare.com/">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Three.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <!-- Custom Shared Styles -->
    <link rel="stylesheet" href="{{ asset('css/global.css') }}?v={{ filemtime(public_path('css/global.css')) }}">
    <link rel="stylesheet" href="{{ asset('css/books-shared.css') }}?v={{ filemtime(public_path('css/books-shared.css')) }}&t={{ time() }}">

    <style>
        /* Hero Section - Full Screen with Video Background */
        .hero-section {
            height: 100vh;
            background: linear-gradient(135deg, var(--primary) 0%, #2a1f02 100%);
            position: relative;
            overflow: hidden;
            text-align: center;
            display: flex;
            align-items: center;
            padding-top: 80px;
        }

        /* Three.js Canvas Container */
        #threejs-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
        }

        #threejs-container canvas {
            display: block;
            width: 100%;
            height: 100%;
        }

        /* Video Background */
        .hero-video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.4;
            pointer-events: none;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(28,22,1,0.85) 0%, rgba(28,22,1,0.7) 100%);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
            width: 100%;
        }

        .hero-subtitle {
            color: var(--primary-light);
            font-size: 1rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 1rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .hero-title {
            font-size: 5rem;
            font-weight: 900;
            font-style: italic;
            color: white;
            line-height: 1.1;
            margin-bottom: 2rem;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
            transform-style: preserve-3d;
            animation: titleFloat 6s ease-in-out infinite;
        }

        .hero-title span {
            color: var(--primary-light);
            display: block;
            font-size: 3.5rem;
            font-weight: 400;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            animation: titleSpanFloat 4s ease-in-out infinite;
        }

        @keyframes titleFloat {
            0%, 100% { transform: translateY(0) rotateX(0); }
            25% { transform: translateY(-10px) rotateX(2deg); }
            50% { transform: translateY(-5px) rotateX(-1deg); }
            75% { transform: translateY(-15px) rotateX(1deg); }
        }

        @keyframes titleSpanFloat {
            0%, 100% { transform: translateY(0) rotateY(0); }
            33% { transform: translateY(-8px) rotateY(2deg); }
            66% { transform: translateY(-12px) rotateY(-2deg); }
        }

        /* Search Form */
        .search-wrapper {
            background: rgba(0,0,0,0.3);
            border: 1px solid rgba(255,202,8,0.3);
            border-radius: 50px;
            padding: 5px;
            max-width: 600px;
            margin: 0 auto;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .search-wrapper form {
            display: flex;
        }

        .search-wrapper .form-control {
            background: transparent;
            border: none;
            color: white;
            padding: 1rem 1.5rem;
            font-size: 1rem;
            flex: 1;
        }

        .search-wrapper .form-control::placeholder {
            color: rgba(255,255,255,0.7);
            font-style: italic;
        }

        .search-wrapper .form-control:focus {
            box-shadow: none;
            outline: none;
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
            cursor: pointer;
            white-space: nowrap;
        }

        .search-wrapper .btn:hover {
            background: transparent;
            border-color: var(--primary-light);
            color: var(--primary-light);
        }

        /* Hero Stats - Fixed at bottom */
        .hero-stats {
            position: absolute;
            bottom: 40px;
            left: 0;
            right: 0;
            z-index: 2;
            display: flex;
            justify-content: center;
            gap: 6rem;
            padding: 2rem 0;
            background: linear-gradient(to top, rgba(0,0,0,0.5), transparent);
            backdrop-filter: blur(5px);
            border-top: 1px solid rgba(255,202,8,0.2);
        }

        .hero-stat-item {
            text-align: center;
        }

        .hero-stat-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary-light);
            line-height: 1;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 10px rgba(255,202,8,0.3);
        }

        .hero-stat-label {
            color: white;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
            text-shadow: 0 1px 3px rgba(0,0,0,0.5);
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
            padding: 100px 0;
            background: #f8f8f8;
        }

        .about-image {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
        }

        .about-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s;
        }

        .about-image:hover img {
            transform: scale(1.05);
        }

        .about-content h3 {
            font-size: 2.2rem;
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
            gap: 1.2rem;
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
            padding: 80px 0;
            background: white;
        }

        .video-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-top: 2rem;
        }

        .video-card {
            background: white;
            border: 1px solid #f0f0f0;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            box-shadow: var(--card-shadow);
        }

        .video-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--card-hover-shadow);
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

        .video-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--primary) 0%, #2a1f02 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .video-placeholder i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--primary-light);
        }

        .video-placeholder p {
            margin: 0;
            font-size: 0.9rem;
            opacity: 0.8;
        }

        .video-info {
            padding: 1.5rem;
        }

        .video-title {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .video-description {
            color: var(--text-light);
            font-size: 0.9rem;
            line-height: 1.4;
            margin-bottom: 0.5rem;
        }

        .video-meta {
            color: var(--text-light);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .video-meta i {
            color: var(--primary-light);
            margin-right: 0.3rem;
        }

        /* Shared styles are now handled by books-shared.css */


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
            background: white;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--card-hover-shadow);
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

        /* Testimonials - Improved Design */
        .testimonials-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #f8f8f8 0%, #ffffff 100%);
        }

        .testimonial-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            height: 100%;
            transition: all 0.3s;
            box-shadow: var(--card-shadow);
            position: relative;
            border: 1px solid #f0f0f0;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--card-hover-shadow);
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: 1rem;
            right: 1.5rem;
            font-size: 8rem;
            font-family: serif;
            color: var(--primary-light);
            opacity: 0.1;
            line-height: 1;
        }

        .testimonial-stars {
            color: var(--primary-light);
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .testimonial-stars i {
            margin-right: 0.2rem;
        }

        .testimonial-content {
            color: var(--text-dark);
            font-size: 1rem;
            line-height: 1.8;
            margin-bottom: 2rem;
            font-style: italic;
            position: relative;
            z-index: 1;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
            border-top: 1px solid #f0f0f0;
            padding-top: 1.5rem;
        }

        .author-avatar {
            width: 60px;
            height: 60px;
            background: var(--primary-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-weight: 700;
            font-size: 1.5rem;
            box-shadow: 0 5px 15px rgba(255,202,8,0.3);
        }

        .author-info h6 {
            margin: 0;
            font-weight: 700;
            color: var(--primary);
            font-size: 1.1rem;
        }

        .author-info small {
            color: var(--text-light);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .author-info i {
            color: var(--primary-light);
        }

        /* Promotions - Improved Design */
        .promotions-section {
            padding: 80px 0;
            background: white;
        }

        .promo-card {
            background: linear-gradient(135deg, var(--primary) 0%, #2a1f02 100%);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s;
            height: 100%;
            box-shadow: var(--card-shadow);
            position: relative;
        }

        .promo-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,202,8,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .promo-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--card-hover-shadow);
        }

        .promo-image {
            height: 200px;
            position: relative;
            overflow: hidden;
        }

        .promo-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s;
        }

        .promo-card:hover .promo-image img {
            transform: scale(1.1);
        }

        .promo-content {
            padding: 2rem;
            color: white;
            position: relative;
            z-index: 2;
        }

        .promo-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .promo-header h4 {
            font-weight: 700;
            margin: 0;
            color: white;
            font-size: 1.3rem;
        }

        .promo-badge {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 700;
            font-size: 0.8rem;
            padding: 0.3rem 1.2rem;
            border-radius: 50px;
        }

        .promo-description {
            color: rgba(255,255,255,0.8);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .promo-code-wrapper {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 50px;
            padding: 0.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
        }

        .promo-code {
            font-family: monospace;
            font-weight: 700;
            color: var(--primary-light);
            font-size: 1.1rem;
            padding: 0 1rem;
        }

        .promo-copy-btn {
            background: var(--primary-light);
            border: none;
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            color: var(--primary);
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        .promo-copy-btn:hover {
            background: white;
            color: var(--primary);
        }

        .promo-expiry {
            margin-top: 1rem;
            color: rgba(255,255,255,0.6);
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .promo-expiry i {
            color: var(--primary-light);
        }

        /* Contact Section */
        .contact-section {
            padding: 100px 0;
            background: linear-gradient(135deg, var(--primary) 0%, #2a1f02 100%);
            color: white;
        }

        .contact-info {
            padding-right: 2rem;
        }

        .contact-info h3 {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--primary-light);
        }

        .contact-info p {
            color: rgba(255,255,255,0.7);
            margin-bottom: 2rem;
            line-height: 1.8;
            font-size: 1.1rem;
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
            margin-bottom: 1.2rem;
        }

        .contact-details i {
            width: 45px;
            height: 45px;
            background: rgba(255,202,8,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-light);
            font-size: 1.2rem;
            transition: all 0.3s;
        }

        .contact-details li:hover i {
            background: var(--primary-light);
            color: var(--primary);
            transform: scale(1.1);
        }

        .contact-details span {
            color: rgba(255,255,255,0.9);
            font-size: 1rem;
        }

        .contact-social {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .contact-social a {
            width: 50px;
            height: 50px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
            transition: all 0.3s;
            text-decoration: none;
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
            font-size: 1.5rem;
        }

        .contact-form .form-control,
        .contact-form .form-select {
            border: 2px solid #f0f0f0;
            border-radius: 12px;
            padding: 0.8rem 1rem;
            margin-bottom: 1rem;
            transition: all 0.3s;
            width: 100%;
        }

        .contact-form .form-control:focus,
        .contact-form .form-select:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.2rem rgba(255,202,8,0.1);
            outline: none;
        }

        .contact-form textarea {
            min-height: 120px;
            resize: vertical;
        }

        .contact-form button {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 700;
            font-style: italic;
            padding: 1rem 2rem;
            border-radius: 50px;
            border: none;
            width: 100%;
            transition: all 0.3s;
            font-size: 1rem;
            cursor: pointer;
        }

        .contact-form button:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .contact-message {
            margin-top: 1rem;
            padding: 0.8rem 1rem;
            border-radius: 12px;
            font-size: 0.9rem;
            text-align: center;
            font-weight: 500;
        }

        .contact-message.success {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
            border: 1px solid #28a745;
        }

        .contact-message.error {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid #dc3545;
        }


        .newsletter-message {
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            text-align: center;
            font-weight: 500;
        }

        .newsletter-message.success {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
            border: 1px solid #28a745;
        }

        .newsletter-message.error {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: 1px solid #dc3545;
        }


        /* Toast notification */
        .toast {
            background: var(--primary-light);
            color: var(--primary);
            border-radius: 50px;
            padding: 1rem 2rem;
            font-weight: 600;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        /* ==========================================
           RESPONSIVE — Hero Section
           ========================================== */

        /* Tablets and small laptops */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: 3.8rem;
            }

            .hero-title span {
                font-size: 2.8rem;
            }

            .hero-stats {
                gap: 4rem;
            }

            .hero-stat-number {
                font-size: 2.5rem;
            }

            .search-wrapper {
                max-width: 500px;
            }
        }

        /* Small tablets */
        @media (max-width: 992px) {
            .hero-section {
                padding-top: 70px;
            }

            .hero-title {
                font-size: 3.2rem;
                margin-bottom: 1.5rem;
            }

            .hero-title span {
                font-size: 2.4rem;
            }

            .hero-subtitle {
                font-size: 0.9rem;
                letter-spacing: 2px;
            }

            .hero-stats {
                gap: 3rem;
                bottom: 30px;
                padding: 1.5rem 1rem;
            }

            .hero-stat-number {
                font-size: 2.2rem;
            }

            .hero-stat-label {
                font-size: 0.8rem;
                letter-spacing: 0.5px;
            }

            .search-wrapper {
                max-width: 450px;
            }
        }

        /* Phones landscape / large phones */
        @media (max-width: 768px) {
            .hero-section {
                height: auto;
                min-height: 100vh;
                padding-top: 70px;
                padding-bottom: 120px;
            }

            .hero-content {
                padding: 0 16px;
            }

            .hero-title {
                font-size: 2.5rem;
                margin-bottom: 1.2rem;
            }

            .hero-title span {
                font-size: 1.8rem;
            }

            .hero-subtitle {
                font-size: 0.8rem;
                letter-spacing: 2px;
                margin-bottom: 0.8rem;
            }

            .hero-stats {
                gap: 2rem;
                bottom: 20px;
                padding: 1.2rem 1rem;
                flex-direction: row;
                flex-wrap: nowrap;
            }

            .hero-stat-number {
                font-size: 1.8rem;
            }

            .hero-stat-label {
                font-size: 0.75rem;
                letter-spacing: 0.5px;
            }

            .search-wrapper {
                max-width: 100%;
            }

            .search-wrapper .form-control {
                padding: 0.8rem 1rem;
                font-size: 0.9rem;
            }

            .search-wrapper .btn {
                padding: 0.8rem 1.5rem;
                font-size: 0.9rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .about-features {
                grid-template-columns: 1fr;
            }

            .contact-info {
                padding-right: 0;
                margin-bottom: 2rem;
            }

            .video-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Standard phones (iPhone, Samsung Galaxy, etc.) */
        @media (max-width: 480px) {
            .hero-section {
                padding-top: 60px;
                padding-bottom: 100px;
            }

            .hero-content {
                padding: 0 12px;
            }

            .hero-title {
                font-size: 2rem;
                line-height: 1.15;
                margin-bottom: 1rem;
            }

            .hero-title span {
                font-size: 1.5rem;
            }

            .hero-subtitle {
                font-size: 0.7rem;
                letter-spacing: 1.5px;
                margin-bottom: 0.6rem;
            }

            .hero-stats {
                gap: 1.2rem;
                bottom: 12px;
                padding: 1rem 0.8rem;
            }

            .hero-stat-number {
                font-size: 1.5rem;
                margin-bottom: 0.25rem;
            }

            .hero-stat-label {
                font-size: 0.65rem;
                letter-spacing: 0;
            }

            .search-wrapper {
                border-radius: 16px;
                padding: 6px;
            }

            .search-wrapper form {
                flex-direction: column;
            }

            .search-wrapper .form-control {
                padding: 0.7rem 1rem;
                font-size: 0.85rem;
                text-align: center;
            }

            .search-wrapper .btn {
                width: 100%;
                margin-top: 6px;
                padding: 0.7rem 1.5rem;
                font-size: 0.85rem;
                border-radius: 12px;
            }
        }

        /* Very small phones (iPhone SE, Galaxy Fold, etc.) */
        @media (max-width: 360px) {
            .hero-section {
                padding-top: 55px;
                padding-bottom: 90px;
            }

            .hero-title {
                font-size: 1.7rem;
            }

            .hero-title span {
                font-size: 1.3rem;
            }

            .hero-subtitle {
                font-size: 0.65rem;
                letter-spacing: 1px;
            }

            .hero-stats {
                gap: 0.8rem;
                bottom: 8px;
                padding: 0.8rem 0.5rem;
            }

            .hero-stat-number {
                font-size: 1.2rem;
            }

            .hero-stat-label {
                font-size: 0.6rem;
            }

            .search-wrapper .form-control {
                padding: 0.6rem 0.8rem;
                font-size: 0.8rem;
            }

            .search-wrapper .btn {
                padding: 0.6rem 1rem;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>

<!-- Navigation -->
@include('components.navigation')

<!-- Hero Section -->
@include('components.hero')

<!-- Why Choose Us -->
@include('components.features')


<!-- Featured Books -->
@include('components.books')
<!-- Featured Remedies with Price -->
<!-- @include('components.remedies') -->

<!-- About Section -->
@include('components.about')

<!-- Video Section -->
@include('components.videos')

<!-- Testimonials -->
@include('components.testimonials')

<!-- Promotions -->
@include('components.promotions')

<!-- Latest Articles -->
<!-- @include('components.articles') -->



<!-- Contact Section -->
@include('components.contact')

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
            
            // Show phone number on button
            this.innerHTML = phone;
            this.classList.add('bg-success');
            this.style.border = 'none';
            this.style.fontSize = '0.8rem';
            this.style.padding = '0.8rem';
        });
    });

    // Copy promo code
    function copyPromoCode(code) {
        navigator.clipboard.writeText(code).then(() => {
            // Show success message
            const toast = document.createElement('div');
            toast.className = 'position-fixed top-0 end-0 p-3';
            toast.style.zIndex = '9999';
            toast.innerHTML = `
                <div class="toast show" role="alert">
                    <div class="toast-body">
                        Promo code "${code}" ወደ clipboard ተቀድቷል!
                    </div>
                </div>
            `;
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        });
    }

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('.navbar');
        if (window.scrollY > 100) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
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

    // Video background fallback
    const video = document.querySelector('.hero-video-background');
    if (video) {
        video.play().catch(function(error) {
            console.log("Video autoplay failed:", error);
            // Video will show poster image instead
        });
    }

    // Newsletter subscription
    document.getElementById('newsletterForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitBtn = form.querySelector('button');
        const messageDiv = document.getElementById('newsletterMessage');
        const email = form.querySelector('input[name="email"]').value;
        
        // Get CSRF token safely
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        
        if (!csrfToken) {
            messageDiv.textContent = 'የደህናነት ቁልፍ አልተገኘም። ገጹን ያድሱ።';
            messageDiv.className = 'newsletter-message error';
            return;
        }
        
        // Validate email
        if (!email || !email.includes('@')) {
            messageDiv.textContent = 'ትክክለኛው የኢሜይል አድራሻ ያስገቡ።';
            messageDiv.className = 'newsletter-message error';
            return;
        }
        
        // Disable button and show loading
        submitBtn.disabled = true;
        submitBtn.textContent = 'በመመዝገብ ላይ...';
        
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
            messageDiv.textContent = 'ስህተት ተፈጥሯል። እባክዎ በድጋሚ ይሞክሩ።';
            messageDiv.className = 'newsletter-message error';
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = 'ይመዝገቡ';
            
            // Hide message after 5 seconds
            setTimeout(() => {
                messageDiv.textContent = '';
                messageDiv.className = 'newsletter-message';
            }, 5000);
        });
    });

    // Contact form submission
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitBtn = form.querySelector('button[type="submit"]');
        const messageDiv = document.getElementById('contactMessage');
        const formData = new FormData(form);
        
        // Get CSRF token safely
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        
        if (!csrfToken) {
            messageDiv.textContent = 'የደህናነት ቁልፍ አልተገኘም። ገጹን ያድሱ።';
            messageDiv.className = 'contact-message error';
            return;
        }
        
        // Disable button and show loading
        submitBtn.disabled = true;
        submitBtn.textContent = 'በመላክ ላይ...';
        
        // Send request
        fetch('{{ route("contact.submit") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                name: formData.get('name'),
                email: formData.get('email'),
                subject: formData.get('subject'),
                message: formData.get('message')
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
                messageDiv.className = 'contact-message success';
                form.reset();
            } else {
                messageDiv.textContent = data.message;
                messageDiv.className = 'contact-message error';
            }
        })
        .catch(error => {
            console.error('Contact form error:', error);
            messageDiv.textContent = 'ስህተት ተፈጥሯል። እባክዎ በድጋሚ ይሞክሩ።';
            messageDiv.className = 'contact-message error';
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = 'መልዕክት ይላኩ';
            
            // Hide message after 5 seconds
            setTimeout(() => {
                messageDiv.textContent = '';
                messageDiv.className = 'contact-message';
            }, 5000);
        });
    });
</script>

<!-- Beautiful SVG Plant Growth Animation System -->
<style>
/* SVG Plant Animation Styles */
.svg-plant-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 0;
    pointer-events: none;
    overflow: hidden;
}

.plant-svg {
    position: absolute;
    transform-origin: bottom center;
    animation: plantSway 8s ease-in-out infinite;
}

.plant-stage-0 { opacity: 0; }
.plant-stage-1 { opacity: 1; }
.plant-stage-2 { opacity: 1; }
.plant-stage-3 { opacity: 1; }
.plant-stage-4 { opacity: 1; }
.plant-stage-5 { opacity: 1; }

/* Seed Stage */
.seed-circle {
    fill: #8B4513;
    animation: seedPulse 3s ease-in-out infinite;
}

/* Roots */
.root-path {
    stroke: #654321;
    stroke-width: 2;
    fill: none;
    opacity: 0;
    animation: rootGrow 4s ease-out forwards;
}

/* Stem */
.stem-path {
    stroke: #90EE90;
    stroke-width: 3;
    fill: none;
    stroke-linecap: round;
    opacity: 0;
    animation: stemGrow 3s ease-out forwards;
}

/* Leaves */
.leaf-path {
    fill: #228B22;
    opacity: 0;
    transform-origin: bottom center;
    animation: leafUnfold 2s ease-out forwards;
}

.leaf-path.mature {
    fill: #2E8B57;
}

/* Flowers */
.flower-petal {
    fill: #FFD700;
    opacity: 0;
    transform-origin: center;
    animation: petalBloom 2.5s ease-out forwards;
}

.flower-petal.lavender {
    fill: #9370DB;
}

.flower-petal.chamomile {
    fill: #FFF8DC;
}

.flower-center {
    fill: #FF8C00;
    opacity: 0;
    animation: centerAppear 2s ease-out 0.5s forwards;
}

/* Animations */
@keyframes plantSway {
    0%, 100% { transform: rotate(0deg); }
    25% { transform: rotate(1deg); }
    75% { transform: rotate(-1deg); }
}

@keyframes seedPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

@keyframes rootGrow {
    0% { 
        opacity: 0;
        stroke-dasharray: 100;
        stroke-dashoffset: 100;
    }
    100% { 
        opacity: 0.7;
        stroke-dasharray: 100;
        stroke-dashoffset: 0;
    }
}

@keyframes stemGrow {
    0% { 
        opacity: 0;
        stroke-dasharray: 200;
        stroke-dashoffset: 200;
    }
    100% { 
        opacity: 1;
        stroke-dasharray: 200;
        stroke-dashoffset: 0;
    }
}

@keyframes leafUnfold {
    0% { 
        opacity: 0;
        transform: scale(0) rotate(-45deg);
    }
    100% { 
        opacity: 0.9;
        transform: scale(1) rotate(0deg);
    }
}

@keyframes petalBloom {
    0% { 
        opacity: 0;
        transform: scale(0) rotate(0deg);
    }
    100% { 
        opacity: 0.9;
        transform: scale(1) rotate(360deg);
    }
}

@keyframes centerAppear {
    0% { 
        opacity: 0;
        transform: scale(0);
    }
    100% { 
        opacity: 1;
        transform: scale(1);
    }
}

/* Ground with wave effect */
.ground-svg {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 150px;
    z-index: -1;
}

.ground-path {
    fill: url(#groundGradient);
    animation: groundWave 10s ease-in-out infinite;
}

@keyframes groundWave {
    0%, 100% { d: path("M0,150 Q250,130 500,150 T1000,150 L1000,300 L0,300 Z"); }
    50% { d: path("M0,150 Q250,170 500,150 T1000,150 L1000,300 L0,300 Z"); }
}

/* Individual plant positioning */
.plant-1 { left: 5%; bottom: 0; height: 90vh; width: auto; animation-delay: 0s; }
.plant-2 { right: 5%; bottom: 0; height: 90vh; width: auto; animation-delay: 2s; }
</style>

<div class="svg-plant-container" id="svg-plant-container">
    <!-- Ground -->
    <svg class="ground-svg" viewBox="0 0 1000 300" preserveAspectRatio="none">
        <defs>
            <linearGradient id="groundGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                <stop offset="0%" style="stop-color:#3A5F3A;stop-opacity:0.8" />
                <stop offset="100%" style="stop-color:#2E4B2E;stop-opacity:1" />
            </linearGradient>
        </defs>
        <path class="ground-path" d="M0,150 Q250,130 500,150 T1000,150 L1000,300 L0,300 Z" />
    </svg>

    <!-- Large Plant 1 - Left Side (Basil) -->
    <svg class="plant-svg plant-1" viewBox="0 0 300 500" preserveAspectRatio="xMidYMax meet">
        <!-- Large Root System -->
        <path class="root-path" d="M150,250 Q130,300 110,350 Q150,320 170,370 Q150,340 150,400" style="animation-delay: 0.5s; stroke-width: 4;"/>
        <path class="root-path" d="M150,250 Q170,300 190,350 Q150,320 130,370" style="animation-delay: 0.7s; stroke-width: 3;"/>
        
        <!-- Large Seed -->
        <circle class="seed-circle" cx="150" cy="250" r="20" style="animation-delay: 0s;"/>
        
        <!-- Thick Stem -->
        <path class="stem-path" d="M150,250 Q145,200 150,150 Q155,100 150,50 Q145,20 150,0" style="animation-delay: 2s; stroke-width: 8;"/>
        
        <!-- Large Leaves -->
        <path class="leaf-path" d="M150,200 Q80,170 60,100 Q90,140 150,180" style="animation-delay: 3s;"/>
        <path class="leaf-path" d="M150,180 Q220,150 240,80 Q210,120 150,160" style="animation-delay: 3.5s;"/>
        <path class="leaf-path mature" d="M150,150 Q70,110 45,40 Q75,80 150,130" style="animation-delay: 4s;"/>
        <path class="leaf-path mature" d="M150,130 Q230,90 255,20 Q225,60 150,110" style="animation-delay: 4.5s;"/>
        <path class="leaf-path mature" d="M150,100 Q60,50 30,0 Q60,40 150,90" style="animation-delay: 5s;"/>
        <path class="leaf-path mature" d="M150,80 Q240,30 270,0 Q240,40 150,70" style="animation-delay: 5.5s;"/>
        
        <!-- Large Flower Cluster -->
        <g transform="translate(150,0)">
            <circle class="flower-petal" cx="0" cy="-25" r="15" style="animation-delay: 7s;"/>
            <circle class="flower-petal" cx="25" cy="0" r="15" style="animation-delay: 7.2s;"/>
            <circle class="flower-petal" cx="0" cy="25" r="15" style="animation-delay: 7.4s;"/>
            <circle class="flower-petal" cx="-25" cy="0" r="15" style="animation-delay: 7.6s;"/>
            <circle class="flower-petal" cx="18" cy="-18" r="12" style="animation-delay: 7.8s;"/>
            <circle class="flower-petal" cx="18" cy="18" r="12" style="animation-delay: 8s;"/>
            <circle class="flower-petal" cx="-18" cy="18" r="12" style="animation-delay: 8.2s;"/>
            <circle class="flower-petal" cx="-18" cy="-18" r="12" style="animation-delay: 8.4s;"/>
            <circle class="flower-center" cx="0" cy="0" r="12" style="animation-delay: 8.5s;"/>
        </g>
        
        <!-- Additional Side Flowers -->
        <g transform="translate(100,50)">
            <circle class="flower-petal" cx="0" cy="-15" r="10" style="animation-delay: 9s;"/>
            <circle class="flower-petal" cx="15" cy="0" r="10" style="animation-delay: 9.2s;"/>
            <circle class="flower-petal" cx="0" cy="15" r="10" style="animation-delay: 9.4s;"/>
            <circle class="flower-petal" cx="-15" cy="0" r="10" style="animation-delay: 9.6s;"/>
            <circle class="flower-center" cx="0" cy="0" r="8" style="animation-delay: 9.8s;"/>
        </g>
        
        <g transform="translate(200,40)">
            <circle class="flower-petal" cx="0" cy="-12" r="8" style="animation-delay: 10s;"/>
            <circle class="flower-petal" cx="12" cy="0" r="8" style="animation-delay: 10.2s;"/>
            <circle class="flower-petal" cx="0" cy="12" r="8" style="animation-delay: 10.4s;"/>
            <circle class="flower-petal" cx="-12" cy="0" r="8" style="animation-delay: 10.6s;"/>
            <circle class="flower-center" cx="0" cy="0" r="6" style="animation-delay: 10.8s;"/>
        </g>
    </svg>

    <!-- Large Plant 2 - Right Side (Lavender) -->
    <svg class="plant-svg plant-2" viewBox="0 0 280 480" preserveAspectRatio="xMidYMax meet">
        <!-- Large Root System -->
        <path class="root-path" d="M140,240 Q120,290 100,340 Q140,310 160,360 Q140,330 140,390" style="animation-delay: 2.5s; stroke-width: 4;"/>
        <path class="root-path" d="M140,240 Q160,290 180,340 Q140,310 120,360" style="animation-delay: 2.7s; stroke-width: 3;"/>
        
        <!-- Large Seed -->
        <circle class="seed-circle" cx="140" cy="240" r="18" style="animation-delay: 2s;"/>
        
        <!-- Thick Stem -->
        <path class="stem-path" d="M140,240 Q135,190 140,140 Q145,90 140,40 Q135,10 140,0" style="animation-delay: 4s; stroke-width: 7;"/>
        
        <!-- Large Leaves -->
        <path class="leaf-path" d="M140,190 Q70,160 50,90 Q80,130 140,170" style="animation-delay: 5s;"/>
        <path class="leaf-path" d="M140,170 Q210,140 230,70 Q200,110 140,150" style="animation-delay: 5.5s;"/>
        <path class="leaf-path mature" d="M140,150 Q60,110 35,40 Q65,80 140,130" style="animation-delay: 6s;"/>
        <path class="leaf-path mature" d="M140,130 Q220,90 245,20 Q215,60 140,110" style="animation-delay: 6.5s;"/>
        <path class="leaf-path mature" d="M140,110 Q50,60 20,0 Q50,40 140,90" style="animation-delay: 7s;"/>
        
        <!-- Large Lavender Flower Stalks -->
        <g transform="translate(140,0)">
            <!-- Main lavender cluster -->
            <ellipse class="flower-petal lavender" cx="0" cy="-30" rx="8" ry="20" style="animation-delay: 8s;"/>
            <ellipse class="flower-petal lavender" cx="15" cy="-25" rx="8" ry="20" style="animation-delay: 8.2s;"/>
            <ellipse class="flower-petal lavender" cx="-15" cy="-25" rx="8" ry="20" style="animation-delay: 8.4s;"/>
            <ellipse class="flower-petal lavender" cx="0" cy="-20" rx="8" ry="20" style="animation-delay: 8.6s;"/>
            <ellipse class="flower-petal lavender" cx="10" cy="-15" rx="8" ry="20" style="animation-delay: 8.8s;"/>
            <ellipse class="flower-petal lavender" cx="-10" cy="-15" rx="8" ry="20" style="animation-delay: 9s;"/>
            <ellipse class="flower-petal lavender" cx="0" cy="-10" rx="8" ry="20" style="animation-delay: 9.2s;"/>
            <circle class="flower-center" cx="0" cy="-20" r="6" style="animation-delay: 9.5s;"/>
        </g>
        
        <!-- Side lavender clusters -->
        <g transform="translate(90,30)">
            <ellipse class="flower-petal lavender" cx="0" cy="-20" rx="6" ry="15" style="animation-delay: 10s;"/>
            <ellipse class="flower-petal lavender" cx="12" cy="-16" rx="6" ry="15" style="animation-delay: 10.2s;"/>
            <ellipse class="flower-petal lavender" cx="-12" cy="-16" rx="6" ry="15" style="animation-delay: 10.4s;"/>
            <ellipse class="flower-petal lavender" cx="0" cy="-12" rx="6" ry="15" style="animation-delay: 10.6s;"/>
            <circle class="flower-center" cx="0" cy="-16" r="5" style="animation-delay: 10.8s;"/>
        </g>
        
        <g transform="translate(190,25)">
            <ellipse class="flower-petal lavender" cx="0" cy="-18" rx="6" ry="15" style="animation-delay: 11s;"/>
            <ellipse class="flower-petal lavender" cx="10" cy="-14" rx="6" ry="15" style="animation-delay: 11.2s;"/>
            <ellipse class="flower-petal lavender" cx="-10" cy="-14" rx="6" ry="15" style="animation-delay: 11.4s;"/>
            <ellipse class="flower-petal lavender" cx="0" cy="-10" rx="6" ry="15" style="animation-delay: 11.6s;"/>
            <circle class="flower-center" cx="0" cy="-14" r="5" style="animation-delay: 11.8s;"/>
        </g>
        
        <!-- Additional small lavender clusters -->
        <g transform="translate(110,60)">
            <ellipse class="flower-petal lavender" cx="0" cy="-15" rx="5" ry="12" style="animation-delay: 12s;"/>
            <ellipse class="flower-petal lavender" cx="8" cy="-12" rx="5" ry="12" style="animation-delay: 12.2s;"/>
            <ellipse class="flower-petal lavender" cx="-8" cy="-12" rx="5" ry="12" style="animation-delay: 12.4s;"/>
            <circle class="flower-center" cx="0" cy="-12" r="4" style="animation-delay: 12.5s;"/>
        </g>
        
        <g transform="translate(170,55)">
            <ellipse class="flower-petal lavender" cx="0" cy="-15" rx="5" ry="12" style="animation-delay: 12.7s;"/>
            <ellipse class="flower-petal lavender" cx="8" cy="-12" rx="5" ry="12" style="animation-delay: 12.9s;"/>
            <ellipse class="flower-petal lavender" cx="-8" cy="-12" rx="5" ry="12" style="animation-delay: 13.1s;"/>
            <circle class="flower-center" cx="0" cy="-12" r="4" style="animation-delay: 13.2s;"/>
        </g>
    </svg>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Interactive mouse effect for SVG plants
    let mouseX = 0;
    let mouseY = 0;
    
    const handleMouseMove = (event) => {
        mouseX = (event.clientX / window.innerWidth - 0.5) * 2;
        mouseY = (event.clientY / window.innerHeight - 0.5) * 2;
        
        // Apply subtle rotation to plants based on mouse position
        const plants = document.querySelectorAll('.plant-svg');
        plants.forEach((plant, index) => {
            const baseRotation = Math.sin(Date.now() * 0.001 + index) * 2;
            const mouseRotationX = mouseX * 3;
            const mouseRotationY = mouseY * 1;
            plant.style.transform = `rotate(${baseRotation + mouseRotationX}deg)`;
        });
    };
    
    window.addEventListener('mousemove', handleMouseMove);
    
    // Add touch support for mobile
    const handleTouchMove = (event) => {
        if (event.touches.length === 1) {
            mouseX = (event.touches[0].clientX / window.innerWidth - 0.5) * 2;
            mouseY = (event.touches[0].clientY / window.innerHeight - 0.5) * 2;
        }
    };
    
    window.addEventListener('touchmove', handleTouchMove);
    
    // Restart animations on visibility change
    document.addEventListener('visibilitychange', () => {
        if (!document.hidden) {
            const plants = document.querySelectorAll('.plant-svg');
            plants.forEach(plant => {
                plant.style.animation = 'none';
                setTimeout(() => {
                    plant.style.animation = '';
                }, 10);
            });
        }
    });
});
</script>

</body>
</html>