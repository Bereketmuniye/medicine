@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="dashboard-header mb-4">
    <h2 class="fw-bold" style="letter-spacing: -1px;">Management Overview</h2>
    <p class="text-secondary">Welcome back, {{ Auth::user()->name ?? 'User' }}! Empowering Ethiopian Traditional Medicine today.</p>
</div>

<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon" style="background: rgba(59, 130, 246, 0.1); color: #3b82f6;">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <span class="badge bg-success-subtle text-success">+8 New</span>
        </div>
        <div class="stat-label">Total Articles</div>
        <div class="stat-value">124</div>
    </div>
    
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
                <i class="fa-solid fa-leaf"></i>
            </div>
            <span class="badge bg-success-subtle text-success">Verified</span>
        </div>
        <div class="stat-label">Plant Species</div>
        <div class="stat-value">842</div>
    </div>
    
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon" style="background: rgba(249, 115, 22, 0.1); color: #f97316;">
                <i class="fa-solid fa-play"></i>
            </div>
            <span class="badge bg-info-subtle text-info">High Engage</span>
        </div>
        <div class="stat-label">Video Lessons</div>
        <div class="stat-value">45</div>
    </div>
    
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon" style="background: rgba(139, 92, 246, 0.1); color: #8b5cf6;">
                <i class="fa-solid fa-book"></i>
            </div>
            <span class="badge bg-primary-subtle text-primary">Sales</span>
        </div>
        <div class="stat-label">Book Revenue</div>
        <div class="stat-value">12,840 ETB</div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Activities -->
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm p-4" style="border-radius: 24px;">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0">Recent Activities</h5>
                <button class="btn btn-sm btn-light rounded-pill px-3">History</button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="text-secondary opacity-50 small text-uppercase fw-bold">
                        <tr>
                            <th class="border-0">Business Activity</th>
                            <th class="border-0">Section</th>
                            <th class="border-0">Date</th>
                            <th class="border-0">Status</th>
                        </tr>
                    </thead>
                    <tbody class="small">
                        <tr>
                            <td class="border-0 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar bg-success-subtle me-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                        <i class="fa-solid fa-plus text-success"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">New Plant Cataloged</div>
                                        <div class="text-secondary text-xs">Kosso (Hagenia abyssinica)</div>
                                    </div>
                                </div>
                            </td>
                            <td class="border-0 py-3 text-secondary">Encyclopedia</td>
                            <td class="border-0 py-3">2 hours ago</td>
                            <td class="border-0 py-3">
                                <span class="badge bg-success-subtle text-success rounded-pill px-3">Published</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-0 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar bg-primary-subtle me-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                        <i class="fa-solid fa-bag-shopping text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">Book Purchased</div>
                                        <div class="text-secondary text-xs">Order #7742 - Int. Customer</div>
                                    </div>
                                </div>
                            </td>
                            <td class="border-0 py-3 text-secondary">Book Store</td>
                            <td class="border-0 py-3">5 hours ago</td>
                            <td class="border-0 py-3">
                                <span class="badge bg-primary-subtle text-primary rounded-pill px-3">E-Book Sent</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="border-0 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar bg-warning-subtle me-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                        <i class="fa-solid fa-pen-to-square text-warning"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold">Educational Post Draft</div>
                                        <div class="text-secondary text-xs">Traditional Tewahedo Medicine</div>
                                    </div>
                                </div>
                            </td>
                            <td class="border-0 py-3 text-secondary">Research</td>
                            <td class="border-0 py-3">Yesterday</td>
                            <td class="border-0 py-3">
                                <span class="badge bg-warning-subtle text-warning rounded-pill px-3">In Review</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <!-- Action Center -->
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm p-4 bg-dark text-white h-100" style="border-radius: 24px; background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%) !important;">
            <h5 class="fw-bold mb-4">Business Actions</h5>
            <div class="d-grid gap-3">
                <button class="btn btn-primary rounded-pill py-3 fw-bold border-0" style="background: #3b82f6;">
                    <i class="fa-solid fa-plus me-2"></i>Publish Research
                </button>
                <button class="btn btn-light bg-opacity-10 border-0 text-white rounded-pill py-3 fw-bold">
                    <i class="fa-solid fa-upload me-2"></i>Upload Video
                </button>
                <button class="btn btn-light bg-opacity-10 border-0 text-white rounded-pill py-3 fw-bold">
                    <i class="fa-solid fa-seedling me-2"></i>Add Plant Species
                </button>
                <div class="p-3 bg-light bg-opacity-5 rounded-4 mt-2">
                    <div class="small fw-bold mb-1"><i class="fa-brands fa-instagram me-1"></i> Promotion Status</div>
                    <div class="progress" style="height: 6px; background: rgba(255,255,255,0.1);">
                        <div class="progress-bar bg-primary" style="width: 75%;"></div>
                    </div>
                </div>
            </div>
            <div class="mt-auto pt-4 text-center opacity-50 small">
                Building Ethiopian Medical Authority
            </div>
        </div>
    </div>
</div>
@endsection
