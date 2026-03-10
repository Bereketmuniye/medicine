<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-logo">HERBMED<span>.</span>ET</div>
                <p class="footer-text">Reviving the heritage of Ethiopian medicinal plants through science and storytelling. Authentically sourced from local healers.</p>
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
                <h5>SHOP</h5>
                <ul>
                    <li><a href="#">Herbal Extracts</a></li>
                    <li><a href="#">Dry Roots</a></li>
                    <li><a href="#">Ancient Books</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h5>SUPPORT</h5>
                <ul>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5>WEEKLY WISDOM</h5>
                <p class="footer-text">Subscribe to receive guides on seasonal remedies.</p>
                <form class="newsletter-form" id="newsletterForm">
                    <input type="email" name="email" placeholder="Email Address" required>
                    <button type="submit">JOIN</button>
                </form>
                <div id="newsletterMessage" class="newsletter-message"></div>
            </div>
        </div>
        <div class="footer-bottom">
            © 2026 HERBMED ETHIOPIA. ALL RIGHTS RESERVED.
        </div>
    </div>
</footer>
