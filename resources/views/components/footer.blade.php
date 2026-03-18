<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="footer-logo mb-4">
                    <img src="{{ asset('images/shalom-logo-transparent.png') }}" alt="ሻሎም አትክልት ሕክምና" style="height: 60px; width: auto; filter: brightness(0) invert(1);">
                    <div class="mt-2 d-flex flex-column" style="line-height: 1;">
                        <span style="font-size: 1.4rem; font-weight: 800; letter-spacing: 1px;">ሻሎም</span>
                        <span style="font-size: 0.7rem; font-weight: 500; color: var(--primary-light); letter-spacing: 2px;">የዕጽዋት ህክምና</span>
                    </div>
                </div>
                <p class="footer-text">የኢትዮጵያን የሕክምና እጽዋቶች ቅርስ በሳይንስና ታሪክ በኩል እንለማማለን። ከአካልዊ መድኃኒቶች በእውነተኛነት የተገኙ።</p>
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
                <h5>ይግዙ</h5>
                <ul>
                    <li><a href="#">የዕጽዋት ኤክስትራክት</a></li>
                    <li><a href="#">የደረቁ ሥሮች</a></li>
                    <li><a href="#">ጥንታዊ መጻሕፍት</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <h5>ድጋፍ</h5>
                <ul>
                    <li><a href="#">ተደጋጋሚ ጥያቄዎች</a></li>
                    <li><a href="#">ማዘዣ</a></li>
                    <li><a href="#">ያግኙን</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h5>ሳምንታዊ ጥበብ</h5>
                <p class="footer-text">ስለ ወቅታዊ ሕክምናዎች መመሪያዎችን ለማግኘት ይመዝገቡ።</p>
                <form class="newsletter-form" id="newsletterForm">
                    @csrf
                    <input type="email" name="email" placeholder="ኢሜይል አድራሻ" required>
                    <button type="submit">ይመዝገቡ</button>
                </form>
                <div id="newsletterMessage" class="newsletter-message"></div>
            </div>
        </div>
        <div class="footer-bottom">
            © 2026 HERBMED ETHIOPIA. መብቱ የተጠበቀ።
        </div>
    </div>
</footer>
