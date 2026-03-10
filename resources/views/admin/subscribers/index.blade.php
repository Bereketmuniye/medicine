@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Community Subscribers" 
    subtitle="People following your traditional medicine updates."
/>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-lg-3">
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-people fs-4 text-primary"></i>
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-muted">Total Subscribers</h6>
                        <h3 class="mb-0">{{ $subscribers->total() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="bg-success bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-check-circle fs-4 text-success"></i>
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-muted">Active</h6>
                        <h3 class="mb-0">{{ $subscribers->where('status', 'active')->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="bg-warning bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-calendar fs-4 text-warning"></i>
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-muted">This Month</h6>
                        <h3 class="mb-0">{{ $subscribers->where('subscribed_at', '>=', now()->subMonth())->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="bg-info bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-graph-up fs-4 text-info"></i>
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-muted">Growth Rate</h6>
                        <h3 class="mb-0">+{{ $subscribers->where('subscribed_at', '>=', now()->subMonth())->count() }}%</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 24px;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-secondary opacity-50 small text-uppercase fw-bold">
                    <tr>
                        <th class="border-0">Email Address</th>
                        <th class="border-0">Name</th>
                        <th class="border-0">Status</th>
                        <th class="border-0">Subscribed At</th>
                        <th class="border-0 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($subscribers as $subscriber)
                        <tr>
                            <td class="border-0 py-3 fw-bold text-dark">{{ $subscriber->email }}</td>
                            <td class="border-0 py-3">
                                {{ $subscriber->name ?? '-' }}
                            </td>
                            <td class="border-0 py-3">
                                <span class="badge bg-{{ $subscriber->status === 'active' ? 'success' : ($subscriber->status === 'inactive' ? 'warning' : 'danger') }}-subtle text-{{ $subscriber->status === 'active' ? 'success' : ($subscriber->status === 'inactive' ? 'warning' : 'danger') }} rounded-pill px-3">
                                    {{ ucfirst($subscriber->status) }}
                                </span>
                            </td>
                            <td class="border-0 py-3 text-secondary">{{ $subscriber->subscribed_at->format('M d, Y \a\t g:i A') }}</td>
                            <td class="border-0 py-3 text-end">
                                <div class="btn-group" role="group">
                                    <form action="{{ route('admin.subscribers.destroy', $subscriber->email) }}" method="POST" onsubmit="return confirm('Remove this subscriber?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-light rounded-circle text-danger" type="submit" title="Remove">
                                            <i class="fa-solid fa-user-minus"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border-0 py-5 text-center text-secondary">
                                <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                No subscribers found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $subscribers->links() }}
        </div>
    </div>
</div>
@endsection
