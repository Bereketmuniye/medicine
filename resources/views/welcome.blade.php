<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>HerbMed Ethiopia – Traditional Herbal Medicine & Natural Products</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  
  <style>
    :root {
      --primary: #2e7d32;      /* forest green */
      --primary-dark: #1b5e20;
      --secondary: #f57c00;     /* orange CTA */
      --light: #f8f9fa;
      --gray: #6c757d;
    }
    body { font-family: 'Roboto', sans-serif; }
    h1, h2, h3, .display-4 { font-family: 'Playfair Display', serif; }
    
    .hero {
      position: relative;
      min-height: 90vh;
      color: white;
      overflow: hidden;
    }
    
    .hero-video {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      object-fit: cover;
      z-index: 1;
      filter: brightness(0.85) saturate(1.15); /* subtle natural enhancement */
    }
    
    .hero-overlay {
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.55); /* semi-transparent dark overlay for readability */
      z-index: 2;
    }
    
    .hero-content {
      position: relative;
      z-index: 3;
    }
    
    .form-control, .form-select { height: 60px; border-radius: 12px; }
    .btn-search { background: var(--secondary); border: none; height: 60px; border-radius: 12px; }
    
    .card { 
      border: none; 
      box-shadow: 0 8px 24px rgba(0,0,0,0.08); 
      transition: all 0.3s; 
    }
    .card:hover { transform: translateY(-8px); box-shadow: 0 16px 40px rgba(0,0,0,0.12); }
    
    .icon-circle { 
      width: 80px; height: 80px; 
      background: rgba(46,125,50,0.1); 
      border-radius: 50%; 
      display: flex; align-items: center; justify-content: center; 
      margin: 0 auto 20px; 
    }
    
    .badge-custom { background: var(--primary); }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold fs-3" href="#">HerbMed Ethiopia</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Shop Herbs</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Guides & Books</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Consultation</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
      </ul>
      <ul class="navbar-nav ms-3 align-items-center">
        <li class="nav-item"><a class="nav-link" href="#"><i class="bi bi-heart fs-5"></i></a></li>
        <li class="nav-item position-relative"><a class="nav-link" href="#"><i class="bi bi-cart3 fs-5"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">2</span></a></li>
        <li class="nav-item ms-2"><a class="btn btn-outline-light btn-sm px-3" href="#">Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero with Moving Video Background -->
<section class="hero d-flex align-items-center">
  <video 
    class="hero-video" 
    autoplay 
    muted 
    loop 
    playsinline 
    poster="https://images.unsplash.com/photo-1617890686218-1a18a41f2e42?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
  >
    <source src="assets/videos/gentle-herbs-loop.mp4" type="video/mp4">
    <!-- Fallback image if video doesn't load -->
    <img src="https://images.unsplash.com/photo-1617890686218-1a18a41f2e42?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" alt="Herbal background fallback">
  </video>
  
  <div class="hero-overlay"></div>

  <div class="container hero-content">
    <div class="row justify-content-center">
      <div class="col-lg-9 text-center">
        <h1 class="display-3 fw-bold mb-4">Natural Healing from Ethiopia's Heritage</h1>
        <p class="lead fs-4 mb-5">Discover authentic herbal remedies, traditional medicine guides, books and expert consultations for better health.</p>
        
        <div class="bg-white bg-opacity-95 text-dark p-4 p-md-5 rounded-4 shadow-lg">
          <form class="row g-3">
            <div class="col-md-3">
              <select class="form-select" aria-label="Category">
                <option selected>Any Category</option>
                <option>Respiratory & Cold</option>
                <option>Digestive Health</option>
                <option>Immunity & Energy</option>
                <option>Skin & Beauty</option>
                <option>Books & Guides</option>
                <option>Women's Health</option>
              </select>
            </div>
            <div class="col-md-5">
              <input type="text" class="form-control" placeholder="Search by symptom, herb, disease or book title...">
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-search text-white w-100 fw-bold fs-5">
                <i class="bi bi-search me-2"></i> Find Remedy
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Trust Badges -->
<section class="py-4 bg-light border-bottom">
  <div class="container">
    <div class="row text-center g-4 align-items-center">
      <div class="col-6 col-md"><i class="bi bi-shield-check fs-1 text-success"></i><p class="mb-0 fw-bold">100% Natural</p></div>
      <div class="col-6 col-md"><i class="bi bi-currency-exchange fs-1 text-success"></i><p class="mb-0 fw-bold">Affordable Prices</p></div>
      <div class="col-6 col-md"><i class="bi bi-truck fs-1 text-success"></i><p class="mb-0 fw-bold">Nationwide Delivery</p></div>
      <div class="col-6 col-md"><i class="bi bi-lock fs-1 text-success"></i><p class="mb-0 fw-bold">Secure Payment</p></div>
      <div class="col-6 col-md"><i class="bi bi-headset fs-1 text-success"></i><p class="mb-0 fw-bold">24/7 Support</p></div>
    </div>
  </div>
</section>

<!-- Featured Products -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center display-5 fw-bold mb-5">Popular Herbal Products</h2>
    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <div class="card h-100">
          <img src="https://media.istockphoto.com/id/1018746220/video/closeup-of-moringa-tree-leaves-with-rain-drops.jpg?s=640x640&k=20&c=gzXkMd5nuG8F2RU5j0wCP-Hd0e3rO87toiiXqkgmYDI=" class="card-img-top" alt="Moringa" style="height:240px; object-fit:cover;">
          <div class="card-body text-center">
            <h5 class="card-title">Organic Moringa Powder</h5>
            <p class="text-success fs-4 fw-bold mb-2">450 ETB</p>
            <p class="text-muted small mb-3">Energy, immunity & nutrition booster – 250g</p>
            <a href="#" class="btn btn-outline-success"><i class="bi bi-cart-plus me-2"></i>Add to Cart</a>
          </div>
        </div>
      </div>
      <!-- Add more product cards here -->
    </div>
  </div>
</section>

<!-- Categories -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center display-5 fw-bold mb-5">Explore Healing Categories</h2>
    <div class="row g-4 text-center">
      <div class="col-6 col-md-3 col-lg-2">
        <div class="icon-circle"><i class="bi bi-lungs fs-2 text-success"></i></div>
        <h5>Respiratory</h5>
      </div>
      <div class="col-6 col-md-3 col-lg-2">
        <div class="icon-circle"><i class="bi bi-cup-hot fs-2 text-success"></i></div>
        <h5>Digestive</h5>
      </div>
      <!-- Add more categories -->
    </div>
  </div>
</section>

<!-- How it Works -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center display-5 fw-bold mb-5">How It Works</h2>
    <div class="row g-5 text-center">
      <div class="col-md-4">
        <div class="icon-circle mx-auto"><span class="fs-2 fw-bold text-success">1</span></div>
        <h4>Browse & Search</h4>
        <p class="text-muted">Find the right herb, remedy or book using our smart search.</p>
      </div>
      <div class="col-md-4">
        <div class="icon-circle mx-auto"><span class="fs-2 fw-bold text-success">2</span></div>
        <h4>Order Securely</h4>
        <p class="text-muted">Add to cart, checkout safely with multiple payment options.</p>
      </div>
      <div class="col-md-4">
        <div class="icon-circle mx-auto"><span class="fs-2 fw-bold text-success">3</span></div>
        <h4>Receive & Heal</h4>
        <p class="text-muted">Fast delivery + usage guide included with every order.</p>
      </div>
    </div>
  </div>
</section>

<!-- Why Choose Us -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center display-5 fw-bold mb-5">Why HerbMed Ethiopia?</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100 text-center p-4">
          <i class="bi bi-leaf fs-1 text-success mb-3"></i>
          <h4>100% Authentic Ethiopian Herbs</h4>
          <p class="text-muted">Sourced directly from trusted local farmers and traditional healers.</p>
        </div>
      </div>
      <!-- Add more advantages -->
    </div>
  </div>
</section>

<!-- Testimonials -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center display-5 fw-bold mb-5">What Our Customers Say</h2>
    <div id="testimonials" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active text-center px-4">
          <p class="lead fst-italic">"The moringa powder gave me real energy – no more afternoon fatigue!"</p>
          <p class="fw-bold">Abeba T. – Addis Ababa</p>
        </div>
        <!-- Add more testimonials -->
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonials" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span></button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonials" data-bs-slide="next"><span class="carousel-control-next-icon"></span></button>
    </div>
  </div>
</section>

<!-- Latest Blog -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center display-5 fw-bold mb-5">Traditional Medicine Insights</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card h-100">
          <img src="https://blog.mountainroseherbs.com/hs-fs/hubfs/Blog%20images/Herbs%20for%20The%20Moon%20Cycles%20Horizontal.jpg?width=900&height=600&name=Herbs%20for%20The%20Moon%20Cycles%20Horizontal.jpg" class="card-img-top" alt="Blog" style="height:200px; object-fit:cover;">
          <div class="card-body">
            <h5>Top 8 Ethiopian Herbs for Diabetes Control</h5>
            <p class="text-muted small">Time-tested natural solutions used for generations...</p>
            <a href="#" class="btn btn-outline-primary stretched-link">Read Article</a>
          </div>
        </div>
      </div>
      <!-- Add more blog cards -->
    </div>
  </div>
</section>

<!-- Newsletter -->
<section class="py-5 text-white text-center" style="background: var(--primary-dark);">
  <div class="container">
    <h2 class="display-5 fw-bold mb-4">Stay Updated with Natural Healing Tips</h2>
    <p class="lead mb-4">Subscribe for exclusive remedies, discounts & new product alerts.</p>
    <form class="row justify-content-center g-3">
      <div class="col-md-5">
        <input type="email" class="form-control form-control-lg rounded-pill" placeholder="Your email address">
      </div>
      <div class="col-md-auto">
        <button type="submit" class="btn btn-secondary btn-lg px-5 rounded-pill fw-bold">Subscribe</button>
      </div>
    </form>
  </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <h4 class="fw-bold">HerbMed Ethiopia</h4>
        <p>Reviving ancient Ethiopian wisdom with modern natural wellness.</p>
      </div>
      <div class="col-md-2">
        <h5>Shop</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white text-decoration-none">Herbal Products</a></li>
          <li><a href="#" class="text-white text-decoration-none">Books & Guides</a></li>
          <li><a href="#" class="text-white text-decoration-none">Best Sellers</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Resources</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white text-decoration-none">Blog</a></li>
          <li><a href="#" class="text-white text-decoration-none">Consultation</a></li>
          <li><a href="#" class="text-white text-decoration-none">FAQs</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Contact</h5>
        <p>Addis Ababa, Ethiopia<br>+251 9xx xxx xxx<br>info@herbmed.et</p>
      </div>
    </div>
    <hr class="my-4 opacity-50">
    <p class="text-center mb-0">© 2026 HerbMed Ethiopia – All rights reserved.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>