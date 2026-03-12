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
                    <textarea name="content" id="summernote-content" class="form-control @error('content') is-invalid @enderror" placeholder="Write your research here..." required>{{ old('content', $article->content) }}</textarea>
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
                <label class="form-label small fw-bold text-secondary">Images (Max 5)</label>
                
                @if($article->featured_image)
                    @php
                        $images = json_decode($article->featured_image, true);
                    @endphp
                    @if(is_array($images) && count($images) > 0)
                        <div class="current-images mb-3">
                            <div class="small text-secondary mb-2">Current Images ({{ count($images) }}):</div>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach($images as $index => $imgPath)
                                    <div class="current-image-item position-relative" style="border: 2px solid #e9ecef; border-radius: 8px; overflow: hidden;">
                                        <img src="{{ asset('storage/' . $imgPath) }}" 
                                             class="rounded-2" 
                                             style="width: 80px; height: 80px; object-fit: cover;"
                                             alt="Current image {{ $index + 1 }}">
                                        <div class="image-info small text-muted position-absolute bottom-0 end-0 m-1 bg-dark bg-opacity-75 text-white rounded px-1" style="font-size: 10px;">{{ $index + 1 }}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="small text-warning mt-2">
                                <i class="fa-solid fa-info-circle me-1"></i>
                                Uploading new images will replace all current images
                            </div>
                        </div>
                    @else
                        <div class="current-images mb-3">
                            <div class="small text-secondary mb-2">Current Image:</div>
                            <div class="current-image-item position-relative" style="border: 2px solid #e9ecef; border-radius: 8px; overflow: hidden; display: inline-block;">
                                <img src="{{ asset('storage/' . $article->featured_image) }}" 
                                     class="rounded-2" 
                                     style="width: 80px; height: 80px; object-fit: cover;"
                                     alt="Current image">
                            </div>
                            <div class="small text-warning mt-2">
                                <i class="fa-solid fa-info-circle me-1"></i>
                                Uploading new images will replace current image
                            </div>
                        </div>
                    @endif
                @endif
                
                <div class="dropzone" id="article-images-dropzone" style="border: 2px dashed #28a745; border-radius: 8px; padding: 20px; background: #f8f9fa; text-align: center;">
                    <div class="dz-message" data-dz-message>
                        <i class="fa-solid fa-cloud-upload-alt fa-3x text-success mb-3"></i>
                        <div class="text-success mb-2">Drop new article images here or click to browse</div>
                        <small class="text-muted">Support for: JPG, PNG, GIF (Max 5 files, 2MB each)</small>
                    </div>
                </div>
                <div id="image-previews" class="mt-3 d-flex flex-wrap gap-2"></div>
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
@endsection

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Dropzone init
    Dropzone.autoDiscover = false;
    const myDropzone = new Dropzone("#article-images-dropzone", {
        url: "{{ route('admin.articles.update', $article->id) }}",
        paramName: "featured_image",
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 5,
        maxFiles: 5,
        acceptedFiles: "image/*",
        addRemoveLinks: true
    });

    // Form submission
    const form = document.querySelector("form");
    form.addEventListener("submit", function(e) {
        e.preventDefault();
        let formData = new FormData(form);

        // Only handle image upload if there are new images
        const acceptedFiles = myDropzone.getAcceptedFiles();
        if (acceptedFiles.length > 0) {
            // Remove existing featured_image to avoid conflicts
            formData.delete('featured_image');
            
            // Append accepted Dropzone files correctly
            acceptedFiles.forEach(function(file, index){
                formData.append(`featured_image[${index}]`, file);
            });
        }

        // Add method override for PUT
        formData.append('_method', 'PUT');

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if(data.success){
                showToast(data.message || 'Article updated successfully!', 'success');
                setTimeout(() => {
                    window.location.href = "{{ route('admin.articles.index') }}";
                }, 1500);
            } else {
                showToast(data.message || 'Error updating article', 'error');
            }
        })
        .catch(err => {
            console.error(err);
            showToast('Error updating article', 'error');
        });
    });
});

// Toast notification function (if not already defined)
function showToast(message, type = 'success') {
    // Create toast element if it doesn't exist
    let toastContainer = document.getElementById('toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container';
        toastContainer.style.cssText = 'position: fixed; top: 20px; right: 20px; z-index: 9999;';
        document.body.appendChild(toastContainer);
    }
    
    const toast = document.createElement('div');
    toast.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
    toast.style.cssText = 'min-width: 300px; margin-bottom: 10px;';
    toast.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    toastContainer.appendChild(toast);
    
    // Auto remove after 5 seconds
    setTimeout(() => {
        if (toast.parentNode) {
            toast.remove();
        }
    }, 5000);
}
</script>

@section('scripts')
<script>
// Initialize Summernote
$(document).ready(function() {
    $('#summernote-content').summernote({
        height: 400,
        toolbar: [
            ['style', ['style', 'bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['para', ['ul', 'ol', 'paragraph', 'height']],
            ['insert', ['picture', 'link', 'video', 'table', 'hr']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        callbacks: {
            onInit: function() {
                // Set custom styles
                $('.note-editor').find('.note-toolbar').css('border-radius', '8px 8px 0 0');
                $('.note-editor').find('.note-editable').css('min-height', '300px');
            }
        }
    });
});
</script>
@endsection
