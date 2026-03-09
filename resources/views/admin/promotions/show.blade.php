@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Promotion Details" 
    subtitle="View and manage promotion information."
>
    <x-slot name="action">
        <a href="{{ route('admin.promotions.edit', $promotion) }}" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-edit me-2"></i>Edit Promotion
        </a>
    </x-slot>
</x-admin.card-header>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
            
            <!-- Promotion Header -->
            <div class="d-flex justify-content-between align-items-start mb-4">
                <div>
                    <h4 class="fw-bold mb-2">{{ $promotion->title }}</h4>
                    <div class="d-flex gap-2">
                        <span class="badge bg-{{ $promotion->type === 'discount' ? 'success' : ($promotion->type === 'offer' ? 'primary' : 'info') }} rounded-pill px-3">
                            {{ ucfirst($promotion->type) }}
                        </span>
                        <span class="badge bg-{{ 
                            $promotion->status === 'active' ? 'success-subtle text-success' : 
                            ($promotion->status === 'inactive' ? 'secondary-subtle text-secondary' : 
                            ($promotion->status === 'scheduled' ? 'warning-subtle text-warning' : 'danger-subtle text-danger')) 
                        }} rounded-pill px-3">
                            {{ ucfirst($promotion->status) }}
                        </span>
                    </div>
                </div>
                <div class="text-end">
                    <small class="text-muted">
                        Created {{ $promotion->created_at->format('M j, Y') }}
                    </small>
                </div>
            </div>

            <!-- Promotion Image -->
            @if($promotion->image)
                <div class="mb-4">
                    <img src="{{ asset('images/promotions/' . $promotion->image) }}" 
                         alt="{{ $promotion->title }}" 
                         class="img-fluid rounded-4" 
                         style="max-height: 400px; width: 100%; object-fit: cover;">
                </div>
            @endif

            <!-- Description -->
            <div class="mb-4">
                <h5 class="fw-bold mb-3">Description</h5>
                <div class="p-3 bg-light rounded-4">
                    <p class="mb-0">{{ $promotion->description }}</p>
                </div>
            </div>

            <!-- Promotion Details Grid -->
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-4">
                        <small class="text-muted d-block mb-1">Promotion Type</small>
                        <div class="fw-bold">{{ ucfirst($promotion->type) }}</div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-4">
                        <small class="text-muted d-block mb-1">Discount</small>
                        <div class="fw-bold text-success">{{ $promotion->discount_display }}</div>
                    </div>
                </div>

                @if($promotion->promo_code)
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded-4">
                            <small class="text-muted d-block mb-1">Promo Code</small>
                            <div class="fw-bold">{{ $promotion->promo_code }}</div>
                        </div>
                    </div>
                @endif

                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-4">
                        <small class="text-muted d-block mb-1">Duration</small>
                        <div class="fw-bold">
                            {{ $promotion->starts_at->format('M j, Y') }}
                            @if($promotion->ends_at)
                                - {{ $promotion->ends_at->format('M j, Y') }}
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-4">
                        <small class="text-muted d-block mb-1">Sort Order</small>
                        <div class="fw-bold">{{ $promotion->sort_order }}</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="p-3 bg-light rounded-4">
                        <small class="text-muted d-block mb-1">Status</small>
                        <div class="fw-bold">
                            <span class="badge bg-{{ 
                                $promotion->is_active ? 'success-subtle text-success' : 'secondary-subtle text-secondary' 
                            }} rounded-pill px-3">
                                {{ $promotion->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="d-flex gap-3 mt-4 pt-4 border-top">
                <a href="{{ route('admin.promotions.index') }}" class="btn btn-light rounded-pill px-4">
                    <i class="fa-solid fa-arrow-left me-2"></i>Back to Promotions
                </a>
                <a href="{{ route('admin.promotions.edit', $promotion) }}" class="btn btn-primary rounded-pill px-4">
                    <i class="fa-solid fa-edit me-2"></i>Edit Promotion
                </a>
                <form action="{{ route('admin.promotions.toggle-status', $promotion) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-{{ $promotion->is_active ? 'warning' : 'success' }} rounded-pill px-4">
                        <i class="fa-solid fa-{{ $promotion->is_active ? 'pause' : 'play' }} me-2"></i>
                        {{ $promotion->is_active ? 'Deactivate' : 'Activate' }}
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
                <small class="text-muted">Manage this promotion</small>
            </div>
            <div class="p-4">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.promotions.edit', $promotion) }}" class="btn btn-primary rounded-pill">
                        <i class="fa-solid fa-edit me-2"></i>Edit Details
                    </a>
                    
                    <form action="{{ route('admin.promotions.toggle-status', $promotion) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-{{ $promotion->is_active ? 'warning' : 'success' }} rounded-pill w-100">
                            <i class="fa-solid fa-{{ $promotion->is_active ? 'pause' : 'play' }} me-2"></i>
                            {{ $promotion->is_active ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>

                    <form action="{{ route('admin.promotions.destroy', $promotion) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this promotion?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger rounded-pill w-100">
                            <i class="fa-solid fa-trash me-2"></i>Delete Promotion
                        </button>
                    </form>
                </div>

                <div class="mt-4 p-3 bg-white rounded-4">
                    <h6 class="fw-bold mb-2">Promotion Statistics</h6>
                    <div class="small text-muted">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Status:</span>
                            <span class="fw-bold">{{ ucfirst($promotion->status) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Type:</span>
                            <span class="fw-bold">{{ ucfirst($promotion->type) }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span>Created:</span>
                            <span class="fw-bold">{{ $promotion->created_at->format('M j, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
