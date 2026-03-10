<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Medicine App</title>
    
    <!-- Premium Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('css/management.css') }}">
    
    @yield('styles')
</head>
<body>

    <!-- Sidebar Component -->
    <x-sidebar />

    <div class="main-wrapper">
        <!-- Top Navbar -->
        <header class="top-navbar">
            <div class="nav-left">
                <button class="btn d-lg-none" id="toggleSidebar">
                    <i class="fa-solid fa-bars"></i>
                </button>
                <div class="search-bar d-none d-md-flex align-items-center bg-light px-3 py-2 rounded-pill">
                    <i class="fa-solid fa-magnifying-glass text-secondary me-2"></i>
                    <input type="text" placeholder="Search anything..." class="border-0 bg-transparent" style="outline: none; font-size: 0.85rem;">
                </div>
            </div>
            
            <div class="nav-right d-flex align-items-center gap-3">
                <button class="btn position-relative">
                    <i class="fa-solid fa-bell text-secondary"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
                </button>
                <div class="divider mx-2 bg-light" style="width: 1px; height: 30px;"></div>
                <span class="text-sm font-medium d-none d-sm-block">{{ date('D, M j, Y') }}</span>
            </div>
        </header>

        <main class="content-body">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('show');
        });
    </script>
    @yield('scripts')
</body>
</html>
