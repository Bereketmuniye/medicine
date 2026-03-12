@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Edit Medicinal Plant" 
    subtitle="Update catalog info for: {{ $plant->name }}"
>
    <x-slot name="action">
        <a href="{{ route('admin.plants.index') }}" class="btn btn-light rounded-pill px-4">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to Encyclopedia
        </a>
    </x-slot>
</x-admin.card-header>

<form id="plant-form" action="{{ route('admin.plants.update', $plant) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-4">
        <!-- Main Details -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 24px;">
                <h6 class="fw-bold mb-4">Core Identification</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">Common Name</label>
                        <input type="text" name="name" class="form-control rounded-4 p-3 @error('name') is-invalid @enderror" placeholder="e.g. Kosso" value="{{ old('name', $plant->name) }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">Local Name</label>
                        <input type="text" name="local_name" class="form-control rounded-4 p-3" placeholder="e.g. ኮሶ" value="{{ old('local_name', $plant->local_name) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">Scientific Name</label>
                        <input type="text" name="scientific_name" class="form-control rounded-4 p-3 italic" placeholder="e.g. Hagenia abyssinica" value="{{ old('scientific_name', $plant->scientific_name) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">Primary Region</label>
                        <input type="text" name="region" class="form-control rounded-4 p-3" placeholder="e.g. Highlands" value="{{ old('region', $plant->region) }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">Price (ETB)</label>
                        <input type="number" name="price" class="form-control rounded-4 p-3" placeholder="0.00" value="{{ old('price', $plant->price) }}" step="0.01" min="0">
                    </div>
                </div>
                
                <div class="form-group mt-4">
                    <label class="form-label small fw-bold">General Description</label>
                    <textarea name="description" id="description" class="form-control rounded-4 p-3" placeholder="Describe the plant's appearance and history...">{{ old('description', $plant->description) }}</textarea>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h6 class="fw-bold mb-0">Traditional Medical Uses</h6>
                    <button type="button" class="btn btn-sm btn-light rounded-pill px-3" id="add-use-btn">
                        <i class="fa-solid fa-plus me-1"></i> Add Another Use
                    </button>
                </div>
                
                <div id="uses-container">
                    @foreach($plant->uses as $index => $use)
                        <div class="use-item p-3 rounded-4 border border-light mb-3" style="background: #fcfcfc;">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Target Disease/Condition</label>
                                    <input type="text" name="uses[{{ $index }}][disease]" class="form-control rounded-pill px-3" value="{{ $use->disease }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Dosage</label>
                                    <input type="text" name="uses[{{ $index }}][dosage]" class="form-control rounded-pill px-3" value="{{ $use->dosage }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label small fw-bold">Preparation Method</label>
                                    <textarea name="uses[{{ $index }}][preparation]" rows="2" class="form-control rounded-4 p-3">{{ $use->preparation }}</textarea>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="button" class="btn btn-sm btn-link text-danger p-0 remove-use-btn">Remove this use</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!-- Sidebar Options -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 24px;">
                <h6 class="fw-bold mb-3">Plant Imagery</h6>
                
                <!-- Display existing images -->
                @if($plant->image)
                <div class="mb-4">
                    <label class="form-label small fw-bold">Current Images</label>
                    <div class="existing-images-preview">
                        @php
                            $images = json_decode($plant->image, true);
                            if (!is_array($images)) {
                                $images = [$plant->image];
                            }
                        @endphp
                        @foreach($images as $image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $plant->name }}" class="img-fluid rounded-3" style="max-height: 150px; width: auto; margin-right: 10px;">
                            </div>
                        @endforeach
                        <div class="small text-muted mt-2">Currently uploaded images</div>
                    </div>
                </div>
                @endif
                
                <div class="form-group mb-4">
                    <label class="form-label small fw-bold">
                        {{ $plant->image ? 'Replace or add more images' : 'Upload plant images' }}
                    </label>
                    <div class="dropzone" id="image-dropzone" style="border: 2px dashed #28a745; border-radius: 8px; padding: 20px; background: #f8f9fa; text-align: center;">
                        <div class="dz-message" data-dz-message>
                            <i class="fa-solid fa-cloud-upload-alt fa-3x text-success mb-3"></i>
                            <div class="text-success mb-2">Drop plant photos here or click to browse</div>
                            <small class="text-muted">Support for: JPG, PNG, GIF (Max 5 files, 2MB each)</small>
                        </div>
                    </div>
                    @error('image') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group">
                    <label class="form-label small fw-bold text-danger"><i class="fa-solid fa-triangle-exclamation"></i> Safety Warning</label>
                    <textarea name="safety_warning" rows="4" class="form-control rounded-4 p-3 border-danger border-opacity-10 bg-danger bg-opacity-10">{{ old('safety_warning', $plant->safety_warning) }}</textarea>
                </div>
            </div>
            
            <div class="d-grid shadow-sm">
                <button type="submit" class="btn btn-primary rounded-pill py-3 fw-bold">
                    <i class="fa-solid fa-floppy-disk me-2"></i>Update database Record
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
          if (typeof $ !== 'undefined') {
            $('#description').summernote({
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        } else {
            // Fallback: Initialize Summernote with vanilla JS
            const descriptionTextarea = document.getElementById('description');
            if (descriptionTextarea && window.Summernote) {
                window.Summernote.create(descriptionTextarea, {
                    height: 200,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link', 'picture']],
                        ['view', ['fullscreen', 'codeview']]
                    ]
                });
            }
        }
        // Initialize Dropzone for image upload
        Dropzone.autoDiscover = false;
        
        const myDropzone = new Dropzone("#image-dropzone", {
            url: "{{ route('admin.plants.update', $plant) }}",
            paramName: "image[]",
            maxFiles: 5,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            autoProcessQueue: false, // Don't auto-upload, will be handled by form submission
            dictDefaultMessage: "Drop files here to upload",
            dictFallbackMessage: "Your browser does not support drag'n'drop file uploads",
            dictInvalidFileType: "You can't upload files of this type.",
            dictMaxFilesExceeded: "You can only upload 5 files at once.",
            init: function() {
                const dropzone = this;
                
                // Store files for form submission
                dropzone.filesQueue = [];
                
                // Add file to queue
                dropzone.on("addedfile", function(file) {
                    dropzone.filesQueue.push(file);
                    console.log('File added to queue:', file.name);
                });
                
                // Remove file from queue
                dropzone.on("removedfile", function(file) {
                    const index = dropzone.filesQueue.indexOf(file);
                    if (index > -1) {
                        dropzone.filesQueue.splice(index, 1);
                    }
                    console.log('File removed from queue:', file.name);
                });
            },
            // Create hidden input files for form submission
            sending: function(file, xhr, formData) {
                // Add all queued files to form data
                dropzone.filesQueue.forEach(function(file, index) {
                    formData.append('image[' + index + ']', file);
                });
                return true;
            }
        });

          const form = document.getElementById("plant-form");

          form.addEventListener("submit", function (e) {
            e.preventDefault(); // Prevent default form submission
            
            if (myDropzone.filesQueue.length > 0) {
                // Create FormData to include all form data and files
                const formData = new FormData(form);
                
                // Add Dropzone files to FormData
                myDropzone.filesQueue.forEach(function(file, index) {
                    formData.append('image[]', file);
                });
                
                // Submit via fetch or XMLHttpRequest
                const method = form.querySelector('input[name="_method"]')?.value || 'POST';
                const action = form.action;
                
                // For PUT/PATCH requests, we need to include the _method field in FormData
                if (method !== 'POST') {
                    formData.append('_method', method);
                }
                
                fetch(action, {
                    method: 'POST', // Always use POST for Laravel method spoofing
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || document.querySelector('input[name="_token"]')?.value,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(data => {
                            throw new Error(data.message || 'Error updating plant');
                        });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        showToast('Plant updated successfully!', 'success');
                        setTimeout(() => {
                            window.location.href = "{{ route('admin.plants.index') }}";
                        }, 1500);
                    } else {
                        showToast(data.message || 'Error updating plant. Please try again.', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast(error.message || 'Error updating plant. Please try again.', 'error');
                });
            } else {
                // No files, submit normally
                form.submit();
            }
        });

        let useCount = {{ $plant->uses->count() }};
    document.getElementById('add-use-btn').addEventListener('click', function() {
        const container = document.getElementById('uses-container');
        const newItem = document.createElement('div');
        newItem.className = 'use-item p-3 rounded-4 border border-light mb-3';
        newItem.style.background = '#fcfcfc';
        newItem.innerHTML = `
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label small fw-bold">Target Disease/Condition</label>
                    <input type="text" name="uses[${useCount}][disease]" class="form-control rounded-pill px-3" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold">Dosage</label>
                    <input type="text" name="uses[${useCount}][dosage]" class="form-control rounded-pill px-3">
                </div>
                <div class="col-12">
                    <label class="form-label small fw-bold">Preparation Method</label>
                    <textarea name="uses[${useCount}][preparation]" rows="2" class="form-control rounded-4 p-3"></textarea>
                </div>
                <div class="col-12 text-end">
                    <button type="button" class="btn btn-sm btn-link text-danger p-0 remove-use-btn">Remove this use</button>
                </div>
            </div>
        `;
        container.appendChild(newItem);
        useCount++;
        
        newItem.querySelector('.remove-use-btn').addEventListener('click', function() {
            newItem.remove();
        });
    });
});
</script>
@endsection
