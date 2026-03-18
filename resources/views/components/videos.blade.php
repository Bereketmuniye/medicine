<section class="video-section" id="videos">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">የተለያዩ ቪዲዮዎች</span>
            <h2 class="section-title">የተለያዩ <span>ቪዲዮዎች</span></h2>
            <p class="text-muted">ከማህበረሰብዎ እውነተኛ ተሞክሮዎችን ይመልከቱ</p>
        </div>
        
        <!-- Video Grid - Real videos from database -->
        <div class="video-grid">
            @forelse($videos as $video)
                <div class="video-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="video-wrapper">
                        @if($video->embed_url)
                            <iframe src="{{ $video->embed_url }}" allowfullscreen></iframe>
                        @else
                            <div class="video-placeholder">
                                <i class="bi bi-play-circle"></i>
                                <p>ቪዲዮው አይገኝም</p>
                            </div>
                        @endif
                    </div>
                    <div class="video-info">
                        <h6 class="video-title">{{ $video->title }}</h6>
                        @if($video->description)
                            <p class="video-description">{{ Str::limit($video->description, 80) }}</p>
                        @endif
                        <div class="video-meta">
                            @if($video->category)
                                <span><i class="bi bi-folder"></i> {{ $video->category->name }}</span>
                            @endif
                            @if($video->created_at)
                                <span><i class="bi bi-calendar"></i> {{ $video->created_at->diffForHumans() }}</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <!-- Fallback videos if no videos in database -->
                <div class="video-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="video-wrapper">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                    </div>
                    <div class="video-info">
                        <h6 class="video-title">ተና አዳም ለኢምዩንቲ</h6>
                        <div class="video-meta">
                            <span><i class="bi bi-person"></i> Alemitu B.</span>
                            <span><i class="bi bi-calendar"></i> 2 days ago</span>
                        </div>
                    </div>
                </div>
                
                <div class="video-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="video-wrapper">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                    </div>
                    <div class="video-info">
                        <h6 class="video-title">ጥንታዊ ዝግጅት ዘዴዎች</h6>
                        <div class="video-meta">
                            <span><i class="bi bi-person"></i> Tadesse W.</span>
                            <span><i class="bi bi-calendar"></i> 1 week ago</span>
                        </div>
                    </div>
                </div>
                
                <div class="video-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="video-wrapper">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                    </div>
                    <div class="video-info">
                        <h6 class="video-title">ዳማካሴ ለየአሳም ጤና</h6>
                        <div class="video-meta">
                            <span><i class="bi bi-person"></i> Meseret K.</span>
                            <span><i class="bi bi-calendar"></i> 2 weeks ago</span>
                        </div>
                    </div>
                </div>
                
                <div class="video-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="video-wrapper">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                    </div>
                    <div class="video-info">
                        <h6 class="video-title">ዩካሊፕተስ ዘይት ማውጣት</h6>
                        <div class="video-meta">
                            <span><i class="bi bi-person"></i> Worku D.</span>
                            <span><i class="bi bi-calendar"></i> 3 weeks ago</span>
                        </div>
                    </div>
                </div>
                
                <div class="video-card" data-aos="fade-up" data-aos-delay="500">
                    <div class="video-wrapper">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                    </div>
                    <div class="video-info">
                        <h6 class="video-title">ኒም ለቆዳ ችግሮች</h6>
                        <div class="video-meta">
                            <span><i class="bi bi-person"></i> Genet A.</span>
                            <span><i class="bi bi-calendar"></i> 1 month ago</span>
                        </div>
                    </div>
                </div>
                
                <div class="video-card" data-aos="fade-up" data-aos-delay="600">
                    <div class="video-wrapper">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                    </div>
                    <div class="video-info">
                        <h6 class="video-title">ከHerbMed ጋር ያለኝ ጉዞ</h6>
                        <div class="video-meta">
                            <span><i class="bi bi-person"></i> Sarah J.</span>
                            <span><i class="bi bi-calendar"></i> 2 months ago</span>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
