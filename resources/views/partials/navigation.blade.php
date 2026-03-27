<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow sticky-top">
  <div class="container">
    <a class="navbar-brand fw-bold fs-3" href="{{ route('welcome') }}">HerbMed Ethiopia</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}">
            <i class="bi bi-house me-2"></i>Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('products.search') ? 'active' : '' }}" href="{{ route('products.search') }}">
            <i class="bi bi-search me-2"></i>Search
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-grid me-2"></i>Shop Herbs
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-book me-2"></i>Guides & Books
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-person me-2"></i>Consultation
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-envelope me-2"></i>Contact
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ms-3 align-items-center">
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-heart fs-5"></i>
          </a>
        </li>
        <li class="nav-item position-relative">
          <a class="nav-link" href="#">
            <i class="bi bi-cart3 fs-5"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning text-dark">2</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="bi bi-person-circle fs-5"></i>
          </a>
        </li>
        <li class="nav-item ms-2">
          <a class="nav-link btn btn-outline-light btn-sm px-3" href="#">
            <i class="bi bi-box-arrow-in-right me-2"></i>Login
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
    // Mobile Navigation Self-Closing Fix (Robust version)
    document.addEventListener('click', function (e) {
        if (e.target.closest('.navbar-nav .nav-link') || e.target.closest('.dropdown-item')) {
            if (window.innerWidth < 992) { // Only on mobile
                const menuToggle = document.getElementById('nav') || document.getElementById('navbarNav');
                if (menuToggle && menuToggle.classList.contains('show')) {
                    const bsCollapse = (window.bootstrap && window.bootstrap.Collapse) 
                        ? (window.bootstrap.Collapse.getInstance(menuToggle) || new window.bootstrap.Collapse(menuToggle, {toggle: false}))
                        : null;
                    
                    if (bsCollapse) {
                        bsCollapse.hide();
                    } else if (typeof bootstrap !== 'undefined' && bootstrap.Collapse) {
                        const bsColl = bootstrap.Collapse.getInstance(menuToggle) || new bootstrap.Collapse(menuToggle, {toggle: false});
                        bsColl.hide();
                    }
                }
            }
        }
    });
</script>
