<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ __('messages.consultation_page_title') }}</title>

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
            <span class="section-subtitle">{{ __('messages.consultation_personal_guidance') }}</span>
            <h1>{{ __('messages.consultation_hero_title') }} <span>{{ __('messages.consultation_hero_title_span') }}</span></h1>
            <p>{{ __('messages.consultation_hero_description') }}</p>
        </div>
    </div>
</section>

<!-- Consultation Section -->
<section class="consultation-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="consultation-form">
                    <h2 class="section-title">{{ __('messages.consultation_book_title') }}</h2>
                    
                    @if(session('success'))
                        <div class="alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('consultation.store') }}" method="POST">
                        @csrf
                        
                        <!-- Personal Information -->
                        <div class="form-section">
                            <h5>{{ __('messages.consultation_personal_info') }}</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">{{ __('messages.consultation_full_name') }} *</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">{{ __('messages.consultation_email_address') }} *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">{{ __('messages.consultation_phone_number') }} *</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="age" class="form-label">{{ __('messages.consultation_age') }} *</label>
                                    <input type="number" class="form-control" id="age" name="age" min="1" max="120" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="gender" class="form-label">{{ __('messages.consultation_gender') }} *</label>
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option value="">{{ __('messages.consultation_select') }}</option>
                                        <option value="male">{{ __('messages.consultation_male') }}</option>
                                        <option value="female">{{ __('messages.consultation_female') }}</option>
                                        <option value="other">{{ __('messages.consultation_other') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Health Information -->
                        <div class="form-section">
                            <h5>{{ __('messages.consultation_health_info') }}</h5>
                            <div class="mb-3">
                                <label for="symptoms" class="form-label">{{ __('messages.consultation_symptoms_label') }} *</label>
                                <textarea class="form-control" id="symptoms" name="symptoms" rows="4" required placeholder="{{ __('messages.consultation_symptoms_placeholder') }}"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="duration" class="form-label">{{ __('messages.consultation_duration_label') }} *</label>
                                    <input type="text" class="form-control" id="duration" name="duration" required placeholder="{{ __('messages.consultation_duration_placeholder') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="previous_treatment" class="form-label">{{ __('messages.consultation_previous_treatment') }}</label>
                                    <input type="text" class="form-control" id="previous_treatment" name="previous_treatment" placeholder="{{ __('messages.consultation_treatment_placeholder') }}">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="medical_history" class="form-label">{{ __('messages.consultation_medical_history') }}</label>
                                <textarea class="form-control" id="medical_history" name="medical_history" rows="3" placeholder="{{ __('messages.consultation_medical_placeholder') }}"></textarea>
                            </div>
                        </div>

                        <!-- Contact Preferences -->
                        <div class="form-section">
                            <h5>{{ __('messages.consultation_contact_preferences') }}</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="preferred_contact" class="form-label">{{ __('messages.consultation_preferred_contact') }} *</label>
                                    <select class="form-select" id="preferred_contact" name="preferred_contact" required>
                                        <option value="">{{ __('messages.consultation_select') }}</option>
                                        <option value="email">{{ __('messages.consultation_email_option') }}</option>
                                        <option value="phone">{{ __('messages.consultation_phone_option') }}</option>
                                        <option value="whatsapp">{{ __('messages.consultation_whatsapp_option') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Message -->
                        <div class="mb-4">
                            <label for="message" class="form-label">{{ __('messages.consultation_additional_message') }}</label>
                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="{{ __('messages.consultation_message_placeholder') }}"></textarea>
                        </div>

                        <button type="submit" class="btn-submit">
                            <i class="bi bi-calendar-check"></i> {{ __('messages.consultation_submit_button') }}
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <!-- What to Expect -->
                <div class="info-card">
                    <h5>{{ __('messages.consultation_what_to_expect') }}</h5>
                    <div class="info-item">
                        <i class="bi bi-clock"></i>
                        <div class="info-item-content">
                            <h6>{{ __('messages.consultation_response_time') }}</h6>
                            <p>{{ __('messages.consultation_within_24_hours') }}</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-person-check"></i>
                        <div class="info-item-content">
                            <h6>{{ __('messages.consultation_expert_guidance') }}</h6>
                            <p>{{ __('messages.consultation_certified_practitioners') }}</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-shield-check"></i>
                        <div class="info-item-content">
                            <h6>{{ __('messages.consultation_confidential') }}</h6>
                            <p>{{ __('messages.consultation_private_secure') }}</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-currency-dollar"></i>
                        <div class="info-item-content">
                            <h6>{{ __('messages.consultation_fee') }}</h6>
                            <p>{{ __('messages.consultation_fee_amount') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Direct Contact -->
                <div class="info-card">
                    <h5>{{ __('messages.consultation_direct_contact') }}</h5>
                    <div class="mb-3">
                        <p class="mb-2"><strong>{{ __('messages.consultation_emergency') }}</strong></p>
                        <a href="tel:+2519112345678" class="contact-btn">
                            <i class="bi bi-telephone"></i> {{ __('messages.consultation_call_now') }}
                        </a>
                    </div>
                    <div>
                        <p class="mb-2"><strong>{{ __('messages.consultation_whatsapp') }}</strong></p>
                        <a href="https://wa.me/2519112345678" class="contact-btn contact-btn-whatsapp">
                            <i class="bi bi-whatsapp"></i> {{ __('messages.consultation_whatsapp_us') }}
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
                <div class="stat-label">{{ __('messages.consultation_stats_patients') }}</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="bi bi-award"></i>
                </div>
                <div class="stat-number">15+</div>
                <div class="stat-label">{{ __('messages.consultation_stats_experience') }}</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="bi bi-star"></i>
                </div>
                <div class="stat-number">4.9/5</div>
                <div class="stat-label">{{ __('messages.consultation_stats_rating') }}</div>
            </div>
            <div class="stat-item">
                <div class="stat-icon">
                    <i class="bi bi-heart"></i>
                </div>
                <div class="stat-number">100%</div>
                <div class="stat-label">{{ __('messages.consultation_stats_natural') }}</div>
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
