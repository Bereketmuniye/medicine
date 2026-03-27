<nav class="navbar navbar-expand-lg" id="mainNav" itemscope itemtype="https://schema.org/Organization">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('welcome') }}" itemprop="url">
            <img src="{{ asset('images/shalom-logo-transparent.png') }}" alt="SHALOM HERBAL HEALING" style="height: 50px; width: auto;" itemprop="logo">
            <div class="d-flex flex-column" style="line-height: 1;">
                <span class="brand-text" style="font-size: 1.2rem; font-weight: 800; letter-spacing: 1px;" itemprop="name">{{ __('messages.title') }}</span>
                <span class="brand-subtext" style="font-size: 0.6rem; font-weight: 500; color: var(--primary-light); letter-spacing: 2px;">{{ __('messages.herbal_medicine') }}</span>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('welcome') ? 'active' : '' }}" href="{{ request()->routeIs('welcome') ? '#home' : route('welcome') }}">{{ __('messages.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ request()->routeIs('welcome') ? '#about' : route('welcome').'#about' }}">{{ __('messages.about') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="plantsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('messages.plants') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="plantsDropdown">
                        <li><h6 class="dropdown-header">{{ __('messages.medicinal_plants') }}</h6></li>
                        @forelse($featuredPlants ?? App\Models\Plant::orderBy('name')->take(8)->get() as $plant)
                            <li><a class="dropdown-item" href="{{ route('welcome') }}#plants">{{ $plant->name }}</a></li>
                        @empty
                            <li><a class="dropdown-item disabled" href="#">{{ __('messages.no_plants_available') }}</a></li>
                        @endforelse
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('welcome') }}#plants">{{ __('messages.view_all_plants') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ request()->routeIs('welcome') ? '#videos' : route('welcome').'#videos' }}">{{ __('messages.videos') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ request()->routeIs('welcome') ? '#contact' : route('welcome').'#contact' }}">{{ __('messages.contact') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}" href="{{ route('articles.index') }}">{{ __('messages.articles') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}" href="{{ route('books.index') }}">{{ __('messages.books') }}</a>
                </li>
            </ul>
            <!-- Language Dropdown -->
            <div class="dropdown">
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-globe"></i> {{ app()->getLocale() === 'am' ? 'አማ' : 'EN' }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}">
                            English
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item {{ app()->getLocale() === 'am' ? 'active' : '' }}" href="{{ request()->fullUrlWithQuery(['lang' => 'am']) }}">
                            አማርኛ
                        </a>
                    </li>
                </ul>
            </div>
            <!-- <div class="d-flex align-items-center">
                <a href="{{ route('login') }}" class="btn-account">ACCOUNT</a>
            </div> -->
        </div>
    </div>
</nav>

    </div>
</nav>
