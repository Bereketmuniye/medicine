<section class="video-section" id="videos">
    <div class="container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-subtitle">{{ __('messages.videos_subtitle') }}</span>
            <h2 class="section-title">{{ __('messages.videos_title') }} <span>{{ __('messages.videos_span') }}</span></h2>
            <p class="text-muted">{{ __('messages.videos_description') }}</p>
        </div>
        
        <!-- Video Grid - Real videos from database -->
        <div class="video-grid">
            @forelse($videos as $video)
                <div class="video-card" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                    <div class="video-wrapper">
                        @if($video->embed_url)
                            @if(str_contains($video->embed_url, 'tiktok.com'))
                                <!-- TikTok Embed -->
                                <blockquote class="tiktok-embed" cite="{{ $video->embed_url }}" data-video-id="{{ $video->embed_url }}">
                                    <section>
                                        <a target="_blank" href="{{ $video->embed_url }}">@tiktok</a>
                                        <p>Check out this video on TikTok!</p>
                                    </section>
                                </blockquote>
                                <script async src="https://www.tiktok.com/embed.js"></script>
                            @else
                                <!-- YouTube/Vimeo/Other Embed -->
                                <iframe src="{{ $video->embed_url }}" allowfullscreen></iframe>
                            @endif
                        @else
                            <div class="video-placeholder">
                                <i class="bi bi-play-circle"></i>
                                <p>{{ __('messages.video_not_available') }}</p>
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
                
            @endforelse
        </div>
    </div>
</section>
