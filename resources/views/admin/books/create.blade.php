@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Add New Book" 
    subtitle="Publish a new physical or digital book to your store."
>
    <x-slot name="action">
        <a href="{{ route('admin.books.index') }}" class="btn btn-light rounded-pill px-4">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to Store
        </a>
    </x-slot>
</x-admin.card-header>

<form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" id="book-form">
    @csrf
    <div class="row g-4">
        <!-- Main Content -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Book Title</label>
                    <input type="text" name="title" class="form-control rounded-4 p-3 @error('title') is-invalid @enderror" placeholder="e.g. Traditional Cures for Modern Times" value="{{ old('title') }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" id="summernote" rows="8" class="form-control rounded-4 p-3" placeholder="Write a compelling summary of the book...">{{ old('description') }}</textarea>
                </div>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">Price (ETB)</label>
                            <div class="input-group">
                                <span class="input-group-text rounded-start-4 bg-light border-end-0">ETB</span>
                                <input type="number" name="price" step="0.01" class="form-control rounded-end-4 p-3 border-start-0 @error('price') is-invalid @enderror" placeholder="250.00" value="{{ old('price') }}" required>
                            </div>
                            @error('price') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">Book Format</label>
                            <select name="type" class="form-select rounded-4 p-3 @error('type') is-invalid @enderror" required id="book-type">
                                <option value="physical" {{ old('type') == 'physical' ? 'selected' : '' }}>Physical Copy</option>
                                <option value="digital" {{ old('type') == 'digital' ? 'selected' : '' }}>Digital (PDF/EPUB)</option>
                            </select>
                            @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 fw-bold">Add Book to Store</button>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <!-- Fulfillment Details -->
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 24px;">
                <h6 class="fw-bold mb-4">Fulfillment Details</h6>
                
                <div id="stock-group" class="form-group mb-4 {{ old('type') == 'digital' ? 'd-none' : '' }}">
                    <label class="form-label small fw-bold text-secondary">Inventory Stock</label>
                    <input type="number" name="stock" class="form-control rounded-pill px-3" placeholder="0" value="{{ old('stock', 0) }}">
                    <div class="small text-secondary mt-1 italic">Number of copies available for shipping.</div>
                </div>
                
                <div id="file-group" class="form-group mb-4 {{ old('type') != 'digital' ? 'd-none' : '' }}">
                    <label class="form-label small fw-bold text-secondary">Digital File</label>
                    <div class="file-upload border border-2 border-dashed rounded-4 p-4 text-center" style="background: #f8f9fa;">
                        <i class="fa-solid fa-file-pdf fa-2x text-primary opacity-50 mb-3"></i>
                        <div class="small text-secondary mb-3 text-truncate" id="file-name">Upload PDF/EPUB</div>
                        <input type="file" name="file" class="d-none" id="book-file">
                        <label for="book-file" class="btn btn-sm btn-outline-primary rounded-pill px-3">Choose File</label>
                    </div>
                    @error('file') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group mb-4">
                    <div class="dropzone" id="book-covers-dropzone" style="border: 2px dashed #28a745; border-radius: 8px; padding: 20px; text-align: center;">
                        <div class="dz-message" data-dz-message>
                            <i class="fa-solid fa-cloud-upload-alt fa-3x text-success mb-3"></i>
                            <div class="text-success mb-2">Drop book cover images here or click to browse</div>
                            <small class="text-muted">Support: JPG, PNG, GIF (Max 5 files, 2MB each)</small>
                        </div>
                    </div>
                    @error('cover') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="card border-0 shadow-sm p-4 bg-primary bg-opacity-10 text-primary" style="border-radius: 24px;">
                <div class="d-flex align-items-center mb-2">
                    <i class="fa-solid fa-lightbulb me-2"></i>
                    <h6 class="fw-bold mb-0">Elite Tip</h6>
                </div>
                <p class="small mb-0">Books with high-quality cover images and detailed descriptions get 3x more sales in the store.</p>
            </div>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Summernote
    $('#summernote').summernote({
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture']],
            ['view', ['fullscreen', 'codeview']]
        ]
    });

    // Sync summernote content with textarea before form submission
    document.querySelector("form").addEventListener("submit", function(e) {
        // Update textarea with summernote content
        const summernoteContent = $('#summernote').summernote('code');
        document.querySelector('textarea[name="description"]').value = summernoteContent;
    });

    // Book type toggle functionality
    document.getElementById('book-type').addEventListener('change', function() {
        const type = this.value;
        const stockGroup = document.getElementById('stock-group');
        const fileGroup = document.getElementById('file-group');
        
        if (type === 'digital') {
            stockGroup.classList.add('d-none');
            fileGroup.classList.remove('d-none');
        } else {
            stockGroup.classList.remove('d-none');
            fileGroup.classList.add('d-none');
        }
    });

    // File upload functionality
    document.getElementById('book-file').addEventListener('change', function() {
        if (this.files.length > 0) {
            document.getElementById('file-name').textContent = this.files[0].name;
        }
    });

    // Dropzone init
    Dropzone.autoDiscover = false;
    const myDropzone = new Dropzone("#book-covers-dropzone", {
        url: "{{ route('admin.books.store') }}",
        paramName: "cover",
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 5,
        maxFiles: 5,
        acceptedFiles: "image/*",
        addRemoveLinks: true
    });

    // Form submission
    const form = document.getElementById("book-form");
    form.addEventListener("submit", function(e) {
        e.preventDefault();
        let formData = new FormData(form);

        // Remove existing cover to avoid conflicts
        formData.delete('cover');

        // Append accepted Dropzone files correctly
        myDropzone.getAcceptedFiles().forEach(function(file, index){
            formData.append(`cover[${index}]`, file);
        });

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
                showToast(data.message || 'Book created successfully!', 'success');
                setTimeout(() => window.location.href = "{{ route('admin.books.index') }}", 1500);
            } else {
                showToast(data.message || 'Error creating book', 'error');
            }
        })
        .catch(err => {
            console.error(err);
            showToast('Error creating book', 'error');
        });
    });
});

// Toast notification function
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
