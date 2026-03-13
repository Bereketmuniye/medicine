<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Consultation - Traditional Ethiopian Medicine</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">    <!-- Custom Shared Styles -->
    <link rel="stylesheet" href="{{ asset('css/global.css') }}?v={{ filemtime(public_path('css/global.css')) }}">

    <style>
        /* Shared navigation styles are now in navigation component */


        /* Hero Section */
        .consultation-hero {
            padding: 140px 0 80px;
            background: linear-gradient(135deg, var(--primary) 0%, #2a1f02 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        .consultation-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1920&q=80') center/cover;
            opacity: 0.1;
            z-index: 1;
        }

        .consultation-hero .container {
            position: relative;
            z-index: 2;
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .hero-content h1 span {
            color: var(--primary-light);
            border-bottom: 4px solid var(--primary-light);
            padding-bottom: 5px;
        }

        .hero-content p {
            font-size: 1.2rem;
            opacity: 0.9;
            margin-bottom: 2rem;
        }

        /* Consultation Section */
        .consultation-section {
            padding: 80px 0;
            background: #ffffff;
        }

        .consultation-form {
            background: white;
            border: 1px solid #f0f0f0;
            border-radius: 15px;
            padding: 3rem;
            box-shadow: var(--card-shadow);
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 2rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-section {
            margin-bottom: 3rem;
        }

        .form-section h5 {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-control, .form-select {
            border: 2px solid #f0f0f0;
            border-radius: 10px;
            padding: 0.8rem 1.2rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary-light);
            box-shadow: 0 0 0 0.2rem rgba(255,202,8,0.25);
        }

        .btn-submit {
            background: var(--primary);
            color: white;
            font-weight: 700;
            padding: 1rem 2rem;
            border-radius: 50px;
            border: none;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-submit:hover {
            background: var(--primary-light);
            color: var(--primary);
            transform: translateY(-2px);
        }

        /* Info Cards */
        .info-card {
            background: white;
            border: 1px solid #f0f0f0;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
        }

        .info-card h5 {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.5rem;
            gap: 1rem;
        }

        .info-item i {
            color: var(--primary-light);
            font-size: 1.2rem;
            margin-top: 0.2rem;
            flex-shrink: 0;
        }

        .info-item-content h6 {
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.3rem;
        }

        .info-item-content p {
            color: var(--text-light);
            font-size: 0.9rem;
            margin: 0;
        }

        .contact-btn {
            background: var(--primary);
            color: white;
            font-weight: 700;
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            width: 100%;
            justify-content: center;
        }

        .contact-btn:hover {
            background: var(--primary-light);
            color: var(--primary);
        }

        .contact-btn-whatsapp {
            background: #25D366;
        }

        .contact-btn-whatsapp:hover {
            background: #128C7E;
        }

        /* Stats Section */
        .stats-section {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--primary) 0%, #2a1f02 100%);
            color: white;
            text-align: center;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 3rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .stat-item {
            text-align: center;
        }

        .stat-icon {
            font-size: 3rem;
            color: var(--primary-light);
            margin-bottom: 1rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 900;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Alert */
        .alert-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            border-radius: 10px;
            padding: 1rem 1.5rem;
            margin-bottom: 2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2rem;
            }
            
            .consultation-form {
                padding: 2rem;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 2rem;
            }
            
            .navbar-nav {
                background: var(--primary);
                padding: 1rem;
                border-radius: 15px;
                margin-top: 1rem;
            }
            
            .nav-link {
                padding: 0.8rem 1rem !important;
            }
        }
    </style>
</head>
<body class="pt-5">

<!-- Navigation -->
<x-navigation />

<!-- Hero Section -->
<section class="consultation-hero">
    <div class="container">
        <div class="hero-content" data-aos="fade-up">
            <span class="section-subtitle">PERSONAL GUIDANCE</span>
            <h1>Expert <span>Consultation</span></h1>
            <p>Connect with our traditional medicine experts for personalized health guidance based on ancient Ethiopian healing wisdom.</p>
        </div>
    </div>
</section>

<!-- Consultation Section -->
<section class="consultation-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="consultation-form">
                    <h2 class="section-title">Book Your Consultation</h2>
                    
                    @if(session('success'))
                        <div class="alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('consultation.store') }}" method="POST">
                        @csrf
                        
                        <!-- Personal Information -->
                        <div class="form-section">
                            <h5>Personal Information</h5>
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
                        <div class="form-section">
                            <h5>Health Information</h5>
                            <div class="mb-3">
                                <label for="symptoms" class="form-label">Describe your symptoms or health concerns *</label>
                                <textarea class="form-control" id="symptoms" name="symptoms" rows="4" required placeholder="Please describe your symptoms, when they started, and any patterns you've noticed..."></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="duration" class="form-label">How long have you had these symptoms? *</label>
                                    <input type="text" class="form-control" id="duration" name="duration" required placeholder="e.g., 2 weeks, 3 months, 1 year">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="previous_treatment" class="form-label">Previous treatments (if any)</label>
                                    <input type="text" class="form-control" id="previous_treatment" name="previous_treatment" placeholder="Medications, therapies, etc.">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="medical_history" class="form-label">Relevant medical history</label>
                                <textarea class="form-control" id="medical_history" name="medical_history" rows="3" placeholder="Any chronic conditions, allergies, or other relevant health information..."></textarea>
                            </div>
                        </div>

                        <!-- Contact Preferences -->
                        <div class="form-section">
                            <h5>Contact Preferences</h5>
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

                        <button type="submit" class="btn-submit">
                            <i class="bi bi-calendar-check"></i> Submit Consultation Request
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <!-- What to Expect -->
                <div class="info-card">
                    <h5>What to Expect</h5>
                    <div class="info-item">
                        <i class="bi bi-clock"></i>
                        <div class="info-item-content">
                            <h6>Response Time</h6>
                            <p>Within 24 hours</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-person-check"></i>
                        <div class="info-item-content">
                            <h6>Expert Guidance</h6>
                            <p>Certified traditional medicine practitioners</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-shield-check"></i>
                        <div class="info-item-content">
                            <h6>Confidential</h6>
                            <p>Your health information is private and secure</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-currency-dollar"></i>
                        <div class="info-item-content">
                            <h6>Consultation Fee</h6>
                            <p>500 ETB for initial consultation</p>
                        </div>
                    </div>
                </div>

                <!-- Direct Contact -->
                <div class="info-card">
                    <h5>Direct Contact</h5>
                    <div class="mb-3">
                        <p class="mb-2"><strong>Emergency:</strong></p>
                        <a href="tel:+2519112345678" class="contact-btn">
                            <i class="bi bi-telephone"></i> Call Now
                        </a>
                    </div>
                    <div>
                        <p class="mb-2"><strong>WhatsApp:</strong></p>
                        <a href="https://wa.me/2519112345678" class="contact-btn contact-btn-whatsapp">
                            <i class="bi bi-whatsapp"></i> WhatsApp Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid" data-aos="fade-up">
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="bi bi-people"></i>
                </div>
                <div class="stat-number">1000+</div>
                <div class="stat-label">Patients</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="bi bi-award"></i>
                </div>
                <div class="stat-number">15+</div>
                <div class="stat-label">Years Experience</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="bi bi-star"></i>
                </div>
                <div class="stat-number">4.9/5</div>
                <div class="stat-label">Rating</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="bi bi-heart"></i>
                </div>
                <div class="stat-number">100%</div>
                <div class="stat-label">Natural</div>
            </div>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    // Initialize AOS
    AOS.init({
        duration: 1000,
        once: true,
        easing: 'ease-out'
    });

    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const nav = document.querySelector('.navbar');
        if (window.scrollY > 100) {
            nav.classList.add('scrolled');
        } else {
            nav.classList.remove('scrolled');
        }
    });
</script>

</body>
</html>
