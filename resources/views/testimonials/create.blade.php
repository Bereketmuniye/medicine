@extends('welcome')

@section('content')
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm" style="border-radius: 24px;">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <h2 class="fw-bold text-primary">Share Your Testimonial</h2>
                            <p class="text-muted">Tell us about your experience with Shalom Herbal Healing</p>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form action="{{ route('testimonials.store') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="client_name" class="form-label fw-semibold">Your Name *</label>
                                    <input type="text" class="form-control @error('client_name') is-invalid @enderror" 
                                           id="client_name" name="client_name" 
                                           value="{{ old('client_name') }}" required>
                                    @error('client_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="client_email" class="form-label fw-semibold">Email Address</label>
                                    <input type="email" class="form-control @error('client_email') is-invalid @enderror" 
                                           id="client_email" name="client_email" 
                                           value="{{ old('client_email') }}">
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
                                           value="{{ old('client_position') }}" 
                                           placeholder="e.g. Patient, Student, Professional">
                                    @error('client_position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="client_company" class="form-label fw-semibold">Organization/Company</label>
                                    <input type="text" class="form-control @error('client_company') is-invalid @enderror" 
                                           id="client_company" name="client_company" 
                                           value="{{ old('client_company') }}" 
                                           placeholder="e.g. Company Name, Institution">
                                    @error('client_company')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="rating" class="form-label fw-semibold">Rating</label>
                                <select class="form-select @error('rating') is-invalid @enderror" 
                                        id="rating" name="rating">
                                    <option value="">Select Rating (Optional)</option>
                                    @for($i = 5; $i >= 1; $i--)
                                        <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                            {{ $i }} @choice('star|stars', $i)
                                        </option>
                                    @endfor
                                </select>
                                @error('rating')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label for="content" class="form-label fw-semibold">Your Testimonial *</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" 
                                          id="content" name="content" rows="6" required 
                                          placeholder="Please share your experience with our herbal healing services...">{{ old('content') }}</textarea>
                                <div class="form-text">Minimum 10 characters. Please be detailed and honest in your review.</div>
                                @error('content')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('testimonials.all') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                    <i class="fa-solid fa-arrow-left me-2"></i>View Testimonials
                                </a>
                                <button type="submit" class="btn btn-primary rounded-pill px-4">
                                    <i class="fa-solid fa-paper-plane me-2"></i>Submit Testimonial
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
