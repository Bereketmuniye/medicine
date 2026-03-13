<nav class="navbar navbar-expand-lg" id="mainNav">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('welcome') }}">
            <img src="{{ asset('images/shalom-logo-transparent.png') }}" alt="SHALOM HERBAL HEALING" style="height: 50px; width: auto;">
            <div class="d-flex flex-column" style="line-height: 1;">
                <span class="brand-text" style="font-size: 1.2rem; font-weight: 800; letter-spacing: 1px;">SHALOM</span>
                <span class="brand-subtext" style="font-size: 0.6rem; font-weight: 500; color: var(--primary-light); letter-spacing: 2px;">HERBAL HEALING</span>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#home">HOME</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#remedies">REMEDIES</a>
                </li> -->
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
                <a href="{{ route('login') }}" class="btn-account">ACCOUNT</a>
            </div>
        </div>
    </div>
</nav>
