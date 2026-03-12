@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Create New Article" 
    subtitle="Publish your medical research and traditional knowledge."
>
    <x-slot name="action">
        <a href="{{ route('admin.articles.index') }}" class="btn btn-light rounded-pill px-4">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to List
        </a>
    </x-slot>
</x-admin.card-header>

<form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data" id="article-form">
    @csrf
    <div class="row g-4">
        <!-- Main Content -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Article Title</label>
                    <input type="text" name="title" class="form-control rounded-4 p-3 @error('title') is-invalid @enderror" placeholder="e.g. Benefits of Kosso (Hagenia abyssinica)" value="{{ old('title') }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Content</label>
                    <textarea name="content" rows="12" class="form-control rounded-4 p-3 @error('content') is-invalid @enderror" placeholder="Write your research here..." required>{{ old('content') }}</textarea>
                    @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" name="status" value="draft" class="btn btn-light rounded-pill px-4 py-2 fw-bold text-secondary">Save as Draft</button>
                    <button type="submit" name="status" value="published" class="btn btn-primary rounded-pill px-5 py-2 fw-bold">Publish Now</button>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 24px;">
                <h6 class="fw-bold mb-3">Publishing Options</h6>
                
                <div class="form-group mb-4">
                    <div class="dropzone" id="article-images-dropzone" style="border: 2px dashed #28a745; border-radius: 8px; padding: 20px; text-align: center;">
                        <div class="dz-message" data-dz-message>
                            <i class="fa-solid fa-cloud-upload-alt fa-3x text-success mb-3"></i>
                            <div class="text-success mb-2">Drop article images here or click to browse</div>
                            <small class="text-muted">Support: JPG, PNG, GIF (Max 5 files, 2MB each)</small>
                        </div>
                    </div>
                    @error('featured_image') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="form-group mb-4">
                    <label class="form-label small fw-bold text-secondary">Categories</label>
                    <div class="categories-selector d-flex flex-wrap gap-2">
                        @foreach($categories as $category)
                            <div class="category-item">
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="btn-check" id="cat-{{ $category->id }}">
                                <label class="btn btn-sm btn-outline-secondary border-1 rounded-pill px-3" for="cat-{{ $category->id }}">{{ $category->name }}</label>
                            </div>
                        @endforeach
                        @if($categories->isEmpty())
                            <div class="text-secondary small italic">No categories available.</div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm p-4 bg-primary bg-opacity-10 text-primary" style="border-radius: 24px;">
                <div class="d-flex align-items-center mb-2">
                    <i class="fa-solid fa-lightbulb me-2"></i>
                    <h6 class="fw-bold mb-0">Elite Tip</h6>
                </div>
                <p class="small mb-0">Articles with high-quality images and specific tags get 3x more engagement within the community.</p>
            </div>
        </div>
    </div>
</form>

<!-- Dropzone JS -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    Dropzone.autoDiscover = false;

    const myDropzone = new Dropzone("#article-images-dropzone", {
        url: "{{ route('admin.articles.store') }}", 
        autoProcessQueue: false,
        maxFiles: 5,
        acceptedFiles: "image/*",
        addRemoveLinks: true
    });

    const form = document.getElementById("article-form");

    // Track clicked submit button to include `status`
    let clickedButtonValue = null;
    document.querySelectorAll('#article-form button[type="submit"]').forEach(button => {
        button.addEventListener('click', function() {
            clickedButtonValue = this.value; // draft or published
        });
    });

    form.addEventListener("submit", function(e) {
        e.preventDefault();

        const formData = new FormData(form);

        // Append Dropzone files
        myDropzone.getAcceptedFiles().forEach(file => {
            formData.append('featured_image[]', file);
        });

        // Append the clicked status button value
        if(clickedButtonValue) {
            formData.append('status', clickedButtonValue);
        }

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
                showToast(data.message || 'Article created successfully!', 'success');
                setTimeout(() => window.location.href = "{{ route('admin.articles.index') }}", 1500);
            } else {
                showToast(data.message || 'Error creating article', 'error');
            }
        })
        .catch(err => {
            console.error(err);
            showToast('Error creating article', 'error');
        });
    });
});

function showToast(message, type = 'success') {
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
    setTimeout(() => { if(toast.parentNode) toast.remove(); }, 5000);
}
</script>
@endsection