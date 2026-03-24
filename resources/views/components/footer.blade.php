<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-logo mb-4">
                    <div class="mt-2 d-flex flex-column" style="line-height: 1;">
                        <span style="font-size: 1.2rem; font-weight: 800; letter-spacing: 1px;">{{ __('messages.title') }}</span>
                        <span style="font-size: 0.6rem; font-weight: 500; color: var(--primary-light); letter-spacing: 2px;">{{ __('messages.herbal_medicine') }}</span>
                    </div>
                </div>
                <p class="footer-text">{{ __('messages.footer_description') }}</p>
                <div class="social-links">
                    @if(isset($socialAccounts) && $socialAccounts->isNotEmpty())
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
                <h5>{{ __('messages.support') }}</h5>
                <ul>
                    <li><a href="{{ request()->routeIs('welcome') ? '#home' : route('welcome') }}">{{ __('messages.home') }}</a></li>
                    <li><a href="{{ request()->routeIs('welcome') ? '#about' : route('welcome').'#about' }}">{{ __('messages.about') }}</a></li>
                    <li><a href="{{ request()->routeIs('welcome') ? '#videos' : route('welcome').'#videos' }}">{{ __('messages.videos') }}</a></li>
                    <li><a href="{{ request()->routeIs('welcome') ? '#contact' : route('welcome').'#contact' }}">{{ __('messages.contact') }}</a></li>
                    <li><a href="{{ route('articles.index') }}">{{ __('messages.articles') }}</a></li>
                    <li><a href="{{ route('books.index') }}">{{ __('messages.books') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5>{{ __('messages.newsletter_title') }}</h5>
                <p class="footer-text">{{ __('messages.newsletter_desc') }}</p>
                <form class="newsletter-form" id="newsletterForm">
                    @csrf
                    <div class="newsletter-input-group">
                        <input type="email" name="email" placeholder="{{ __('messages.your_email_placeholder') }}" required>
                        <button type="submit">{{ __('messages.subscribe') }}</button>
                    </div>
                </form>
                <div id="newsletterMessage" class="newsletter-message"></div>
            </div>
        </div>
        <div class="footer-bottom">
            © 2026 HERBMED ETHIOPIA. {{ __('messages.all_rights_reserved') }}
        </div>
    </div>
</footer>

<style>
.newsletter-form {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.newsletter-input-group {
    display: flex;
    gap: 0.5rem;
}

.newsletter-input-group input {
    flex: 1;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 0.9rem;
}

.newsletter-input-group button {
    padding: 0.75rem 1.5rem;
    background: var(--primary);
    color: white;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 500;
    transition: background 0.3s ease;
}

.newsletter-input-group button:hover {
    background: #2a1f02;
}

@media (max-width: 768px) {
    .newsletter-input-group {
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .newsletter-input-group input,
    .newsletter-input-group button {
        width: 100%;
    }
}
</style>
