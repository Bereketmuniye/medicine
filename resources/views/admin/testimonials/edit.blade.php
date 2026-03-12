@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Edit Testimonial" 
    subtitle="Update testimonial information and settings."
>
    <x-slot name="action">
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
            <i class="fa-solid fa-arrow-left me-2"></i>Back
        </a>
    </x-slot>
</x-admin.card-header>

<div class="card border-0 shadow-sm" style="border-radius: 24px;">
    <div class="card-body p-4">
        <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="col-md-8">
                    <!-- Client Information -->
                    <div class="mb-4">
                        <h6 class="text-muted mb-3">Client Information</h6>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="client_name" class="form-label fw-semibold">Client Name *</label>
                                <input type="text" class="form-control @error('client_name') is-invalid @enderror" 
                                       id="client_name" name="client_name" 
                                       value="{{ old('client_name', $testimonial->client_name) }}" required>
                                @error('client_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="client_email" class="form-label fw-semibold">Email Address</label>
                                <input type="email" class="form-control @error('client_email') is-invalid @enderror" 
                                       id="client_email" name="client_email" 
                                       value="{{ old('client_email', $testimonial->client_email) }}">
                                @error('client_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="client_position" class="form-label fw-semibold">Position/Title</label>
                                <input type="text" class="form-control @error('client_position') is-invalid @enderror" 
                                       id="client_position" name="client_position" 
                                       value="{{ old('client_position', $testimonial->client_position) }}" 
                                       placeholder="e.g. CEO, Manager, Patient">
                                @error('client_position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="client_company" class="form-label fw-semibold">Company/Organization</label>
                                <input type="text" class="form-control @error('client_company') is-invalid @enderror" 
                                       id="client_company" name="client_company" 
                                       value="{{ old('client_company', $testimonial->client_company) }}" 
                                       placeholder="e.g. Company Name, Hospital">
                                @error('client_company')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Testimonial Content -->
                    <div class="mb-4">
                        <h6 class="text-muted mb-3">Testimonial Content</h6>
                        
                        <div class="mb-3">
                            <label for="content" class="form-label fw-semibold">Testimonial Text *</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" 
                                      id="content" name="content" rows="5" required>{{ old('content', $testimonial->content) }}</textarea>
                            <div class="form-text">Minimum 10 characters required</div>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="rating" class="form-label fw-semibold">Rating</label>
                            <select class="form-select @error('rating') is-invalid @enderror" 
                                    id="rating" name="rating">
                                <option value="">Select Rating</option>
                                @for($i = 5; $i >= 1; $i--)
                                    <option value="{{ $i }}" {{ old('rating', $testimonial->rating) == $i ? 'selected' : '' }}>
                                        {{ $i }} @choice('star|stars', $i)
                                    </option>
                                @endfor
                            </select>
                            @error('rating')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <!-- Publication Settings -->
                    <div class="mb-4">
                        <h6 class="text-muted mb-3">Publication Settings</h6>
                        
                        <div class="mb-3">
                            <label for="status" class="form-label fw-semibold">Status *</label>
                            <select class="form-select @error('status') is-invalid @enderror" 
                                    id="status" name="status" required>
                                <option value="draft" {{ old('status', $testimonial->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status', $testimonial->status) == 'published' ? 'selected' : '' }}>Published</option>
                                <option value="archived" {{ old('status', $testimonial->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="order" class="form-label fw-semibold">Display Order</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                   id="order" name="order" 
                                   value="{{ old('order', $testimonial->order) }}" min="0">
                            <div class="form-text">Lower numbers appear first</div>
                            @error('order')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input @error('is_featured') is-invalid @enderror" 
                                       type="checkbox" id="is_featured" name="is_featured" 
                                       value="1" {{ old('is_featured', $testimonial->is_featured) ? 'checked' : '' }}>
                                <label class="form-check-label fw-semibold" for="is_featured">
                                    Featured Testimonial
                                </label>
                                <div class="form-text">Display this testimonial prominently</div>
                                @error('is_featured')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <!-- Featured Image -->
                    <div class="mb-4">
                        <h6 class="text-muted mb-3">Client Photo</h6>
                        
                        @if($testimonial->featured_image)
                            <div class="mb-3">
                                <div class="d-flex align-items-center gap-3 mb-2">
                                    <img src="{{ asset('images/testimonials/' . $testimonial->featured_image) }}" 
                                         class="rounded-circle" 
                                         style="width: 60px; height: 60px; object-fit: cover;"
                                         alt="{{ $testimonial->client_name }}">
                                    <div>
                                        <div class="small fw-semibold">Current Image</div>
                                        <div class="text-muted small">{{ $testimonial->featured_image }}</div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        <div class="mb-3">
                            <label for="featured_image" class="form-label fw-semibold">
                                {{ $testimonial->featured_image ? 'Replace Photo' : 'Upload Photo' }}
                            </label>
                            <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                                   id="featured_image" name="featured_image" 
                                   accept="image/*">
                            <div class="form-text">JPG, PNG, GIF. Max 2MB</div>
                            @error('featured_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Form Actions -->
            <div class="border-top pt-4">
                <div class="d-flex justify-content-between">
                    <div>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" 
                              onsubmit="return confirm('Are you sure you want to delete this testimonial?')" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger rounded-pill px-4">
                                <i class="fa-solid fa-trash me-2"></i>Delete
                            </button>
                        </form>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                            <i class="fa-solid fa-save me-2"></i>Update Testimonial
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#content').summernote({
        height: 200,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'hr']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        placeholder: 'Write the testimonial content here...',
        callbacks: {
            onInit: function() {
                $('.note-statusbar').hide();
            }
        }
    });
});
</script>
@endpush
