@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Add New Medicinal Plant" 
    subtitle="Catalog a new species and its traditional medical properties."
>
    <x-slot name="action">
        <a href="{{ route('admin.plants.index') }}" class="btn btn-light rounded-pill px-4">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to Encyclopedia
        </a>
    </x-slot>
</x-admin.card-header>

<form id="plant-form" action="{{ route('admin.plants.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <!-- Main Details -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 24px;">
                <h6 class="fw-bold mb-4">Core Identification</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">Common Name</label>
                        <input type="text" name="name" class="form-control rounded-4 p-3 @error('name') is-invalid @enderror" placeholder="e.g. Kosso" value="{{ old('name') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">Local Name (Amharic/Oromo/etc)</label>
                        <input type="text" name="local_name" class="form-control rounded-4 p-3" placeholder="e.g. ኮሶ" value="{{ old('local_name') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">Scientific Name</label>
                        <input type="text" name="scientific_name" class="form-control rounded-4 p-3 italic" placeholder="e.g. Hagenia abyssinica" value="{{ old('scientific_name') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">Primary Region</label>
                        <input type="text" name="region" class="form-control rounded-4 p-3" placeholder="e.g. Highlands of Ethiopia" value="{{ old('region') }}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-bold">Price (ETB)</label>
                        <input type="number" name="price" class="form-control rounded-4 p-3" placeholder="0.00" value="{{ old('price') }}" step="0.01" min="0">
                    </div>
                </div>
                
                <div class="form-group mt-4">
                    <label class="form-label small fw-bold">General Description</label>
                    <textarea name="description" id="description" class="form-control rounded-4 p-3" placeholder="Describe the plant's appearance and history...">{{ old('description') }}</textarea>
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
                    <div class="use-item p-3 rounded-4 border border-light mb-3" style="background: #fcfcfc;">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Target Disease/Condition</label>
                                <input type="text" name="uses[0][disease]" class="form-control rounded-pill px-3" placeholder="e.g. Tapeworm" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small fw-bold">Dosage</label>
                                <input type="text" name="uses[0][dosage]" class="form-control rounded-pill px-3" placeholder="e.g. 1 cup of infusion">
                            </div>
                            <div class="col-12">
                                <label class="form-label small fw-bold">Preparation Method</label>
                                <textarea name="uses[0][preparation]" rows="2" class="form-control rounded-4 p-3" placeholder="How is it prepared?"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sidebar Options -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4 mb-4" style="border-radius: 24px;">
                <h6 class="fw-bold mb-3">Plant Imagery</h6>
                <div class="form-group mb-4">
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
                    <textarea name="safety_warning" rows="4" class="form-control rounded-4 p-3 border-danger border-opacity-10 bg-danger bg-opacity-10" placeholder="List any toxicities or side effects...">{{ old('safety_warning') }}</textarea>
                </div>
            </div>
            
            <div class="d-grid shadow-sm">
                <button type="submit" class="btn btn-primary rounded-pill py-3 fw-bold">
                    <i class="fa-solid fa-floppy-disk me-2"></i>Save Plant to Database
                </button>
            </div>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Summernote initialization (if jQuery loaded)
    if (typeof $ !== 'undefined' && $.fn.summernote) {
        $('#description').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold','italic','underline','clear']],
                ['para', ['ul','ol','paragraph']],
                ['insert', ['link','picture']],
                ['view', ['fullscreen','codeview']]
            ]
        });
    }

    // Dropzone init
    Dropzone.autoDiscover = false;
    const myDropzone = new Dropzone("#image-dropzone", {
        url: "#",
        paramName: "image",
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads: 5,
        maxFiles: 5,
        acceptedFiles: "image/*",
        addRemoveLinks: true
    });

    // Form submission
    const form = document.getElementById("plant-form");
    form.addEventListener("submit", function(e) {
        e.preventDefault();
        let formData = new FormData(form);

        // Append accepted Dropzone files correctly
        myDropzone.getAcceptedFiles().forEach(function(file, index){
            formData.append(`image[${index}]`, file);
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
                showToast(data.message || 'Plant created successfully!', 'success');
                setTimeout(() => {
                    window.location.href = "{{ route('admin.plants.index') }}";
                }, 1500);
            } else {
                showToast(data.message || 'Error creating plant', 'error');
            }
        })
        .catch(err => {
            console.error(err);
            showToast('Error creating plant', 'error');
        });
    });

    // Add dynamic "use" fields
    let useCount = 1;
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