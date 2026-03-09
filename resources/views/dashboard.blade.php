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
        <div class="stat-value">{{ number_format($stats['articles_count']) }}</div>
    </div>
    
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
                <i class="fa-solid fa-leaf"></i>
            </div>
            <span class="badge bg-success-subtle text-success">Verified</span>
        </div>
        <div class="stat-label">Plant Species</div>
        <div class="stat-value">{{ number_format($stats['plants_count']) }}</div>
    </div>
    
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon" style="background: rgba(249, 115, 22, 0.1); color: #f97316;">
                <i class="fa-solid fa-play"></i>
            </div>
            <span class="badge bg-info-subtle text-info">High Engage</span>
        </div>
        <div class="stat-label">Video Lessons</div>
        <div class="stat-value">{{ number_format($stats['videos_count']) }}</div>
    </div>
    
    <div class="stat-card">
        <div class="stat-header">
            <div class="stat-icon" style="background: rgba(139, 92, 246, 0.1); color: #8b5cf6;">
                <i class="fa-solid fa-book"></i>
            </div>
            <span class="badge bg-primary-subtle text-primary">Sales</span>
        </div>
        <div class="stat-label">System Revenue</div>
        <div class="stat-value">{{ number_format($stats['total_revenue']) }} ETB</div>
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
                        @forelse($activities as $activity)
                            <tr>
                                <td class="border-0 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar bg-{{ $activity['color'] }}-subtle me-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                                            <i class="fa-solid {{ $activity['icon'] }} text-{{ $activity['color'] }}"></i>
                                        </div>
                                        <div>
                                            <div class="fw-bold">{{ $activity['activity'] }}</div>
                                            <div class="text-secondary text-xs">{{ $activity['title'] }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="border-0 py-3 text-secondary">{{ $activity['section'] }}</td>
                                <td class="border-0 py-3">{{ $activity['date'] }}</td>
                                <td class="border-0 py-3">
                                    <span class="badge bg-{{ $activity['color'] }}-subtle text-{{ $activity['color'] }} rounded-pill px-3">{{ $activity['status'] }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-secondary opacity-50">No recent activities found.</td>
                            </tr>
                        @endforelse
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
                <a href="{{ route('admin.articles.create') }}" class="btn btn-primary rounded-pill py-3 fw-bold border-0" style="background: #3b82f6;">
                    <i class="fa-solid fa-plus me-2"></i>Publish Research
                </a>
                <a href="{{ route('admin.videos.create') }}" class="btn btn-outline-light border-2 text-white rounded-pill py-3 fw-bold text-center" style="transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.8)';" onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='rgba(255,255,255,0.5)';">
                    <i class="fa-solid fa-upload me-2"></i>Upload Video
                </a>
                <a href="{{ route('admin.plants.create') }}" class="btn btn-outline-light border-2 text-white rounded-pill py-3 fw-bold text-center" style="transition: all 0.3s ease;" onmouseover="this.style.backgroundColor='rgba(255,255,255,0.1)'; this.style.borderColor='rgba(255,255,255,0.8)';" onmouseout="this.style.backgroundColor='transparent'; this.style.borderColor='rgba(255,255,255,0.5)';">
                    <i class="fa-solid fa-seedling me-2"></i>Add Plant Species
                </a>
                <div class="p-3 bg-light bg-opacity-10 rounded-4 mt-2">
                    <div class="small fw-bold mb-1 text-white"><i class="fa-brands fa-instagram me-1"></i> Promotion Status</div>
                    <div class="progress" style="height: 6px; background: rgba(255,255,255,0.2);">
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
