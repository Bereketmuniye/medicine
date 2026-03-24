<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-logo mb-4">
                    <img src="{{ asset('images/shalom-logo-transparent.png') }}" alt="{{ __('messages.logo_alt') }}" style="height: 60px; width: auto; filter: brightness(0) invert(1);">
                    <div class="mt-2 d-flex flex-column" style="line-height: 1;">
                        <span style="font-size: 1.4rem; font-weight: 800; letter-spacing: 1px;">{{ __('messages.title') }}</span>
                        <span style="font-size: 0.7rem; font-weight: 500; color: var(--primary-light); letter-spacing: 2px;">{{ __('messages.herbal_medicine') }}</span>
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
                <h5>{{ __('messages.follow_us') }}</h5>
                <ul>
                    <li><a href="#">{{ __('messages.herbal_extracts') }}</a></li>
                    <li><a href="#">{{ __('messages.dry_herbs') }}</a></li>
                    <li><a href="#">{{ __('messages.traditional_books') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h5>{{ __('messages.support') }}</h5>
                <ul>
                    <li><a href="#">{{ __('messages.frequent_questions') }}</a></li>
                    <li><a href="#">{{ __('messages.ordering') }}</a></li>
                    <li><a href="#">{{ __('messages.contact_us_footer') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5>{{ __('messages.newsletter_title') }}</h5>
                <p class="footer-text">{{ __('messages.newsletter_desc') }}</p>
                <form class="newsletter-form" id="newsletterForm">
                    @csrf
                    <input type="email" name="email" placeholder="{{ __('messages.your_email_placeholder') }}" required>
                    <button type="submit">{{ __('messages.subscribe') }}</button>
                </form>
                <div id="newsletterMessage" class="newsletter-message"></div>
            </div>
        </div>
        <div class="footer-bottom">
            © 2026 HERBMED ETHIOPIA. {{ __('messages.all_rights_reserved') }}
        </div>
    </div>
</footer>
