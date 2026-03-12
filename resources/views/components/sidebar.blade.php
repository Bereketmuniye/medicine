<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('images/shalom-logo.png') }}" alt="SHALOM HERBAL HEALING" class="logo-image">
    </div>
    
    <nav class="sidebar-nav">
        <div class="nav-label">Main Overview</div>
        <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fa-solid fa-house"></i>
            <span>Dashboard</span>
        </a>
        
        <div class="nav-label mt-4">Educational Hub</div>
        <a href="{{ route('admin.articles.index') }}" class="nav-item {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
            <i class="fa-solid fa-graduation-cap"></i>
            <span>Educational Content</span>
        </a>
        <a href="{{ route('admin.categories.index') }}" class="nav-item {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
            <i class="fa-solid fa-tags"></i>
            <span>Categories</span>
        </a>
        <a href="{{ route('admin.plants.index') }}" class="nav-item {{ request()->routeIs('admin.plants.*') ? 'active' : '' }}">
            <i class="fa-solid fa-leaf"></i>
            <span>Medicinal Plants</span>
        </a>
        <a href="{{ route('admin.videos.index') }}" class="nav-item {{ request()->routeIs('admin.videos.*') ? 'active' : '' }}">
            <i class="fa-solid fa-play"></i>
            <span>Video Tutorial</span>
        </a>
        
        <div class="nav-label mt-4">Commerce & Books</div>
        <a href="{{ route('admin.books.index') }}" class="nav-item {{ request()->routeIs('admin.books.*') ? 'active' : '' }}">
            <i class="fa-solid fa-book"></i>
            <span>Book Store</span>
        </a>

        <div class="nav-label mt-4">Online Presence</div>
        <a href="{{ route('admin.social-media.index') }}" class="nav-item {{ request()->routeIs('admin.social-media.*') ? 'active' : '' }}">
            <i class="fa-brands fa-instagram"></i>
            <span>Social Media</span>
        </a>
        <a href="{{ route('admin.promotions.index') }}" class="nav-item {{ request()->routeIs('admin.promotions.*') ? 'active' : '' }}">
            <i class="fa-solid fa-bullhorn"></i>
            <span>Promotions</span>
        </a>
        
        <div class="nav-label mt-4">Management</div>
        <a href="{{ route('admin.subscribers.index') }}" class="nav-item {{ request()->routeIs('admin.subscribers.*') ? 'active' : '' }}">
            <i class="fa-solid fa-users"></i>
            <span>Subscribers</span>
        </a>
        <a href="/admin/contacts" class="nav-item {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}" style="display: flex !important; visibility: visible !important;">
            <i class="fa-solid fa-envelope"></i>
            <span>Contact Messages</span>
        </a>
        <a href="{{ route('admin.settings.index') }}" class="nav-item {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
            <i class="fa-solid fa-gear"></i>
            <span>Settings</span>
        </a>
    </nav>
    
    <div class="sidebar-footer">
        <div class="user-profile">
            <div class="user-avatar">
               {{ substr(Auth::user()->name ?? 'U', 0, 1) }}
            </div>
            <div class="user-info">
                <span class="user-name">{{ Auth::user()->name ?? 'User' }}</span>
                <span class="user-role">Administrator</span>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="ms-2">
                @csrf
                <button type="submit" class="btn btn-link p-0 text-secondary" title="Logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </button>
            </form>
        </div>
    </div>
</aside>
