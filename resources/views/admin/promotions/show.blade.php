@extends('layouts.admin')

@section('title', 'View Promotion')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Promotion Details</h1>
        <div class="btn-group">
            <a href="{{ route('admin.promotions.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Promotions
            </a>
            <a href="{{ route('admin.promotions.edit', $promotion) }}" class="btn btn-primary">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <h5 class="card-title">{{ $promotion->title }}</h5>
                            <span class="badge bg-{{ $promotion->type === 'discount' ? 'success' : ($promotion->type === 'offer' ? 'primary' : 'info') }}">
                                {{ ucfirst($promotion->type) }}
                            </span>
                        </div>
                        <div class="col-md-4 text-end">
                            <span class="badge bg-{{ $promotion->is_active ? 'success' : 'secondary' }}">
                                {{ $promotion->status }}
                            </span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <p class="text-muted">{{ $promotion->description }}</p>
                    </div>

                    @if($promotion->image)
                        <div class="mb-3">
                            <img src="{{ asset('images/promotions/' . $promotion->image) }}" 
                                 alt="{{ $promotion->title }}" 
                                 class="img-fluid rounded" 
                                 style="max-height: 300px;">
                        </div>
                    @endif

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="detail-item">
                                <span class="detail-label">Type:</span>
                                <span class="detail-value">{{ ucfirst($promotion->type) }}</span>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <span class="detail-label">Discount:</span>
                                    <span class="detail-value text-success fw-bold">{{ $promotion->discount_display }}</span>
                                </div>
                            </div>
                        </div>

                        @if($promotion->promo_code)
                            <div class="col-md-6">
                                <div class="detail-item">
                                    <span class="detail-label">Promo Code:</span>
                                    <span class="detail-value">{{ $promotion->promo_code }}</span>
                                </div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">
                                <div class="detail-item">
                                    <span class="detail-label">Duration:</span>
                                    <span class="detail-value">
                                        {{ $promotion->starts_at->format('M j, Y') }}
                                        @if($promotion->ends_at)
                                            - {{ $promotion->ends_at->format('M j, Y') }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="detail-item">
                                    <span class="detail-label">Created:</span>
                                    <span class="detail-value">{{ $promotion->created_at->format('M j, Y H:i') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
