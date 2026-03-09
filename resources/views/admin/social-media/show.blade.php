@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Social Media Details" 
    subtitle="View and manage social media account information."
>
    <x-slot name="action">
        <a href="{{ route('admin.social-media.edit', 1) }}" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-edit me-2"></i>Edit Account
        </a>
    </x-slot>
</x-admin.card-header>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
            
            <!-- Account Header -->
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h4 class="fw-bold mb-2">{{ $socialAccount['platform'] }}</h4>
                    <div class="d-flex gap-2">
                        <span class="badge bg-primary rounded-pill px-3">
                            {{ $socialAccount['platform'] }}
                        </span>
                        <span class="badge bg-{{ $socialAccount['is_active'] ? 'success-subtle text-success' : 'secondary-subtle text-secondary' }} rounded-pill px-3">
                            {{ $socialAccount['is_active'] ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
                <div class="text-end">
                    <small class="text-muted">
                        Connected {{ $socialAccount['created_at'] }}
                    </small>
                </div>
            </div>

            <!-- Account Info -->
            <div class="mb-4">
                <h5 class="fw-bold mb-3">Account Information</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-4">
                            <small class="text-muted d-block mb-1">Handle/Username</small>
                            <div class="fw-bold">{{ $socialAccount['handle'] }}</div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-4">
                            <small class="text-muted d-block mb-1">Profile URL</small>
                            <div class="fw-bold">
                                <a href="{{ $socialAccount['url'] }}" target="_blank" class="text-primary">
                                    {{ $socialAccount['url'] }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-4">
                            <small class="text-muted d-block mb-1">Followers</small>
                            <div class="fw-bold text-primary">{{ $socialAccount['followers'] }}</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-4">
                            <small class="text-muted d-block mb-1">Engagement Rate</small>
                            <div class="fw-bold text-success">{{ $socialAccount['engagement'] }}</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-4">
                            <small class="text-muted d-block mb-1">Total Posts</small>
                            <div class="fw-bold">{{ $socialAccount['posts'] }}</div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-4">
                            <small class="text-muted d-block mb-1">Last Post</small>
                            <div class="fw-bold">{{ $socialAccount['last_post'] }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <h5 class="fw-bold mb-3">Description</h5>
                <div class="p-3 bg-light rounded-4">
                    <p class="mb-0">{{ $socialAccount['description'] }}</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex gap-3 mt-4 pt-4 border-top">
                <a href="{{ route('admin.social-media.index') }}" class="btn btn-light rounded-pill px-4">
                    <i class="fa-solid fa-arrow-left me-2"></i>Back to Social Media
                </a>
                <a href="{{ $socialAccount['url'] }}" target="_blank" class="btn btn-primary rounded-pill px-4">
                    <i class="fa-solid fa-external-link-alt me-2"></i>Visit Profile
                </a>
                <a href="{{ route('admin.social-media.edit', 1) }}" class="btn btn-primary rounded-pill px-4">
                    <i class="fa-solid fa-edit me-2"></i>Edit Account
                </a>
                <form action="{{ route('admin.social-media.toggle-status', 1) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-{{ $socialAccount['is_active'] ? 'warning' : 'success' }} rounded-pill px-4">
                        <i class="fa-solid fa-{{ $socialAccount['is_active'] ? 'pause' : 'play' }} me-2"></i>
                        {{ $socialAccount['is_active'] ? 'Deactivate' : 'Activate' }}
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Right Sidebar -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm p-0" style="border-radius: 24px; background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);">
            <div class="p-4 border-bottom border-light">
                <h5 class="fw-bold mb-2 text-dark">Quick Actions</h5>
                <small class="text-muted">Manage this social media account</small>
            </div>
            <div class="p-4">
                <div class="d-grid gap-2">
                    <a href="{{ $socialAccount['url'] }}" target="_blank" class="btn btn-primary rounded-pill">
                        <i class="fa-solid fa-external-link-alt me-2"></i>Visit Profile
                    </a>
                    
                    <a href="{{ route('admin.social-media.edit', 1) }}" class="btn btn-secondary rounded-pill">
                        <i class="fa-solid fa-edit me-2"></i>Edit Details
                    </a>

                    <form action="{{ route('admin.social-media.toggle-status', 1) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-{{ $socialAccount['is_active'] ? 'warning' : 'success' }} rounded-pill w-100">
                            <i class="fa-solid fa-{{ $socialAccount['is_active'] ? 'pause' : 'play' }} me-2"></i>
                            {{ $socialAccount['is_active'] ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.social-media.destroy', 1) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this social media account?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger rounded-pill w-100">
                            <i class="fa-solid fa-trash me-2"></i>Remove Account
                        </button>
                    </form>
                </div>

                <div class="mt-4 p-3 bg-white rounded-4">
                    <h6 class="fw-bold mb-2">Account Statistics</h6>
                    <div class="small text-muted">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Status:</span>
                            <span class="fw-bold">{{ $socialAccount['is_active'] ? 'Active' : 'Inactive' }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Followers:</span>
                            <span class="fw-bold">{{ $socialAccount['followers'] }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Engagement:</span>
                            <span class="fw-bold text-success">{{ $socialAccount['engagement'] }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Posts:</span>
                            <span class="fw-bold">{{ $socialAccount['posts'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
