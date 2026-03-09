@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1">Promotions</h1>
        <p class="text-muted mb-0">Manage your promotional campaigns and offers.</p>
    </div>
    <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Create Promotion
    </a>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 24px;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-secondary opacity-50 small text-uppercase fw-bold">
                    <tr>
                        <th class="border-0">Image</th>
                        <th class="border-0">Title</th>
                        <th class="border-0">Type</th>
                        <th class="border-0">Discount</th>
                        <th class="border-0">Status</th>
                        <th class="border-0">Duration</th>
                        <th class="border-0 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($promotions as $promotion)
                        <tr>
                            <td class="border-0 py-3">
                                @if($promotion->image)
                                    <img src="{{ asset('images/promotions/' . $promotion->image) }}" 
                                         alt="{{ $promotion->title }}" 
                                         class="img-thumbnail rounded" 
                                         style="width: 50px; height: 50px; object-fit: cover;">
                                @else
                                    <div class="bg-light d-flex align-items-center justify-content-center rounded" 
                                         style="width: 50px; height: 50px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="border-0 py-3">
                                <div class="fw-bold text-dark">{{ $promotion->title }}</div>
                                @if($promotion->promo_code)
                                    <small class="text-muted">Code: {{ $promotion->promo_code }}</small>
                                @endif
                            </td>
                            <td class="border-0 py-3">
                                <span class="badge bg-{{ $promotion->type === 'discount' ? 'success' : ($promotion->type === 'offer' ? 'primary' : 'info') }} rounded-pill px-3">
                                    {{ ucfirst($promotion->type) }}
                                </span>
                            </td>
                            <td class="border-0 py-3">
                                <span class="text-success fw-bold">{{ $promotion->discount_display }}</span>
                            </td>
                            <td class="border-0 py-3">
                                <span class="badge bg-{{ 
                                    $promotion->status === 'active' ? 'success-subtle text-success' : 
                                    ($promotion->status === 'inactive' ? 'secondary-subtle text-secondary' : 
                                    ($promotion->status === 'scheduled' ? 'warning-subtle text-warning' : 'danger-subtle text-danger')) 
                                }} rounded-pill px-3">
                                    {{ ucfirst($promotion->status) }}
                                </span>
                            </td>
                            <td class="border-0 py-3 text-secondary">
                                <small>
                                    {{ $promotion->starts_at->format('M j, Y') }}
                                    @if($promotion->ends_at)
                                        - {{ $promotion->ends_at->format('M j, Y') }}
                                    @endif
                                </small>
                            </td>
                            <td class="border-0 py-3 text-end">
                                <div class="btn-group">
                                    <a href="{{ route('admin.promotions.show', $promotion) }}" 
                                       class="btn btn-sm btn-light rounded-circle text-primary" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.promotions.edit', $promotion) }}" 
                                       class="btn btn-sm btn-light rounded-circle text-secondary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.promotions.toggle-status', $promotion) }}" 
                                          method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" 
                                                class="btn btn-sm btn-light rounded-circle text-{{ $promotion->is_active ? 'warning' : 'success' }}" 
                                                title="{{ $promotion->is_active ? 'Deactivate' : 'Activate' }}">
                                            <i class="fas fa-{{ $promotion->is_active ? 'pause' : 'play' }}"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.promotions.destroy', $promotion) }}" 
                                          method="POST" style="display: inline;"
                                          onsubmit="return confirm('Are you sure you want to delete this promotion?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-light rounded-circle text-danger" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="border-0 py-5 text-center text-secondary">
                                No promotions found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $promotions->links() }}
        </div>
    </div>
</div>
@endsection
