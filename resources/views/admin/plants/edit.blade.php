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

<form action="{{ route('admin.plants.update', $plant) }}" method="POST" enctype="multipart/form-data">
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
                </div>
                
                <div class="form-group mt-4">
                    <label class="form-label small fw-bold">General Description</label>
                    <textarea name="description" rows="5" class="form-control rounded-4 p-3">{{ old('description', $plant->description) }}</textarea>
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
                <div class="image-preview-wrapper" id="preview-wrapper" {!! $plant->image ? 'style="display: block;"' : '' !!}>
                    <img src="{{ $plant->image ? asset('storage/' . $plant->image) : '' }}" id="preview-img">
                </div>
                <div class="form-group mb-4">
                    <div class="image-upload-area border border-2 border-dashed rounded-4 p-4 text-center" style="background: #e8f5e9; border-color: #a5d6a7 !important;">
                        <i class="fa-solid fa-seedling fa-2x text-success opacity-50 mb-3"></i>
                        <div class="small text-success mb-3">Replace plant photo</div>
                        <input type="file" name="image" class="d-none" id="image">
                        <label for="image" class="btn btn-sm btn-success rounded-pill px-3">Choose File</label>
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

    document.querySelectorAll('.remove-use-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            this.closest('.use-item').remove();
        });
    });

    document.getElementById('image').addEventListener('change', function(e) {
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
