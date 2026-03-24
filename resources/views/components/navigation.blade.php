<nav class="navbar navbar-expand-lg" id="mainNav" itemscope itemtype="https://schema.org/Organization">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('welcome') }}" itemprop="url">
            <img src="{{ asset('images/shalom-logo-transparent.png') }}" alt="SHALOM HERBAL HEALING" style="height: 50px; width: auto;" itemprop="logo">
            <div class="d-flex flex-column" style="line-height: 1;">
                <span class="brand-text" style="font-size: 1.2rem; font-weight: 800; letter-spacing: 1px;" itemprop="name">ሻሎም</span>
                <span class="brand-subtext" style="font-size: 0.6rem; font-weight: 500; color: var(--primary-light); letter-spacing: 2px;">የዕጽዋት ህክምና</span>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}" href="{{ request()->routeIs('welcome') ? '#home' : route('welcome') }}">መነሻ ገጽ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ request()->routeIs('welcome') ? '#about' : route('welcome').'#about' }}">ስለ እኛ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ request()->routeIs('welcome') ? '#videos' : route('welcome').'#videos' }}">ቪዲዮዎች</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ request()->routeIs('welcome') ? '#contact' : route('welcome').'#contact' }}">በዚህ ያግኙን</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}" href="{{ route('articles.index') }}">ጽሑፍ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">መጻሕፍት</a>
                </li>
            </ul>
            <!-- <div class="d-flex align-items-center">
                <a href="{{ route('login') }}" class="btn-account">ACCOUNT</a>
            </div> -->
        </div>
    </div>
</nav>
