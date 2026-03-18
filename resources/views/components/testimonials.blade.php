@props(['testimonials' => null, 'showAll' => false, 'gridCols' => 3, 'title' => 'የደንበኞቻችን ምስክሮች', 'subtitle' => 'ከየአትክልት ሕክምናው ጥቅም የያገኙ ሰዎች እውነተኛ ተሞክሮዎች'])

@php
    $testimonialsCollection = collect($testimonials ?? []);
@endphp

@if($testimonialsCollection->count() > 0)
<section class="testimonials-section py-5">
    <div class="container">
        <div class="section-header text-center mb-5" data-aos="fade-up">
            @if($subtitle)
                <span class="section-subtitle d-block text-primary fw-semibold mb-2">{{ $subtitle }}</span>
            @endif
            <h2 class="section-title display-5 fw-bold">{{ $title }}</h2>
        </div>
        
        @if(!$showAll)
            <!-- Auto-scrolling Testimonials Carousel -->
            <div class="testimonials-carousel-wrapper">
                <div class="testimonials-carousel" id="testimonialsCarousel">
                    @foreach($testimonialsCollection as $testimonial)
                        <div class="testimonial-slide">
                            <div class="testimonial-card">
                                <div class="testimonial-content">
                                    @if($testimonial->rating)
                                        <div class="testimonial-rating mb-3">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= floor($testimonial->rating))
                                                    <i class="fas fa-star"></i>
                                                @elseif($i == ceil($testimonial->rating) && $testimonial->rating % 1 != 0)
                                                    <i class="fas fa-star-half-alt"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    @endif
                                    
                                    <blockquote class="testimonial-text mb-4">
                                        <div class="fst-italic">"{{ $testimonial->content }}"</div>
                                    </blockquote>
                                    
                                    <div class="testimonial-author d-flex align-items-center">
                                        @if($testimonial->featured_image)
                                            <img src="{{ asset('images/testimonials/' . $testimonial->featured_image) }}" 
                                                 class="rounded-circle me-3" 
                                                 style="width: 50px; height: 50px; object-fit: cover;"
                                                 alt="{{ $testimonial->client_name }}">
                                        @else
                                            <div class="author-avatar me-3">
                                                {{ substr($testimonial->client_name, 0, 1) }}
                                            </div>
                                        @endif
                                        <div class="author-info">
                                            <h6 class="mb-0 fw-semibold">{{ $testimonial->client_name }}</h6>
                                            @if($testimonial->client_position || $testimonial->client_company)
                                                <small class="text-muted">
                                                    {{ $testimonial->client_position }}
                                                    @if($testimonial->client_position && $testimonial->client_company), @endif
                                                    {{ $testimonial->client_company }}
                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Navigation Controls -->
                <button class="carousel-control prev" id="carouselPrev">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="carousel-control next" id="carouselNext">
                    <i class="fas fa-chevron-right"></i>
                </button>
                
                <!-- Pause/Play Button -->
                <button class="carousel-pause" id="carouselPause">
                    <i class="fas fa-pause"></i>
                </button>
            </div>
        @endif
    </div>
</section>
@endif

<style>
.testimonials-carousel-wrapper {
    position: relative;
    overflow: hidden;
    border-radius: 16px;
    padding: 20px 0;
}

.testimonials-carousel {
    display: flex;
    transition: transform 0.5s ease;
    gap: 20px;
}

.testimonial-slide {
    flex: 0 0 350px;
    min-width: 350px;
}

.testimonial-card {
    background: white;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    border: 1px solid rgba(0, 0, 0, 0.05);
    height: 100%;
}

.testimonial-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
}

.testimonial-content {
    padding: 2rem;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.testimonial-rating {
    color: #ffc107;
    font-size: 1.1rem;
}

.testimonial-text {
    color: #495057;
    line-height: 1.6;
    flex-grow: 1;
    font-size: 0.95rem;
}

.testimonial-author {
    margin-top: auto;
    padding-top: 1rem;
    border-top: 1px solid rgba(0, 0, 0, 0.05);
}

.author-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 1.2rem;
}

.carousel-control {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.9);
    border: none;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 10;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.carousel-control:hover {
    background: white;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
}

.carousel-control.prev {
    left: 10px;
}

.carousel-control.next {
    right: 10px;
}

.carousel-pause {
    position: absolute;
    bottom: 10px;
    right: 10px;
    background: rgba(255, 255, 255, 0.9);
    border: none;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 10;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.carousel-pause:hover {
    background: white;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
}

@media (max-width: 768px) {
    .testimonial-slide {
        flex: 0 0 280px;
        min-width: 280px;
    }
    
    .testimonial-content {
        padding: 1.5rem;
    }
    
    .testimonials-section .display-5 {
        font-size: 2rem;
    }
    
    .carousel-control {
        width: 35px;
        height: 35px;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('testimonialsCarousel');
    const prevBtn = document.getElementById('carouselPrev');
    const nextBtn = document.getElementById('carouselNext');
    const pauseBtn = document.getElementById('carouselPause');
    
    if (!carousel) return;
    
    let currentIndex = 0;
    let isPaused = false;
    let autoScrollInterval;
    
    const slides = carousel.querySelectorAll('.testimonial-slide');
    const totalSlides = slides.length;
    
    // Only clone slides for infinite scroll if we have enough testimonials
    if (totalSlides > 3) {
        for (let i = 0; i < 3; i++) {
            const clone = slides[i].cloneNode(true);
            carousel.appendChild(clone);
        }
    }
    
    function updateCarousel() {
        const slideWidth = slides[0].offsetWidth + 20; // width + gap
        carousel.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    }
    
    function nextSlide() {
        currentIndex++;
        updateCarousel();
        
        // Reset to start when reaching the cloned slides
        if (currentIndex >= totalSlides) {
            setTimeout(() => {
                carousel.style.transition = 'none';
                currentIndex = 0;
                updateCarousel();
                setTimeout(() => {
                    carousel.style.transition = 'transform 0.5s ease';
                }, 50);
            }, 500);
        }
    }
    
    function prevSlide() {
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = totalSlides - 1;
        }
        updateCarousel();
    }
    
    function startAutoScroll() {
        autoScrollInterval = setInterval(() => {
            if (!isPaused) {
                nextSlide();
            }
        }, 3000);
    }
    
    function togglePause() {
        isPaused = !isPaused;
        pauseBtn.innerHTML = isPaused ? '<i class="fas fa-play"></i>' : '<i class="fas fa-pause"></i>';
    }
    
    // Event listeners
    prevBtn.addEventListener('click', () => {
        prevSlide();
        isPaused = true;
        pauseBtn.innerHTML = '<i class="fas fa-play"></i>';
    });
    
    nextBtn.addEventListener('click', () => {
        nextSlide();
        isPaused = true;
        pauseBtn.innerHTML = '<i class="fas fa-play"></i>';
    });
    
    pauseBtn.addEventListener('click', togglePause);
    
    // Pause on hover
    carousel.addEventListener('mouseenter', () => {
        isPaused = true;
        pauseBtn.innerHTML = '<i class="fas fa-play"></i>';
    });
    
    carousel.addEventListener('mouseleave', () => {
        isPaused = false;
        pauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
    });
    
    // Start auto-scroll
    startAutoScroll();
    
    // Handle window resize
    window.addEventListener('resize', updateCarousel);
});
</script>
