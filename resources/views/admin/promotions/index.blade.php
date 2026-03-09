@extends('layouts.admin')

@section('title', 'Promotions')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Promotions</h1>
        <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Create Promotion
        </a>
    </div>

    <!-- Filters -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('admin.promotions.index') }}">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-select">
                            <option value="">All Types</option>
                            @foreach($types as $value => $label)
                                <option value="{{ $value }}" {{ request('type') == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Status</label>
                        <select name="status" class="form-select">
                            <option value="">All Status</option>
                            @foreach($statuses as $value => $label)
                                <option value="{{ $value }}" {{ request('status') == $value ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">&nbsp;</label>
                        <div>
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="fas fa-filter me-2"></i>Filter
                            </button>
                            <a href="{{ route('admin.promotions.index') }}" class="btn btn-outline-secondary">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Promotions List -->
    <div class="card">
        <div class="card-body">
            @if($promotions->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="text-secondary opacity-50 small text-uppercase fw-bold">
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Discount</th>
                                <th>Status</th>
                                <th>Duration</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="small">
                            @foreach($promotions as $promotion)
                                <tr>
                                    <td>
                                        @if($promotion->image)
                                            <img src="{{ asset('images/promotions/' . $promotion->image) }}" 
                                                 alt="{{ $promotion->title }}" 
                                                 class="img-thumbnail" 
                                                 style="width: 50px; height: 50px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                                 style="width: 50px; height: 50px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div>
                                            <strong>{{ $promotion->title }}</strong>
                                            @if($promotion->promo_code)
                                                <br><small class="text-muted">Code: {{ $promotion->promo_code }}</small>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $promotion->type === 'discount' ? 'success' : ($promotion->type === 'offer' ? 'primary' : 'info') }}">
                                            {{ ucfirst($promotion->type) }}
                                        </span>
                                    </td>
                                    <td>{{ $promotion->discount_display }}</td>
                                    <td>
                                        <span class="badge bg-{{ 
                                            $promotion->status === 'active' ? 'success' : 
                                            ($promotion->status === 'inactive' ? 'secondary' : 
                                            ($promotion->status === 'scheduled' ? 'warning' : 'danger')) 
                                        }}">
                                            {{ ucfirst($promotion->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <small>
                                            {{ $promotion->starts_at->format('M j, Y') }}
                                            @if($promotion->ends_at)
                                                - {{ $promotion->ends_at->format('M j, Y') }}
                                            @endif
                                        </small>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.promotions.show', $promotion) }}" 
                                               class="btn btn-sm btn-outline-primary" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.promotions.edit', $promotion) }}" 
                                               class="btn btn-sm btn-outline-secondary" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.promotions.toggle-status', $promotion) }}" 
                                                  method="POST" style="display: inline;">
                                                @csrf
                                                <button type="submit" 
                                                        class="btn btn-sm btn-outline-{{ $promotion->is_active ? 'warning' : 'success' }}" 
                                                        title="{{ $promotion->is_active ? 'Deactivate' : 'Activate' }}">
                                                    <i class="fas fa-{{ $promotion->is_active ? 'pause' : 'play' }}"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.promotions.destroy', $promotion) }}" 
                                                  method="POST" style="display: inline;"
                                                  onsubmit="return confirm('Are you sure you want to delete this promotion?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        Showing {{ $promotions->firstItem() }} to {{ $promotions->lastItem() }} 
                        of {{ $promotions->total() }} promotions
                    </div>
                    {{ $promotions->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-bullhorn fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No promotions found</h5>
                    <p class="text-muted">Create your first promotion to get started.</p>
                    <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus me-2"></i>Create Promotion
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
