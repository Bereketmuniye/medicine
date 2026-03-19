<section class="contact-section" id="contact">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="contact-info">
                    <span class="section-subtitle" style="color: var(--primary-light);">ያግኙን</span>
                    <h3>አድራሻችን</h3>
                    <p>ስለ ምርቶቻችን ወይም ጥንታዊ ሕክምና ጥያቄዎች አሉዎት? በማንኛውም ጊዜ ይደውሉልን። የባለሙያዎቻችን ቡድን በጤና ጉዞዎ ላይ ለመርዳት ዝግጁ ነው።</p>
                    
                    <ul class="contact-details">
                        <li>
                            <i class="bi bi-geo-alt"></i>
                            <span>ቦሌ መንገድ፣ አዲስ አበባ፣ ኢትዮጵያ</span>
                        </li>
                        <li>
                            <i class="bi bi-telephone"></i>
                            <span>{{ $owner_phone ?? '+251 911 234 567' }}</span>
                        </li>
                        <li>
                            <i class="bi bi-envelope"></i>
                            <span>{{ $contact_email ?? 'hello@herbmed.et' }}</span>
                        </li>
                        <li>
                            <i class="bi bi-clock"></i>
                            <span>ሰኞ - ዓርብ: 9:00 ጠዋት - 6:00 ሰዓት</span>
                        </li>
                    </ul>
                    
                    <div class="contact-social">
                        @if($socialAccounts->isNotEmpty())
                            @foreach($socialAccounts as $account)
                                <a href="{{ $account->url }}" target="_blank" rel="noopener noreferrer">
                                    <i class="bi bi-{{ $account->platform }}"></i>
                                </a>
                            @endforeach
                        @else
                            <a href="#"><i class="bi bi-facebook"></i></a>
                            <a href="#"><i class="bi bi-instagram"></i></a>
                            <a href="#"><i class="bi bi-twitter-x"></i></a>
                            <a href="#"><i class="bi bi-youtube"></i></a>
                            <a href="#"><i class="bi bi-telegram"></i></a>
                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="contact-form">
                    <h4>መልዕክት ይላኩልን</h4>
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="ስምዎ" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="ኢሜይልዎ" required>
                            </div>
                            <div class="col-12">
                                <input type="text" name="subject" class="form-control" placeholder="ርዕሰ ጉዳይ" required>
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control" rows="4" placeholder="መልዕክትዎ" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">መልዕክት ይላኩ</button>
                            </div>
                        </div>
                    </form>
                    <div id="contactMessage" class="contact-message"></div>
                </div>
            </div>
        </div>
    </div>
</section>
