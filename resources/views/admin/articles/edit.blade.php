@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Edit Article" 
    subtitle="Update your research: {{ $article->title }}"
>
    <x-slot name="action">
        <a href="{{ route('admin.articles.index') }}" class="btn btn-light rounded-pill px-4">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to List
        </a>
    </x-slot>
</x-admin.card-header>

<form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Article Title</label>
                    <input type="text" name="title" class="form-control rounded-4 p-3 @error('title') is-invalid @enderror" placeholder="e.g. Benefits of Kosso" value="{{ old('title', $article->title) }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Content</label>
                    <textarea name="content" rows="12" class="form-control rounded-4 p-3 @error('content') is-invalid @enderror" placeholder="Write your research here..." required>{{ old('content', $article->content) }}</textarea>
                    @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" name="status" value="draft" class="btn btn-light rounded-pill px-4 py-2 fw-bold text-secondary">Save as Draft</button>
                    <button type="submit" name="status" value="published" class="btn btn-primary rounded-pill px-5 py-2 fw-bold">Update & Publish</button>
                </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 24px;">
            <h6 class="fw-bold mb-3">Publishing Options</h6>
            
            <div class="form-group mb-4">
                <label class="form-label small fw-bold text-secondary">Featured Image</label>
                <div class="image-preview-wrapper" id="preview-wrapper" {!! $article->featured_image ? 'style="display: block;"' : '' !!}>
                    <img src="{{ $article->featured_image ? asset('storage/' . $article->featured_image) : '' }}" id="preview-img">
                </div>
                <div class="image-upload-area border border-2 border-dashed rounded-4 p-4 text-center" style="background: #f8f9fa; border-color: #dee2e6 !important;">
                    <i class="fa-solid fa-cloud-arrow-up fa-2x text-secondary opacity-50 mb-3"></i>
                    <div class="small text-secondary mb-3">Replace current image or browse</div>
                    <input type="file" name="featured_image" class="d-none" id="featured_image">
                    <label for="featured_image" class="btn btn-sm btn-outline-primary rounded-pill px-3">Choose File</label>
                </div>
                @error('featured_image') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            
            <div class="form-group mb-4">
                <label class="form-label small fw-bold text-secondary">Categories</label>
                <div class="categories-selector d-flex flex-wrap gap-2">
                    @foreach($categories as $category)
                        <div class="category-item">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="btn-check" id="cat-{{ $category->id }}" {{ $article->categories->contains($category->id) ? 'checked' : '' }}>
                            <label class="btn btn-sm btn-outline-secondary border-1 rounded-pill px-3" for="cat-{{ $category->id }}">{{ $category->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="pt-3 border-top mt-2">
                <div class="small text-secondary mb-1">Status: <x-admin.status-badge :status="$article->status" /></div>
                <div class="small text-secondary">Views: <strong>{{ number_format($article->views) }}</strong></div>
            </div>
        </div>
    </div>
</form>

<script>
    document.getElementById('featured_image').addEventListener('change', function(e) {
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
</script>
@endsection
