@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Video Details" 
    subtitle="View video information and preview"
>
    <x-slot name="action">
        <a href="{{ route('admin.videos.index') }}" class="btn btn-light rounded-pill px-4">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to Library
        </a>
        <a href="{{ route('admin.videos.edit', $video) }}" class="btn btn-primary rounded-pill px-4 ms-2">
            <i class="fa-solid fa-edit me-2"></i>Edit Video
        </a>
    </x-slot>
</x-admin.card-header>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
            <h5 class="mb-4 fw-bold">{{ $video->title }}</h5>
            
            <!-- Video Preview -->
            <div class="mb-4">
                <label class="form-label fw-bold">Video Preview</label>
                <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm bg-black">
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
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <div class="text-center text-white">
                                <i class="bi bi-play-circle fs-1"></i>
                                <p class="mt-2">No video available</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Video Information -->
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Original URL</label>
                    <div class="form-control rounded-4 p-3 bg-light">
                        <a href="{{ $video->video_url }}" target="_blank" class="text-decoration-none">
                            {{ Str::limit($video->video_url, 50) }}
                            <i class="bi bi-box-arrow-up-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Category</label>
                    <div class="form-control rounded-4 p-3 bg-light">
                        {{ $video->category->name ?? 'Uncategorized' }}
                    </div>
                </div>
                <div class="col-12">
                    <label class="form-label fw-bold">Description</label>
                    <div class="form-control rounded-4 p-3 bg-light" style="min-height: 100px;">
                        {{ $video->description ?? 'No description provided' }}
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Created At</label>
                    <div class="form-control rounded-4 p-3 bg-light">
                        {{ $video->created_at->format('M d, Y H:i') }}
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Last Updated</label>
                    <div class="form-control rounded-4 p-3 bg-light">
                        {{ $video->updated_at->format('M d, Y H:i') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
            <h6 class="fw-bold mb-4">Actions</h6>
            
            <div class="d-grid gap-2">
                <a href="{{ route('admin.videos.edit', $video) }}" class="btn btn-primary rounded-pill">
                    <i class="fa-solid fa-edit me-2"></i>Edit Video
                </a>
                
                <form action="{{ route('admin.videos.destroy', $video) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this video?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger rounded-pill w-100">
                        <i class="fa-solid fa-trash me-2"></i>Delete Video
                    </button>
                </form>
            </div>
            
            @if($video->thumbnail)
                <hr class="my-4">
                <h6 class="fw-bold mb-3">Thumbnail</h6>
                <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="{{ $video->title }}" class="img-fluid rounded-3">
            @endif
        </div>
    </div>
</div>
@endsection
