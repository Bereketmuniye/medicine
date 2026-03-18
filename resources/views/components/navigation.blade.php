<nav class="navbar navbar-expand-lg" id="mainNav" itemscope itemtype="https://schema.org/Organization">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('welcome') }}" itemprop="url">
            <img src="{{ asset('images/shalom-logo-transparent.png') }}" alt="SHALOM HERBAL HEALING" style="height: 50px; width: auto;" itemprop="logo">
            <div class="d-flex flex-column" style="line-height: 1;">
                <span class="brand-text" style="font-size: 1.2rem; font-weight: 800; letter-spacing: 1px;" itemprop="name">SHALOM</span>
                <span class="brand-subtext" style="font-size: 0.6rem; font-weight: 500; color: var(--primary-light); letter-spacing: 2px;">HERBAL HEALING</span>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <div class="ceo-section me-3" itemscope itemtype="https://schema.org/Person">
                <span class="ceo-badge" itemprop="jobTitle">CEO</span>
                <span class="ceo-name" itemprop="name">Dr. Shalom</span>
            </div>
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}" href="{{ request()->routeIs('welcome') ? '#home' : route('welcome') }}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ request()->routeIs('welcome') ? '#about' : route('welcome').'#about' }}">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ request()->routeIs('welcome') ? '#videos' : route('welcome').'#videos' }}">VIDEOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ request()->routeIs('welcome') ? '#contact' : route('welcome').'#contact' }}">CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}" href="{{ route('articles.index') }}">LITERATURE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">BOOKS</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <a href="{{ route('login') }}" class="btn-account">ACCOUNT</a>
            </div>
        </div>
    </div>
</nav>
