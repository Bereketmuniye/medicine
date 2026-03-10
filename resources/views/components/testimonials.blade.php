@if($testimonials && count($testimonials) > 0)
<section class="testimonials-section">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">TESTIMONIALS</span>
            <h2 class="section-title">What our <span>customers say</span></h2>
        </div>
        
        <div class="row g-4">
            @foreach($testimonials as $testimonial)
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="testimonial-card">
                        <div class="testimonial-stars">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="bi bi-star{{ $i <= ($testimonial['rating'] ?? 5) ? '-fill' : '' }}"></i>
                            @endfor
                        </div>
                        <p class="testimonial-content">"{{ $testimonial['content'] }}"</p>
                        <div class="testimonial-author">
                            <div class="author-avatar">
                                {{ substr($testimonial['author'], 0, 1) }}
                            </div>
                            <div class="author-info">
                                <h6>{{ $testimonial['author'] }}</h6>
                                <small><i class="bi bi-geo-alt"></i> {{ $testimonial['location'] }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
