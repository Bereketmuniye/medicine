@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Add Social Media Account" 
    subtitle="Connect a new social media platform to your account."
>
    <x-slot name="action">
        <a href="{{ route('admin.social-media.index') }}" class="btn btn-light rounded-pill px-4">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to Social Media
        </a>
    </x-slot>
</x-admin.card-header>

<form action="{{ route('admin.social-media.store') }}" method="POST">
    @csrf
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
                            <option value="{{ $value }}" {{ old('platform') == $value ? 'selected' : '' }}>{{ $label }}</option>
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
                        value="{{ old('handle') }}" 
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
                        value="{{ old('url') }}" 
                        required
                    >
                    @error('url') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                            {{ old('is_active') ? 'checked' : '' }}
                        >
                        <label class="form-check-label fw-bold" for="is_active">
                            Active Account
                        </label>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-3">
                        <i class="fa-solid fa-save me-2"></i>Add Account
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
                    <h5 class="fw-bold mb-2 text-dark">Social Media Tips</h5>
                    <small class="text-muted">Best practices for social media management</small>
                </div>
                <div class="p-4">
                    <div class="mb-3 p-3 bg-white rounded-4">
                        <div class="d-flex align-items-start">
                            <i class="fa-solid fa-lightbulb text-primary mt-1 me-3"></i>
                            <div class="small text-muted">
                                <strong>Platform Selection:</strong> Choose platforms where your target audience is most active.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 p-3 bg-white rounded-4">
                        <div class="d-flex align-items-start">
                            <i class="fa-solid fa-hashtag text-primary mt-1 me-3"></i>
                            <div class="small text-muted">
                                <strong>Handle Format:</strong> Use consistent branding across all platforms with recognizable usernames.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 p-3 bg-white rounded-4">
                        <div class="d-flex align-items-start">
                            <i class="fa-solid fa-link text-primary mt-1 me-3"></i>
                            <div class="small text-muted">
                                <strong>Profile URL:</strong> Ensure the URL is correct and accessible for verification.
                            </div>
                        </div>
                    </div>

                    <div class="p-3 bg-white rounded-4">
                        <div class="d-flex align-items-start">
                            <i class="fa-solid fa-chart-line text-primary mt-1 me-3"></i>
                            <div class="small text-muted">
                                <strong>Active Status:</strong> Keep accounts active to maintain engagement and follower growth.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
