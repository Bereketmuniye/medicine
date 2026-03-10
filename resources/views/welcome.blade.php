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
        }

        .hero-title span {
            color: var(--primary-light);
            display: block;
            font-size: 3.5rem;
            font-weight: 400;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
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

        .video-info {
            padding: 1.5rem;
        }

        .video-title {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
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

        /* Product Cards with Price */
        .product-card {
            background: white;
            border: 1px solid #f0f0f0;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s;
            height: 100%;
            box-shadow: var(--card-shadow);
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--card-hover-shadow);
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
            z-index: 2;
        }

        .product-actions {
            position: absolute;
            top: 1rem;
            right: 1rem;
            display: flex;
            gap: 0.5rem;
            opacity: 0;
            transition: opacity 0.3s;
            z-index: 2;
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

        .product-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .product-price small {
            font-size: 0.8rem;
            color: var(--text-light);
            font-weight: 400;
        }

        .product-footer {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .btn-reserve {
            background: var(--primary);
            color: white;
            font-weight: 700;
            font-style: italic;
            padding: 0.8rem;
            border-radius: 50px;
            flex: 1;
            border: 2px solid transparent;
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn-reserve:hover {
            background: var(--primary-light);
            color: var(--primary);
            border-color: var(--primary);
        }

        .btn-price {
            background: var(--primary-light);
            color: var(--primary);
            font-weight: 700;
            padding: 0.8rem 1rem;
            border-radius: 50px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.3rem;
            border: 2px solid transparent;
            transition: all 0.3s;
        }

        .btn-price:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary-light);
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

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            margin-top: 3rem;
            padding-top: 2rem;
            text-align: center;
            color: rgba(255,255,255,0.4);
            font-size: 0.9rem;
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

        /* Responsive */
        @media (max-width: 1200px) {
            .hero-title {
                font-size: 4rem;
            }
            
            .hero-title span {
                font-size: 3rem;
            }
        }

        @media (max-width: 992px) {
            .video-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .hero-stats {
                gap: 3rem;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 3.5rem;
            }
            
            .hero-title span {
                font-size: 2.5rem;
            }
            
            .hero-stats {
                flex-direction: column;
                gap: 1.5rem;
                bottom: 20px;
                padding: 1.5rem 0;
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
            
            .search-wrapper form {
                flex-direction: column;
            }
            
            .search-wrapper .btn {
                width: 100%;
                margin-top: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-title span {
                font-size: 2rem;
            }
            
            .hero-stats {
                gap: 1rem;
            }
            
            .hero-stat-number {
                font-size: 2rem;
            }
            
            .hero-stat-label {
                font-size: 0.8rem;
            }
            
            .contact-social a {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#">HERBMED<span>.</span>ET</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
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

<!-- Hero Section - Full Screen with Video Background -->
<section class="hero-section" id="home">
    <!-- Video Background with fallback -->
    <video class="hero-video-background" autoplay muted loop playsinline poster="https://images.unsplash.com/photo-1615485290382-441e4d049cb5?auto=format&fit=crop&w=1920&q=80">
        <source src="https://assets.mixkit.co/videos/preview/mixkit-herbalist-hand-pouring-dry-tea-leaves-40153-large.mp4" type="video/mp4">
        <!-- Fallback message if video doesn't load -->
        Your browser does not support the video tag.
    </video>
    <div class="hero-overlay"></div>
    
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
    
    <!-- Hero Stats - Fixed at bottom -->
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
        
        <div class="row g-4">
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

<!-- Featured Remedies with Price -->
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
                            <div class="product-price">$29.99 <small>/oz</small></div>
                            <div class="product-footer">
                                <button class="btn-reserve contact-btn" data-phone="{{ $owner_phone ?? '+251911XXXXXX' }}">
                                    <i class="bi bi-whatsapp"></i>
                                </button>
                                <a href="#" class="btn-price">
                                    <i class="bi bi-bag"></i> Buy
                                </a>
                            </div>
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
                    
                    <a href="#" class="btn-account" style="background: var(--primary-light); color: var(--primary); border: none; padding: 1rem 2.5rem; display: inline-block;">LEARN MORE</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Section - Without Upload Button -->
<section class="video-section" id="videos">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">COMMUNITY VIDEOS</span>
            <h2 class="section-title">Healing <span>Stories</span></h2>
            <p class="text-muted">Watch real experiences from our community</p>
        </div>
        
        <!-- Video Grid - Sample videos -->
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
    </div>
</section>

<!-- Testimonials - Improved Design -->
@if($testimonials && count($testimonials) > 0)
<section class="testimonials-section">
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
                                <small><i class="bi bi-geo-alt"></i> {{ $testimonial['location'] }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Promotions - Improved Design -->
@if($activePromotions->isNotEmpty())
<section class="promotions-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">SPECIAL OFFERS</span>
            <h2 class="section-title">Current <span>Promotions</span></h2>
        </div>
        
        <div class="row g-4">
            @foreach($activePromotions as $promotion)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="promo-card">
                        @if($promotion->image)
                            <div class="promo-image">
                                <img src="{{ asset('storage/' . $promotion->image) }}" alt="{{ $promotion->title }}">
                            </div>
                        @endif
                        <div class="promo-content">
                            <div class="promo-header">
                                <h4>{{ $promotion->title }}</h4>
                                <span class="promo-badge">{{ $promotion->discount_display ?? 'Special Offer' }}</span>
                            </div>
                            <p class="promo-description">{{ Str::limit($promotion->description, 100) }}</p>
                            @if($promotion->promo_code)
                                <div class="promo-code-wrapper">
                                    <span class="promo-code">{{ $promotion->promo_code }}</span>
                                    <button class="promo-copy-btn" onclick="copyPromoCode('{{ $promotion->promo_code }}')">
                                        <i class="bi bi-files"></i> Copy
                                    </button>
                                </div>
                            @endif
                            @if($promotion->expiry_date)
                                <div class="promo-expiry">
                                    <i class="bi bi-clock"></i>
                                    <span>Valid until {{ \Carbon\Carbon::parse($promotion->expiry_date)->format('M d, Y') }}</span>
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
            this.innerHTML = `<i class="bi bi-whatsapp"></i>`;
            this.classList.add('bg-success');
            this.style.border = 'none';
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
                        Promo code "${code}" copied to clipboard!
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
</script>

</body>
</html>