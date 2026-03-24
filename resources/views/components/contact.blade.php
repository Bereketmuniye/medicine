<section class="contact-section" id="contact">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="contact-info">
                    <span class="section-subtitle" style="color: var(--primary-light);">{{ __('messages.contact') }}</span>
                    <h3>{{ __('messages.contact_title') }}</h3>
                    <p>{{ __('messages.contact_description') }}</p>
                    
                    <ul class="contact-details">
                        <li>
                            <i class="bi bi-geo-alt"></i>
                            <span>{{ __('messages.address') }}</span>
                        </li>
                        <li>
                            <i class="bi bi-telephone"></i>
                            <a href="tel:{{ __('messages.phone') }}" style="text-decoration: none; color: inherit;">{{ __('messages.phone') }}</a>
                        </li>
                        <li>
                            <i class="bi bi-envelope"></i>
                            <span>{{ __('messages.email') }}</span>
                        </li>
                        <li>
                            <i class="bi bi-clock"></i>
                            <span>{{ __('messages.hours') }}</span>
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
                    <h4>{{ __('messages.send_message') }}</h4>
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="{{ __('messages.your_name') }}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="{{ __('messages.your_email') }}" required>
                            </div>
                            <div class="col-12">
                                <input type="text" name="subject" class="form-control" placeholder="{{ __('messages.subject') }}" required>
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control" rows="4" placeholder="{{ __('messages.message') }}" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">{{ __('messages.send_message') }}</button>
                            </div>
                        </div>
                    </form>
                    <div id="contactMessage" class="contact-message"></div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Google Maps Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="map-container">
                    <h4 class="text-center mb-4">{{ __('messages.find_us') }}</h4>
                    <iframe 
                        src="https://www.google.com/maps?q=Kotebe+Teaching+College,Mesalemiya,Addis+Ababa&output=embed"
                        width="100%" 
                        height="400" 
                        style="border:0; border-radius: 10px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
