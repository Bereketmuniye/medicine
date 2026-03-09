<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HerbMed Ethiopia – Traditional Herbal Medicine & Natural Products')</title>
    <meta name="description" content="@yield('description', 'Discover authentic Ethiopian traditional medicine, herbal remedies, and natural wellness products.')">
    
    <!-- Bootstrap 5.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&family=Merriweather:wght@300;400&display=swap" rel="stylesheet">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #2d5016;
            --primary-dark: #1a3d0f;
            --secondary-color: #f97316;
            --accent-color: #10b981;
            --light-color: #f8fafc;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
            --border-color: #e5e7eb;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.1);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 25px rgba(0,0,0,0.1);
            --gradient-primary: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
            --gradient-secondary: linear-gradient(135deg, var(--secondary-color) 0%, #d63384 100%);
            --gradient-accent: linear-gradient(135deg, var(--accent-color) 0%, #059669 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            min-height: 100vh;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Playfair Display', serif;
            font-weight: 600;
            color: var(--text-dark);
            line-height: 1.2;
        }
        
        .display-1 {
            font-size: 3.5rem;
            font-weight: 700;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: white;
            padding: 0.5rem 1rem;
            margin: 0;
        }
        
        .display-2 {
            font-size: 3rem;
            font-weight: 600;
        }
        
        .display-4 {
            font-size: 2.5rem;
            font-weight: 600;
        }
        
        .display-5 {
            font-size: 2rem;
            font-weight: 600;
        }
        
        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: none;
            box-shadow: var(--shadow-lg);
            transition: all 0.3s ease;
            padding: 1rem 0;
        }
        
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .navbar-brand:hover {
            color: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .navbar-nav .nav-link {
            color: var(--text-muted);
            font-weight: 500;
            padding: 0.5rem 1rem;
            margin: 0 0.25rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .navbar-nav .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: all 0.3s ease;
        }
        
        .navbar-nav .nav-link:hover {
            color: white;
            background: var(--gradient-primary);
            transform: translateY(-2px);
        }
        
        .navbar-nav .nav-link:hover::before {
            width: 100%;
        }
        
        .navbar-nav .nav-link.active {
            color: white;
            background: var(--gradient-primary);
        }
        
        .navbar-nav .nav-link.active::before {
            width: 100%;
        }
        
        /* Buttons */
        .btn {
            font-weight: 600;
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }
        
        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient-accent);
            transition: all 0.5s ease;
            z-index: 1;
        }
        
        .btn:hover::before {
            left: 0;
        }
        
        .btn-primary {
            background: var(--gradient-primary);
            color: white;
            box-shadow: var(--shadow-md);
        }
        
        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        
        .btn-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            box-shadow: var(--shadow-md);
        }
        
        .btn-success:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }
        
        .btn-outline-primary {
            background: transparent;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            box-shadow: var(--shadow-sm);
        }
        
        .btn-outline-primary:hover {
            background: var(--gradient-primary);
            color: white;
            border-color: var(--primary-dark);
        }
        
        .btn-outline-success {
            background: transparent;
            color: var(--accent-color);
            border: 2px solid var(--accent-color);
        }
        
        .btn-outline-success:hover {
            background: var(--gradient-accent);
            color: white;
        }
        
        /* Cards */
        .card {
            background: white;
            border: none;
            border-radius: 20px;
            box-shadow: var(--shadow-md);
            transition: all 0.3s ease;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-lg);
        }
        
        /* Product Cards */
        .product-card {
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow-md);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            position: relative;
        }
        
        .product-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, var(--accent-color) 0%, transparent 70%);
            transition: all 0.6s ease;
            z-index: 1;
        }
        
        .product-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: var(--shadow-lg);
        }
        
        .product-card:hover::before {
            top: -30%;
            left: -30%;
            width: 160%;
            height: 160%;
        }
        
        .product-image-container {
            position: relative;
            overflow: hidden;
            border-radius: 20px 20px 0 0;
            background: var(--light-color);
        }
        
        .product-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            transition: all 0.4s ease;
        }
        
        .product-card:hover .product-image {
            transform: scale(1.05);
        }
        
        .product-badges {
            position: absolute;
            top: 1rem;
            right: 1rem;
            z-index: 2;
        }
        
        .product-body {
            padding: 2rem;
            background: white;
        }
        
        .product-title {
            font-family: 'Merriweather', serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }
        
        .product-price {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .product-description {
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        
        .product-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }
        
        /* Search */
        .search-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
        }
        
        .form-control, .form-select {
            border: 2px solid var(--border-color);
            border-radius: 12px;
            padding: 1rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(45, 125, 50, 0.25);
            outline: none;
        }
        
        /* Animations */
        @keyframes floatUp {
            0% {
                transform: translateY(30px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .float-up {
            animation: floatUp 0.6s ease-out;
        }
        
        @keyframes fadeInUp {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .display-1 {
                font-size: 2.5rem;
            }
            
            .product-actions {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }
            
            .navbar {
                padding: 0.75rem 0;
            }
            
            .product-image {
                height: 200px;
            }
        }
        
        @media (max-width: 576px) {
            .display-1 {
                font-size: 2rem;
            }
            
            .product-card {
                margin-bottom: 1.5rem;
            }
        }
    </style>
</head>
<body>
    @include('partials.navigation')
    
    <main>
        @yield('content')
    </main>
    
    @include('partials.footer')
    
    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: false,
            mirror: false
        });
    </script>
    
    @yield('scripts')
</body>
</html>
