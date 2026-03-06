@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Add Video Tutorial" 
    subtitle="Upload a new treatment demonstration or educational video."
>
    <x-slot name="action">
        <a href="{{ route('admin.videos.index') }}" class="btn btn-light rounded-pill px-4">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to Library
        </a>
    </x-slot>
</x-admin.card-header>

<form action="{{ route('admin.videos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Video Title</label>
                    <input type="text" name="title" class="form-control rounded-4 p-3 @error('title') is-invalid @enderror" placeholder="e.g. How to prepare Kosso infusion" value="{{ old('title') }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Video URL (YouTube/Vimeo/etc)</label>
                    <input type="url" name="video_url" id="video_url" class="form-control rounded-4 p-3 @error('video_url') is-invalid @enderror" placeholder="https://www.youtube.com/watch?v=..." value="{{ old('video_url') }}" required>
                    @error('video_url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div id="video-preview-row" class="mb-4 d-none">
                    <label class="form-label fw-bold">Playback Preview</label>
                    <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm bg-black">
                        <iframe id="create-video-preview" src="" allowfullscreen></iframe>
                    </div>
                </div>
                
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" rows="5" class="form-control rounded-4 p-3" placeholder="Briefly describe what this video covers...">{{ old('description') }}</textarea>
                </div>
                
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 fw-bold">Save Video</button>
                </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 24px;">
            <h6 class="fw-bold mb-3">Video Settings</h6>
            
            <div class="form-group mb-4">
                <label class="form-label small fw-bold text-secondary">Video Thumbnail</label>
                <div class="image-preview-wrapper" id="preview-wrapper">
                    <img src="" id="preview-img">
                </div>
                <div class="image-upload-area border border-2 border-dashed rounded-4 p-4 text-center" style="background: #f8f9fa; border-color: #dee2e6 !important;">
                    <i class="fa-solid fa-image fa-2x text-secondary opacity-50 mb-3"></i>
                    <div class="small text-secondary mb-3">Upload a clean thumbnail</div>
                    <input type="file" name="thumbnail" class="d-none" id="thumbnail">
                    <label for="thumbnail" class="btn btn-sm btn-outline-primary rounded-pill px-3">Choose File</label>
                </div>
                @error('thumbnail') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            
            <div class="form-group">
                <label class="form-label small fw-bold text-secondary">Category</label>
                <select name="category_id" class="form-select rounded-pill px-3 @error('category_id') is-invalid @enderror" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>
</form>

<script>
    document.getElementById('thumbnail').addEventListener('change', function(e) {
        const previewWrapper = document.getElementById('preview-wrapper');
        const previewImg = document.getElementById('preview-img');
        const file = e.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                previewImg.src = event.target.result;
                previewWrapper.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });

    function getEmbedUrl(url) {
        if (!url) return '';
        
        let videoId = '';
        if (url.includes('youtube.com') || url.includes('youtu.be')) {
            const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            const match = url.match(regExp);
            videoId = (match && match[2].length === 11) ? match[2] : null;
            return videoId ? `https://www.youtube.com/embed/${videoId}` : '';
        } else if (url.includes('vimeo.com')) {
            const regExp = /vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/;
            const match = url.match(regExp);
            videoId = match ? match[3] : null;
            return videoId ? `https://player.vimeo.com/video/${videoId}` : '';
        }
        return url;
    }

    document.getElementById('video_url').addEventListener('input', function(e) {
        const url = e.target.value;
        const embedUrl = getEmbedUrl(url);
        const previewRow = document.getElementById('video-preview-row');
        const previewFrame = document.getElementById('create-video-preview');

        if (embedUrl) {
            previewFrame.src = embedUrl;
            previewRow.classList.remove('d-none');
        } else {
            previewRow.classList.add('d-none');
            previewFrame.src = '';
        }
    });
</script>
@endsection
