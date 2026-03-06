@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Edit Book Details" 
    subtitle="Update inventory or publication info for: {{ $book->title }}"
>
    <x-slot name="action">
        <a href="{{ route('admin.books.index') }}" class="btn btn-light rounded-pill px-4">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to Store
        </a>
    </x-slot>
</x-admin.card-header>

<form action="{{ route('admin.books.update', $book) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Book Title</label>
                    <input type="text" name="title" class="form-control rounded-4 p-3 @error('title') is-invalid @enderror" placeholder="e.g. Traditional Cures" value="{{ old('title', $book->title) }}" required>
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" rows="8" class="form-control rounded-4 p-3">{{ old('description', $book->description) }}</textarea>
                </div>
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">Price (ETB)</label>
                            <div class="input-group">
                                <span class="input-group-text rounded-start-4 bg-light border-end-0">ETB</span>
                                <input type="number" name="price" step="0.01" class="form-control rounded-end-4 p-3 border-start-0 @error('price') is-invalid @enderror" value="{{ old('price', $book->price) }}" required>
                            </div>
                            @error('price') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label class="form-label fw-bold">Book Format</label>
                            <select name="type" class="form-select rounded-4 p-3 @error('type') is-invalid @enderror" required id="book-type">
                                <option value="physical" {{ old('type', $book->type) == 'physical' ? 'selected' : '' }}>Physical Copy</option>
                                <option value="digital" {{ old('type', $book->type) == 'digital' ? 'selected' : '' }}>Digital (PDF/EPUB)</option>
                            </select>
                            @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-end gap-2">
                    <button type="submit" class="btn btn-primary rounded-pill px-5 py-3 fw-bold">Update Book Info</button>
                </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <!-- Fulfillment Details -->
        <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 24px;">
            <h6 class="fw-bold mb-4">Fulfillment Details</h6>
            
            <div id="stock-group" class="form-group mb-4 {{ old('type', $book->type) == 'digital' ? 'd-none' : '' }}">
                <label class="form-label small fw-bold text-secondary">Inventory Stock</label>
                <input type="number" name="stock" class="form-control rounded-pill px-3" value="{{ old('stock', $book->stock) }}">
            </div>
            
            <div id="file-group" class="form-group mb-4 {{ old('type', $book->type) != 'digital' ? 'd-none' : '' }}">
                <label class="form-label small fw-bold text-secondary">Digital File</label>
                @if($book->file)
                    <div class="mb-2 small text-success"><i class="fa-solid fa-circle-check"></i> File currently uploaded</div>
                @endif
                <div class="file-upload border border-2 border-dashed rounded-4 p-4 text-center" style="background: #f8f9fa;">
                    <i class="fa-solid fa-file-pdf fa-2x text-primary opacity-50 mb-3"></i>
                    <div class="small text-secondary mb-3 text-truncate" id="file-name">Replace PDF/EPUB</div>
                    <input type="file" name="file" class="d-none" id="book-file">
                    <label for="book-file" class="btn btn-sm btn-outline-primary rounded-pill px-3">Choose File</label>
                </div>
                @error('file') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
            
            <div class="form-group mb-2">
                <label class="form-label small fw-bold text-secondary">Book Cover</label>
                <div class="image-preview-wrapper" id="preview-wrapper" {!! $book->cover ? 'style="display: block;"' : '' !!}>
                    <img src="{{ $book->cover ? asset('storage/' . $book->cover) : '' }}" id="preview-img">
                </div>
                <div class="image-upload border border-2 border-dashed rounded-4 p-4 text-center" style="background: #fcfcfc;">
                    <i class="fa-solid fa-image fa-2x text-secondary opacity-50 mb-3"></i>
                    <div class="small text-secondary mb-3">Replace cover image</div>
                    <input type="file" name="cover" class="d-none" id="cover">
                    <label for="cover" class="btn btn-sm btn-outline-secondary rounded-pill px-3">Choose Image</label>
                </div>
                @error('cover') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
            </div>
        </div>
    </div>
</form>

<script>
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

    document.getElementById('book-file').addEventListener('change', function() {
        if (this.files.length > 0) {
            document.getElementById('file-name').textContent = this.files[0].name;
        }
    });
    document.getElementById('cover').addEventListener('change', function(e) {
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
