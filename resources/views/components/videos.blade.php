<link rel="stylesheet" href="{{ asset('css/videos-shared.css') }}">

<section class="video-section" id="videos">
    <div class="container">
        <div class="row">
            <!-- Left Column - Main Video -->
            <div class="col-lg-7 col-md-12">
                <div class="community-header" data-aos="fade-up">
                    <p class="community-label">{{ __('messages.community_wisdom') }}</p>
                    <h1 class="community-title">{{ __('messages.videos_title') }} <span>{{ __('messages.videos_span') }}</span></h1>
                    <p class="community-description">
                        {{ __('messages.videos_description') }}
                    </p>
                </div>

                <!-- Featured Video -->
                @forelse($videos as $index => $video)
                    @if($index == 0)
                        <div class="main-video-card" data-aos="fade-up" onclick="loadMainVideo(this, '{{ $video->embed_url }}')">
                            <div class="video-wrapper">
                                @if($video->featured_image)
                                    <img src="{{ asset('storage/' . $video->featured_image) }}" alt="{{ $video->title }}" class="img-fluid video-thumbnail">
                                @else
                                    @php
                                        $thumbUrl = 'https://picsum.photos/seed/ritual-' . $index . '/1200/675.jpg';
                                        if (str_contains($video->embed_url, 'youtube.com') || str_contains($video->embed_url, 'youtu.be')) {
                                            if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&?]+)/', $video->embed_url, $matches)) {
                                                $thumbUrl = "https://img.youtube.com/vi/{$matches[1]}/maxresdefault.jpg";
                                            }
                                        }
                                    @endphp
                                    <img src="{{ $thumbUrl }}" alt="{{ $video->title }}" class="img-fluid video-thumbnail">
                                @endif
                                
                                <div class="play-button-overlay">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="video-info-overlay">
                                <span class="featured-tag">{{ __('messages.featured_ritual') }}</span>
                                <span class="video-duration">
                                    @if($video->duration) <i class="bi bi-clock"></i> {{ $video->duration }} @else <i class="bi bi-clock"></i> 4:20 • {{ __('messages.morning_infusion') }} @endif
                                </span>
                                <h2 class="video-title">{{ $video->title }}</h2>
                                <p class="video-description">
                                    {!! Str::limit($video->description ?? __('messages.videos_description'), 150) !!}
                                </p>
                            </div>
                        </div>
                    @endif
                @empty
                    <!-- Fallback Featured Video -->
                    <div class="main-video-card" data-aos="fade-up">
                        <div class="video-wrapper">
                            <img src="https://picsum.photos/seed/featured-ritual/1200/675.jpg" alt="Featured Ritual" class="img-fluid video-thumbnail">
                            <div class="play-button-overlay">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                        <div class="video-info-overlay">
                            <span class="featured-tag">{{ __('messages.featured_ritual') }}</span>
                            <span class="video-duration"><i class="bi bi-clock"></i> 5:30</span>
                            <h2 class="video-title">{{ __('messages.botanical_wisdom') }}</h2>
                            <p class="video-description">{{ __('messages.videos_description') }}</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Right Column - Sidebar -->
            <div class="col-lg-5 col-md-12">
                @forelse($videos as $index => $video)
                    @if($index >= 1 && $index <= 3)
                        <div class="side-video-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" 
                             onclick="loadSideVideo(this, '{{ $video->embed_url }}')">
                            <div class="side-video-wrapper">
                                <div class="side-video-inner">
                                    @if($video->featured_image)
                                        <img src="{{ asset('storage/' . $video->featured_image) }}" alt="{{ $video->title }}">
                                    @else
                                        <img src="https://picsum.photos/seed/video-{{ $index }}/400/400.jpg" alt="{{ $video->title }}">
                                    @endif
                                </div>
                                <div class="side-play-overlay">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="side-video-info">
                                <h4 class="side-video-title">{{ $video->title }}</h4>
                                <p class="side-video-description">
                                    {!! Str::limit($video->description ?? __('messages.videos_description'), 80) !!}
                                </p>
                                <div class="side-video-meta">
                                    <span class="video-duration"><i class="bi bi-clock"></i> {{ $video->duration ?? '--:--' }}</span>
                                    <span class="video-date"><i class="bi bi-calendar3"></i> {{ $video->created_at ? $video->created_at->diffForHumans() : __('messages.recently') }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <!-- Fallback Side Videos -->
                    @for($i = 1; $i <= 3; $i++)
                        <div class="side-video-card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                            <div class="side-video-wrapper">
                                <div class="side-video-inner">
                                    <img src="https://picsum.photos/seed/ritual-{{ $i }}/400/400.jpg" alt="Ritual">
                                </div>
                                <div class="side-play-overlay">
                                    <i class="fas fa-play"></i>
                                </div>
                            </div>
                            <div class="side-video-info">
                                <h4 class="side-video-title">{{ __('messages.discover_nature') }}</h4>
                                <div class="side-video-meta">
                                    <span class="video-duration"><i class="bi bi-clock"></i> {{ 3 + $i }}:00</span>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endforelse
            </div>
        </div>
    </div>
</section>

<script>
function loadMainVideo(container, embedUrl) {
    if (!embedUrl) return;
    
    // Auto-play logic for different platforms
    let finalUrl = embedUrl;
    if (embedUrl.includes('youtube.com') || embedUrl.includes('youtu.be')) {
        finalUrl += (embedUrl.includes('?') ? '&' : '?') + 'autoplay=1';
    } else if (embedUrl.includes('tiktok.com')) {
        // TikTok doesn't support autoplay via URL easily in embeds
    }

    const wrapper = container.querySelector('.video-wrapper');
    const playBtn = container.querySelector('.play-button-overlay');
    
    // Determine iframe content
    let iframeHtml = '';
    if (embedUrl.includes('tiktok.com')) {
        let videoId = '';
        if (embedUrl.match(/video\/(\d+)/)) videoId = embedUrl.match(/video\/(\d+)/)[1];
        if (videoId) {
            iframeHtml = `<iframe src="https://www.tiktok.com/embed/v2/${videoId}" style="width: 100%; height: 100%; border: none;" allowfullscreen allow="autoplay; encrypted-media; fullscreen; picture-in-picture"></iframe>`;
        } else {
            iframeHtml = `<iframe src="${finalUrl}" style="width: 100%; height: 100%; border: none;" allowfullscreen allow="autoplay"></iframe>`;
        }
    } else {
        iframeHtml = `<iframe src="${finalUrl}" style="width: 100%; height: 100%; border: none;" allowfullscreen allow="autoplay; accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>`;
    }

    wrapper.innerHTML = iframeHtml;
    if (playBtn) playBtn.style.display = 'none';
}

function loadSideVideo(container, embedUrl) {
    if (!embedUrl) return;
    const inner = container.querySelector('.side-video-inner');
    const playBtn = container.querySelector('.side-play-overlay');
    
    inner.innerHTML = `<iframe src="${embedUrl}" style="width: 100%; height: 100%; border: none;" allowfullscreen allow="autoplay"></iframe>`;
    if (playBtn) playBtn.style.display = 'none';
}
</script>

