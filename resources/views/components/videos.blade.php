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
                        <div class="main-video-card" data-aos="fade-up">
                            <div class="video-wrapper">
                                @if($video->embed_url)
                                    @if(str_contains($video->embed_url, 'tiktok.com'))
                                        <!-- TikTok Embed -->
                                        @php
                                            $tiktokUrl = $video->embed_url;
                                            $videoId = '';
                                            
                                            if (preg_match('/tiktok\.com\/@([^\/]+)\/video\/(\d+)/', $tiktokUrl, $matches)) {
                                                $videoId = $matches[2];
                                            } elseif (preg_match('/tiktok\.com\/v\/(\d+)/', $tiktokUrl, $matches)) {
                                                $videoId = $matches[1];
                                            } elseif (preg_match('/tiktok\.com\/.*\/(\d+)/', $tiktokUrl, $matches)) {
                                                $videoId = $matches[1];
                                            }
                                        @endphp
                                        
                                        @if($videoId)
                                            <iframe 
                                                src="https://www.tiktok.com/embed/v2/{{ $videoId }}"
                                                style="width: 100%; height: 450px; border: none; border-radius: 15px;"
                                                allowfullscreen
                                                allow="encrypted-media; fullscreen; picture-in-picture">
                                            </iframe>
                                        @else
                                            <iframe 
                                                src="{{ $video->embed_url }}"
                                                style="width: 100%; height: 450px; border: none; border-radius: 15px;"
                                                allowfullscreen>
                                            </iframe>
                                        @endif
                                    @else
                                        <!-- YouTube/Vimeo Embed -->
                                        @if(str_contains($video->embed_url, 'youtube.com') || str_contains($video->embed_url, 'youtu.be'))
                                            @php
                                                $youtubeId = '';
                                                if (preg_match('/youtube\.com\/watch\?v=([^&]+)/', $video->embed_url, $matches)) {
                                                    $youtubeId = $matches[1];
                                                } elseif (preg_match('/youtu\.be\/([^?]+)/', $video->embed_url, $matches)) {
                                                    $youtubeId = $matches[1];
                                                }
                                            @endphp
                                            @if($youtubeId)
                                                <iframe 
                                                    src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                                    style="width: 100%; height: 450px; border: none; border-radius: 15px;"
                                                    allowfullscreen
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                                                </iframe>
                                            @else
                                                <iframe 
                                                    src="{{ $video->embed_url }}"
                                                    style="width: 100%; height: 450px; border: none; border-radius: 15px;"
                                                    allowfullscreen>
                                                </iframe>
                                            @endif
                                        @else
                                            <iframe 
                                                src="{{ $video->embed_url }}"
                                                style="width: 100%; height: 450px; border: none; border-radius: 15px;"
                                                allowfullscreen>
                                            </iframe>
                                        @endif
                                    @endif
                                @else
                                    <div style="width: 100%; height: 450px; background: #f8f9fa; border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                        <p style="color: #666; text-align: center;">{{ __('messages.video_not_available') }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="video-info-overlay">
                                <span class="featured-tag">{{ __('messages.featured_ritual') }}</span>
                                <span class="video-duration">
                                    @if($video->duration)
                                        {{ $video->duration }}
                                    @else
                                        4:20 • {{ __('messages.morning_infusion') }}
                                    @endif
                                </span>
                                <h2 class="video-title">{{ $video->title }}</h2>
                                <p class="video-description">
                                    {!! Str::limit($video->description ?? 'Capturing the vitality of traditional herbal preparation methods.', 150) !!}
                                </p>
                            </div>
                        </div>
                    @endif
                @empty
                    <!-- Fallback Featured Video -->
                    <div class="main-video-card" data-aos="fade-up">
                        <div class="video-wrapper">
                            <img src="https://picsum.photos/seed/featured-ritual/800/450.jpg" alt="Featured Ritual" class="img-fluid video-thumbnail">
                            <div class="play-button-overlay">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                        <div class="video-info-overlay">
                            <span class="featured-tag">{{ __('messages.featured_ritual') }}</span>
                            <span class="video-duration">{{ __('messages.no_videos_available') }}</span>
                            <h2 class="video-title">{{ __('messages.videos_title') }}</h2>
                            <p class="video-description">
                                {{ __('messages.videos_description') }}
                            </p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Right Column - Sidebar -->
            <div class="col-lg-5 col-md-12">
                <!-- Additional Video Cards -->
                @forelse($videos as $index => $video)
                    @if($index >= 1 && $index <= 3)
                        <div class="side-video-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="side-video-wrapper">
                                @if($video->embed_url)
                                    @if(str_contains($video->embed_url, 'tiktok.com'))
                                        <!-- TikTok Embed -->
                                        @php
                                            $tiktokUrl = $video->embed_url;
                                            $videoId = '';
                                            
                                            if (preg_match('/tiktok\.com\/@([^\/]+)\/video\/(\d+)/', $tiktokUrl, $matches)) {
                                                $videoId = $matches[2];
                                            } elseif (preg_match('/tiktok\.com\/v\/(\d+)/', $tiktokUrl, $matches)) {
                                                $videoId = $matches[1];
                                            } elseif (preg_match('/tiktok\.com\/.*\/(\d+)/', $tiktokUrl, $matches)) {
                                                $videoId = $matches[1];
                                            }
                                        @endphp
                                        
                                        @if($videoId)
                                            <iframe 
                                                src="https://www.tiktok.com/embed/v2/{{ $videoId }}"
                                                style="width: 100%; height: 225px; border: none; border-radius: 10px;"
                                                allowfullscreen
                                                allow="encrypted-media; fullscreen; picture-in-picture">
                                            </iframe>
                                        @else
                                            <iframe 
                                                src="{{ $video->embed_url }}"
                                                style="width: 100%; height: 225px; border: none; border-radius: 10px;"
                                                allowfullscreen>
                                            </iframe>
                                        @endif
                                    @else
                                        <!-- YouTube/Vimeo Embed -->
                                        @if(str_contains($video->embed_url, 'youtube.com') || str_contains($video->embed_url, 'youtu.be'))
                                            @php
                                                $youtubeId = '';
                                                if (preg_match('/youtube\.com\/watch\?v=([^&]+)/', $video->embed_url, $matches)) {
                                                    $youtubeId = $matches[1];
                                                } elseif (preg_match('/youtu\.be\/([^?]+)/', $video->embed_url, $matches)) {
                                                    $youtubeId = $matches[1];
                                                }
                                            @endphp
                                            @if($youtubeId)
                                                <iframe 
                                                        src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                                        style="width: 100%; height: 225px; border: none; border-radius: 10px;"
                                                        allowfullscreen
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                                                    </iframe>
                                            @else
                                                <iframe 
                                                        src="{{ $video->embed_url }}"
                                                        style="width: 100%; height: 225px; border: none; border-radius: 10px;"
                                                        allowfullscreen>
                                                    </iframe>
                                            @endif
                                        @else
                                            <iframe 
                                                src="{{ $video->embed_url }}"
                                                style="width: 100%; height: 225px; border: none; border-radius: 10px;"
                                                allowfullscreen>
                                            </iframe>
                                        @endif
                                    @endif
                                @else
                                    <div style="width: 100%; height: 225px; background: #f8f9fa; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                                        <p style="color: #666; text-align: center; font-size: 0.9rem;">{{ __('messages.video_not_available') }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="side-video-info">
                                <h4 class="side-video-title">{{ $video->title }}</h4>
                                <p class="side-video-description">
                                    {!! Str::limit($video->description ?? 'Traditional herbal preparation methods passed down through generations.', 80) !!}
                                </p>
                                <div class="side-video-meta">
                                    <span class="video-duration">
                                        @if($video->duration)
                                            {{ $video->duration }}
                                        @else
                                            {{ ($index + 2) }}:{{ 15 + ($index * 10) }}
                                        @endif
                                    </span>
                                    @if($video->created_at)
                                        <span class="video-date">{{ $video->created_at->diffForHumans() }}</span>
                                    @else
                                        <span class="video-date">{{ $index + 1 }} {{ __('messages.days_ago') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <!-- Fallback Videos - Show translatable messages -->
                    <div class="side-video-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="side-video-wrapper">
                            <img src="https://picsum.photos/seed/{{ urlencode(__('messages.videos_title')) }}/400/225.jpg" alt="{{ __('messages.videos_title') }}" class="img-fluid">
                            <div class="side-play-overlay">
                                <i class="fas fa-play"></i>
                            </div>
                        </div>
                        <div class="side-video-info">
                            <h4 class="side-video-title">{{ __('messages.no_videos_available') }}</h4>
                            <p class="side-video-description">{{ __('messages.videos_description') }}</p>
                            <div class="side-video-meta">
                                <span class="video-duration">--:--</span>
                                <span class="video-date">{{ __('messages.recently') }}</span>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<style>
.community-wisdom-section {
    padding: 100px 0;
    background: #ffffff;
}

.community-header {
    margin-bottom: 3rem;
}

.community-label {
    color: var(--primary-light);
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 0.5rem;
    display: block;
}

.community-title {
    font-size: 3rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 1rem;
    font-family: 'Georgia', serif;
}

.community-title span {
    color: var(--primary-light);
}

.community-description {
    font-size: 1.1rem;
    color: var(--text-light);
    line-height: 1.8;
    max-width: 600px;
}

.main-video-card {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0,0,0,0.1);
    background: #ffffff;
    margin-bottom: 2rem;
}

.video-wrapper {
    position: relative;
    height: 450px;
    overflow: hidden;
}

.video-thumbnail {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.play-button-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80px;
    height: 80px;
    background: rgba(255,255,255,0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 5px 20px rgba(0,0,0,0.2);
}

.play-button-overlay:hover {
    transform: translate(-50%, -50%) scale(1.1);
    background: white;
}

.play-button-overlay i {
    font-size: 2rem;
    color: var(--primary);
    margin-left: 5px;
}

.video-info-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
    padding: 3rem 2rem 2rem;
    color: white;
}

.featured-tag {
    background: var(--primary-light);
    color: var(--primary);
    font-size: 0.7rem;
    font-weight: 700;
    padding: 0.3rem 0.8rem;
    border-radius: 20px;
    text-transform: uppercase;
    letter-spacing: 1px;
    display: inline-block;
    margin-bottom: 0.5rem;
}

.video-duration {
    font-size: 0.9rem;
    opacity: 0.8;
    display: block;
    margin-bottom: 0.5rem;
}

.video-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    font-family: 'Georgia', serif;
}

.video-description {
    font-size: 1rem;
    line-height: 1.6;
    opacity: 0.9;
}

.contribute-ritual-card {
    background: #f8f9fa;
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 2rem;
    border: 1px solid #e9ecef;
}

.card-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 1rem;
    font-family: 'Georgia', serif;
}

.input-label {
    font-size: 0.8rem;
    font-weight: 600;
    color: var(--text-light);
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 0.5rem;
}

.input-group {
    display: flex;
    margin-bottom: 1rem;
}

.input-group .form-control {
    border: 2px solid #e9ecef;
    border-radius: 10px 0 0 10px;
    padding: 0.8rem 1rem;
    font-size: 0.9rem;
    border-right: none;
}

.input-group .btn {
    background: var(--primary);
    color: white;
    border: 2px solid var(--primary);
    border-radius: 0 10px 10px 0;
    padding: 0.8rem 1rem;
    transition: all 0.3s ease;
}

.input-group .btn:hover {
    background: var(--primary-light);
    border-color: var(--primary-light);
}

.submission-note {
    font-size: 0.8rem;
    color: var(--text-light);
    line-height: 1.4;
    font-style: italic;
}

.daily-practice-card {
    background: #f8f9fa;
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 2rem;
    border: 1px solid #e9ecef;
}

.daily-practice-label {
    color: var(--primary-light);
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 0.5rem;
    display: block;
}

.daily-practice-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 1rem;
    font-family: 'Georgia', serif;
}

.author-info {
    display: flex;
    align-items: center;
    gap: 0.8rem;
}

.author-avatar {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    object-fit: cover;
}

.author-name {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--text-dark);
}

.ritual-duration {
    font-size: 0.8rem;
    color: var(--text-light);
    margin-left: auto;
}

.sleep-tincture-card {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
}

.sleep-tincture-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.sleep-tincture-card .card-text {
    position: absolute;
    bottom: 1rem;
    left: 1rem;
    color: white;
    font-weight: 700;
    font-size: 1.1rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
}

.sleep-tincture-card {
    position: relative;
}

.side-video-card {
    background: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
    border: 1px solid #f0f0f0;
}

.side-video-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(0,0,0,0.12);
}

.side-video-wrapper {
    position: relative;
    height: 225px;
    overflow: hidden;
}

.side-video-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.side-video-card:hover .side-video-wrapper img {
    transform: scale(1.05);
}

.side-play-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 50px;
    height: 50px;
    background: rgba(255,255,255,0.9);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 3px 15px rgba(0,0,0,0.2);
}

.side-play-overlay:hover {
    transform: translate(-50%, -50%) scale(1.1);
    background: white;
}

.side-play-overlay i {
    font-size: 1.2rem;
    color: var(--primary);
    margin-left: 2px;
}

.side-video-info {
    padding: 1.5rem;
}

.side-video-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 0.5rem;
    font-family: 'Georgia', serif;
    line-height: 1.3;
}

.side-video-description {
    font-size: 0.9rem;
    color: var(--text-light);
    line-height: 1.5;
    margin-bottom: 1rem;
}

.side-video-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 0.8rem;
    color: var(--text-light);
}

.video-duration {
    font-weight: 600;
    color: var(--primary-light);
}

.video-date {
    opacity: 0.7;
}

.video-thumbnail-container {
    position: relative;
    cursor: pointer;
    width: 100%;
    height: 100%;
}

.video-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.9);
    backdrop-filter: blur(5px);
}

.video-modal-content {
    position: relative;
    background-color: transparent;
    margin: 5% auto;
    padding: 0;
    width: 90%;
    max-width: 900px;
    animation: modalFadeIn 0.3s ease;
}

@keyframes modalFadeIn {
    from { opacity: 0; transform: scale(0.9); }
    to { opacity: 1; transform: scale(1); }
}

.video-modal-close {
    position: absolute;
    top: -40px;
    right: 0;
    color: white;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
    z-index: 10000;
    transition: all 0.3s ease;
}

.video-modal-close:hover {
    color: var(--primary-light);
    transform: scale(1.1);
}

.video-modal-body {
    background: transparent;
    border-radius: 15px;
    overflow: hidden;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .community-title {
        font-size: 2rem;
    }
    
    .video-wrapper {
        height: 320px;
    }
    
    .video-info-overlay {
        padding: 1.5rem 1rem 1rem;
    }
    
    .video-title {
        font-size: 1.3rem;
    }
    
    .video-description {
        font-size: 0.9rem;
        margin-bottom: 0.5rem;
    }
    
    .featured-tag {
        font-size: 0.6rem;
        padding: 0.2rem 0.6rem;
        margin-bottom: 0.3rem;
    }
    
    .video-duration {
        font-size: 0.8rem;
        margin-bottom: 0.3rem;
    }
    
    .community-description {
        font-size: 0.9rem;
        line-height: 1.6;
    }
    
    .side-video-card {
        margin-bottom: 1rem;
    }
    
    .side-video-wrapper {
        height: 220px;
    }
    
    .side-video-info {
        padding: 1rem;
    }
    
    .side-video-title {
        font-size: 0.95rem;
        line-height: 1.3;
        margin-bottom: 0.4rem;
    }
    
    .side-video-description {
        font-size: 0.8rem;
        margin-bottom: 0.6rem;
        line-height: 1.4;
    }
    
    .side-video-meta {
        font-size: 0.7rem;
    }
}

@media (max-width: 576px) {
    .video-section {
        padding: 60px 0;
    }
    
    .community-title {
        font-size: 1.6rem;
        line-height: 1.2;
    }
    
    .community-description {
        font-size: 0.85rem;
        margin-bottom: 1.5rem;
    }
    
    .video-wrapper {
        height: 280px;
    }
    
    .video-info-overlay {
        padding: 1rem 0.8rem 0.8rem;
        background: linear-gradient(to top, rgba(0,0,0,0.95), transparent);
    }
    
    .video-title {
        font-size: 1.1rem;
        margin-bottom: 0.3rem;
        line-height: 1.2;
    }
    
    .video-description {
        font-size: 0.8rem;
        margin-bottom: 0.4rem;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .featured-tag {
        font-size: 0.55rem;
        padding: 0.15rem 0.5rem;
        margin-bottom: 0.2rem;
    }
    
    .video-duration {
        font-size: 0.75rem;
        margin-bottom: 0.2rem;
    }
    
    .side-video-card {
        margin-bottom: 0.8rem;
        border-radius: 12px;
    }
    
    .side-video-wrapper {
        height: 180px;
    }
    
    .side-video-info {
        padding: 0.8rem;
    }
    
    .side-video-title {
        font-size: 0.85rem;
        margin-bottom: 0.3rem;
        line-height: 1.2;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .side-video-description {
        font-size: 0.75rem;
        margin-bottom: 0.5rem;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .side-video-meta {
        font-size: 0.65rem;
        flex-direction: column;
        gap: 0.2rem;
        align-items: flex-start;
    }
}

@media (max-width: 480px) {
    .video-section {
        padding: 40px 0;
    }
    
    .community-title {
        font-size: 1.4rem;
    }
    
    .video-wrapper {
        height: 400px;
    }
    
    .video-info-overlay {
        padding: 0.8rem 0.6rem 0.6rem;
    }
    
    .video-title {
        font-size: 1rem;
    }
    
    .video-description {
        font-size: 0.75rem;
        -webkit-line-clamp: 3;
    }
    
    .featured-tag {
        font-size: 0.5rem;
        padding: 0.1rem 0.4rem;
    }
    
    .video-duration {
        font-size: 0.7rem;
    }
    
    .side-video-wrapper {
        height: 150px;
    }
    
    .side-video-info {
        padding: 0.6rem;
    }
    
    .side-video-title {
        font-size: 0.8rem;
    }
    
    .side-video-description {
        font-size: 0.7rem;
        -webkit-line-clamp: 1;
    }
    
    .side-video-meta {
        font-size: 0.6rem;
    }
}
}
