@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Create Promotion" 
    subtitle="Add a new promotional campaign or offer to your marketing arsenal."
>
    <x-slot name="action">
        <a href="{{ route('admin.promotions.index') }}" class="btn btn-light rounded-pill px-4">
            <i class="fa-solid fa-arrow-left me-2"></i>Back to Promotions
        </a>
    </x-slot>
</x-admin.card-header>

<form action="{{ route('admin.promotions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
                
                {{-- Title --}}
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Promotion Title *</label>
                    <input 
                        type="text" 
                        name="title" 
                        class="form-control rounded-4 p-3 @error('title') is-invalid @enderror" 
                        placeholder="e.g. Summer Sale - 50% Off All Books" 
                        value="{{ old('title') }}" 
                        required
                    >
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Image --}}
                <div class="form-group mb-4">
                    <label class="form-label fw-bold">Promotion Image</label>
                    <input 
                        type="file" 
                        name="image" 
                        accept="image/*" 
                        class="form-control rounded-4 p-3 @error('image') is-invalid @enderror"
                    >
                    @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                {{-- Type + Discount --}}
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Promotion Type *</label>
                        <select 
                            name="type" 
                            class="form-select rounded-4 p-3 @error('type') is-invalid @enderror" 
                            required
                        >
                            <option value="">Select Type</option>
                            @foreach($types as $value => $label)
                                <option value="{{ $value }}" {{ old('type') == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Discount Percentage</label>
                        <input 
                            type="number" 
                            name="discount_percentage" 
                            step="0.01" 
                            min="0" 
                            max="100" 
                            class="form-control rounded-4 p-3 @error('discount_percentage') is-invalid @enderror" 
                            value="{{ old('discount_percentage') }}" 
                            placeholder="e.g., 15.00"
                        >
                        @error('discount_percentage') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- Discount Amount + Promo Code --}}
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Discount Amount</label>
                        <input 
                            type="number" 
                            name="discount_amount" 
                            step="0.01" 
                            min="0" 
                            class="form-control rounded-4 p-3 @error('discount_amount') is-invalid @enderror" 
                            value="{{ old('discount_amount') }}" 
                            placeholder="e.g., 25.00"
                        >
                        @error('discount_amount') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Promo Code</label>
                        <input 
                            type="text" 
                            name="promo_code" 
                            class="form-control rounded-4 p-3 @error('promo_code') is-invalid @enderror" 
                            value="{{ old('promo_code') }}" 
                            placeholder="Optional"
                        >
                        @error('promo_code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- Dates + Sort Order --}}
                <div class="row g-3 mb-4">
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Start Date *</label>
                        <input 
                            type="date" 
                            name="starts_at" 
                            class="form-control rounded-4 p-3 @error('starts_at') is-invalid @enderror" 
                            value="{{ old('starts_at') }}" 
                            required
                        >
                        @error('starts_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">End Date</label>
                        <input 
                            type="date" 
                            name="ends_at" 
                            class="form-control rounded-4 p-3 @error('ends_at') is-invalid @enderror" 
                            value="{{ old('ends_at') }}"
                        >
                        @error('ends_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold">Sort Order</label>
                        <input 
                            type="number" 
                            name="sort_order" 
                            min="0" 
                            class="form-control rounded-4 p-3 @error('sort_order') is-invalid @enderror" 
                            value="{{ old('sort_order', 0) }}"
                        >
                        @error('sort_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
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
                            Active Promotion
                        </label>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="d-flex gap-3">
                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-3">
                        <i class="fa-solid fa-save me-2"></i>Create Promotion
                    </button>
                    <a href="{{ route('admin.promotions.index') }}" class="btn btn-light rounded-pill px-4 py-3">
                        <i class="fa-solid fa-times me-2"></i>Cancel
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Sidebar for Description -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
                <h5 class="fw-bold mb-3">Promotion Description *</h5>
                <textarea 
                    name="description" 
                    rows="12" 
                    class="form-control rounded-4 p-3 @error('description') is-invalid @enderror" 
                    placeholder="Describe your promotion and its benefits..."
                    required
                >{{ old('description') }}</textarea>
                @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror

                <div class="mt-3">
                    <small class="text-muted">
                        <i class="fa-solid fa-info-circle me-1"></i>
                        Provide a compelling description that highlights the benefits of your promotion and encourages users to take action.
                    </small>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection