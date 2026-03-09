@extends('layouts.admin')

@section('title', 'Edit Promotion')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Edit Promotion</h1>
        <a href="{{ route('admin.promotions.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left me-2"></i>Back to Promotions
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.promotions.update', $promotion) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label">Title *</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid" value="{{ old('title') ?? $promotion->title }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description *</label>
                            <textarea name="description" rows="4" class="form-control @error('description') is-invalid" required>{{ old('description') ?? $promotion->description }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Promotion Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($promotion->image)
                                <div class="mt-2">
                                    <img src="{{ asset('images/promotions/' . $promotion->image) }}" 
                                         alt="{{ $promotion->title }}" 
                                         class="img-thumbnail" 
                                         style="max-width: 200px;">
                                    <div class="mt-2">
                                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirm('Are you sure you want to remove this image?')">
                                            <i class="fas fa-trash me-1"></i>Remove Image
                                        </button>
                                    </div>
                                @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Type *</label>
                                <select name="type" class="form-select @error('type') is-invalid" required>
                                    @foreach($types as $value => $label)
                                        <option value="{{ $value }}" {{ old('type') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Discount Percentage</label>
                                <input type="number" name="discount_percentage" step="0.01" min="0" max="100" class="form-control @error('discount_percentage') is-invalid" value="{{ old('discount_percentage') ?? $promotion->discount_percentage }}" placeholder="e.g., 15.00">
                                @error('discount_percentage')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Discount Amount</label>
                                <input type="number" name="discount_amount" step="0.01" min="0" class="form-control @error('discount_amount') is-invalid" value="{{ old('discount_amount') ?? $promotion->discount_amount }}" placeholder="e.g., 25.00">
                                @error('discount_amount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Promo Code</label>
                                <input type="text" name="promo_code" class="form-control @error('promo_code') is-invalid" value="{{ old('promo_code') ?? $promotion->promo_code }}" placeholder="Optional">
                                @error('promo_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Start Date *</label>
                                <input type="date" name="starts_at" class="form-control @error('starts_at') is-invalid" value="{{ old('starts_at') ?? $promotion->starts_at }}" required>
                                @error('starts_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">End Date</label>
                                <input type="date" name="ends_at" class="form-control @error('ends_at') is-invalid" value="{{ old('ends_at') ?? $promotion->ends_at }}">
                                @error('ends_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Sort Order</label>
                                <input type="number" name="sort_order" min="0" class="form-control @error('sort_order') is-invalid" value="{{ old('sort_order') ?? $promotion->sort_order }}">
                                @error('sort_order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active') ?? $promotion->is_active ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Active
                                </label>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Update Promotion
                            </button>
                            <a href="{{ route('admin.promotions.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
