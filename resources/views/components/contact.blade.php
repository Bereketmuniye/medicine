<section class="contact-section" id="contact">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <div class="contact-info">
                    <span class="section-subtitle" style="color: var(--primary-light);">GET IN TOUCH</span>
                    <h3>Let's Connect</h3>
                    <p>Have questions about our products or traditional medicine? Reach out to us anytime. Our team of experts is here to help you on your wellness journey.</p>
                    
                    <ul class="contact-details">
                        <li>
                            <i class="bi bi-geo-alt"></i>
                            <span>Bole Road, Addis Ababa, Ethiopia</span>
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
                            <span>Mon - Fri: 9:00 AM - 6:00 PM</span>
                        </li>
                    </ul>
                    
                    <div class="contact-social">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                        <a href="#"><i class="bi bi-telegram"></i></a>
                        <a href="#"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left">
                <div class="contact-form">
                    <h4>Send us a Message</h4>
                    <form id="contactForm">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                            </div>
                            <div class="col-12">
                                <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                            </div>
                            <div class="col-12">
                                <textarea name="message" class="form-control" rows="4" placeholder="Your Message" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
                            </div>
                        </div>
                    </form>
                    <div id="contactMessage" class="contact-message"></div>
                </div>
            </div>
        </div>
    </div>
</section>
