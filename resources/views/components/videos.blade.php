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
                                <!-- TikTok Embed with proper script -->
                                <blockquote class="tiktok-embed" cite="{{ $video->embed_url }}" data-video-id="{{ Str::afterLast($video->embed_url, '/') }}" style="max-width: 605px; min-width: 325px; height: 750px; margin: 0 auto;">
                                    <section>&nbsp;</section>
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
                <div class="col-12 text-center py-5">
                    <div class="video-placeholder">
                        <i class="bi bi-play-circle"></i>
                        <p>{{ __('messages.no_videos_available') }}</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
