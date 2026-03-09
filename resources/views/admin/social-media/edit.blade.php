@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Edit Social Media Account" 
    subtitle="Update social media account information and settings."
>
    <x-slot name="action">
        <a href="{{ route('admin.social-media.index') }}" class="btn btn-light rounded-pill px-4">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to Social Media
        </a>
    </x-slot>
</x-admin.card-header>

<form action="{{ route('admin.social-media.update', 1) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
                
                {{-- Platform --}}
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Platform *</label>
                    <select 
                        name="platform" 
                        class="form-select rounded-4 p-3 @error('platform') is-invalid @enderror" 
                        required
                    >
                        <option value="">Select Platform</option>
                        @foreach($platforms as $value => $label)
                            <option value="{{ $value }}" {{ old('platform') == $value || $socialAccount['platform'] == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('platform') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Handle --}}
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Handle/Username *</label>
                    <input 
                        type="text" 
                        name="handle" 
                        class="form-control rounded-4 p-3 @error('handle') is-invalid @enderror" 
                        placeholder="e.g., @ethiopianmedicine" 
                        value="{{ old('handle', $socialAccount['handle']) }}" 
                        required
                    >
                    @error('handle') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- URL --}}
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Profile URL *</label>
                    <input 
                        type="url" 
                        name="url" 
                        class="form-control rounded-4 p-3 @error('url') is-invalid @enderror" 
                        placeholder="https://facebook.com/ethiopianmedicine" 
                        value="{{ old('url', $socialAccount['url']) }}" 
                        required
                    >
                    @error('url') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Description --}}
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Description</label>
                    <textarea 
                        name="description" 
                        rows="4" 
                        class="form-control rounded-4 p-3 @error('description') is-invalid @enderror" 
                        placeholder="Brief description of this social media account..."
                    >{{ old('description', $socialAccount['description']) }}</textarea>
                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Active Status --}}
                <div class="form-group mb-4">
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            name="is_active" 
                            id="is_active" 
                            value="1" 
                            {{ old('is_active', $socialAccount['is_active']) ? 'checked' : '' }}
                        >
                        <label class="form-check-label fw-bold" for="is_active">
                            Active Account
                        </label>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-3">
                        <i class="fa-solid fa-save me-2"></i>Update Account
                    </button>
                    <a href="{{ route('admin.social-media.index') }}" class="btn btn-light rounded-pill px-4 py-3">
                        <i class="fa-solid fa-times me-2"></i>Cancel
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Sidebar -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-0" style="border-radius: 24px; background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
                <div class="p-4 border-bottom border-light">
                    <h5 class="fw-bold mb-2 text-dark">Account Preview</h5>
                    <small class="text-muted">How your account will appear</small>
                </div>
                <div class="p-4">
                    <div class="text-center mb-4">
                        <div class="icon-box bg-primary bg-opacity-10 rounded-4 p-4 d-inline-block mb-3">
                            <i class="fa-brands fa-{{ old('platform', $socialAccount['platform']) }} fa-2x text-primary"></i>
                        </div>
                        <h6 class="fw-bold">{{ old('handle', $socialAccount['handle']) }}</h6>
                        <small class="text-muted">{{ ucfirst(old('platform', $socialAccount['platform'])) }}</small>
                    </div>

                    <div class="p-3 bg-white rounded-4">
                        <h6 class="fw-bold mb-2">Quick Stats</h6>
                        <div class="small text-muted">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Platform:</span>
                                <span class="fw-bold">{{ ucfirst(old('platform', $socialAccount['platform'])) }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Handle:</span>
                                <span class="fw-bold">{{ old('handle', $socialAccount['handle']) }}</span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>Status:</span>
                                <span class="fw-bold">{{ old('is_active', $socialAccount['is_active']) ? 'Active' : 'Inactive' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
