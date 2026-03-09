@extends('layouts.welcome')

@section('title', 'Consultation - Traditional Ethiopian Medicine')

@section('content')
<!-- Hero Section -->
<section class="hero" style="height: 60vh; background: linear-gradient(135deg, #065f46 0%, #047857 100%);">
    <div class="container h-100 d-flex align-items-center">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="text-white" data-aos="fade-up">
                    <h6 class="text-white mb-3 text-uppercase fw-bold" style="letter-spacing: 3px;">Personal Guidance</h6>
                    <h1 class="display-3 mb-4 serif">Expert Consultation</h1>
                    <p class="lead opacity-90">Connect with our traditional medicine experts for personalized health guidance based on ancient Ethiopian healing wisdom.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Consultation Form Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="bg-white p-5 shadow-sm">
                    <h3 class="mb-4 serif">Book Your Consultation</h3>
                    
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('consultation.store') }}" method="POST">
                        @csrf
                        
                        <!-- Personal Information -->
                        <div class="mb-5">
                            <h5 class="mb-3">Personal Information</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number *</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="age" class="form-label">Age *</label>
                                    <input type="number" class="form-control" id="age" name="age" min="1" max="120" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="gender" class="form-label">Gender *</label>
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option value="">Select...</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Health Information -->
                        <div class="mb-5">
                            <h5 class="mb-3">Health Information</h5>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="symptoms" class="form-label">Describe your symptoms or health concerns *</label>
                                    <textarea class="form-control" id="symptoms" name="symptoms" rows="4" required placeholder="Please describe your symptoms, when they started, and any patterns you've noticed..."></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="duration" class="form-label">How long have you had these symptoms? *</label>
                                    <input type="text" class="form-control" id="duration" name="duration" required placeholder="e.g., 2 weeks, 3 months, 1 year">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="previous_treatment" class="form-label">Previous treatments (if any)</label>
                                    <input type="text" class="form-control" id="previous_treatment" name="previous_treatment" placeholder="Medications, therapies, etc.">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="medical_history" class="form-label">Relevant medical history</label>
                                    <textarea class="form-control" id="medical_history" name="medical_history" rows="3" placeholder="Any chronic conditions, allergies, or other relevant health information..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Preferences -->
                        <div class="mb-5">
                            <h5 class="mb-3">Contact Preferences</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="preferred_contact" class="form-label">Preferred contact method *</label>
                                    <select class="form-select" id="preferred_contact" name="preferred_contact" required>
                                        <option value="">Select...</option>
                                        <option value="email">Email</option>
                                        <option value="phone">Phone Call</option>
                                        <option value="whatsapp">WhatsApp</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Message -->
                        <div class="mb-4">
                            <label for="message" class="form-label">Additional message (optional)</label>
                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Any other information you'd like to share..."></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-calendar-check me-2"></i> Submit Consultation Request
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Consultation Info -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-4">What to Expect</h5>
                        <div class="mb-3">
                            <div class="d-flex mb-3">
                                <i class="bi bi-clock text-primary me-3"></i>
                                <div>
                                    <strong>Response Time</strong>
                                    <p class="text-muted small mb-0">Within 24 hours</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <i class="bi bi-person-check text-primary me-3"></i>
                                <div>
                                    <strong>Expert Guidance</strong>
                                    <p class="text-muted small mb-0">Certified traditional medicine practitioners</p>
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <i class="bi bi-shield-check text-primary me-3"></i>
                                <div>
                                    <strong>Confidential</strong>
                                    <p class="text-muted small mb-0">Your health information is private and secure</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <i class="bi bi-currency-dollar text-primary me-3"></i>
                                <div>
                                    <strong>Consultation Fee</strong>
                                    <p class="text-muted small mb-0">500 ETB for initial consultation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Direct Contact</h5>
                        <div class="mb-3">
                            <p class="mb-2"><strong>Emergency:</strong></p>
                            <a href="tel:+2519112345678" class="btn btn-outline-dark btn-sm w-100">
                                <i class="bi bi-telephone me-2"></i> Call Now
                            </a>
                        </div>
                        <div>
                            <p class="mb-2"><strong>WhatsApp:</strong></p>
                            <a href="https://wa.me/2519112345678" class="btn btn-success btn-sm w-100">
                                <i class="bi bi-whatsapp me-2"></i> WhatsApp Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Trust Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <i class="bi bi-people fs-1 text-primary mb-3"></i>
                <h4>1000+ Patients</h4>
                <p class="text-muted">Successfully treated</p>
            </div>
            <div class="col-md-3 mb-4">
                <i class="bi bi-award fs-1 text-primary mb-3"></i>
                <h4>15+ Years</h4>
                <p class="text-muted">Of experience</p>
            </div>
            <div class="col-md-3 mb-4">
                <i class="bi bi-star fs-1 text-primary mb-3"></i>
                <h4>4.9/5 Rating</h4>
                <p class="text-muted">Patient satisfaction</p>
            </div>
            <div class="col-md-3 mb-4">
                <i class="bi bi-heart fs-1 text-primary mb-3"></i>
                <h4>100% Natural</h4>
                <p class="text-muted">Traditional remedies</p>
            </div>
        </div>
    </div>
</section>
@endsection
