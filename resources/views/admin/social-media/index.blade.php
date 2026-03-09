@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Social Media Accounts" 
    subtitle="Manage your social media presence and engagement."
>
    <x-slot name="action">
        <a href="{{ route('admin.social-media.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-plus me-2"></i>Add Account
        </a>
    </x-slot>
</x-admin.card-header>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.social-media.index') }}">
            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Platform</label>
                    <select name="platform" class="form-select">
                        <option value="">All Platforms</option>
                        @foreach($platforms as $value => $label)
                            <option value="{{ $value }}" {{ request('platform') == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">&nbsp;</label>
                    <div>
                        <button type="submit" class="btn btn-outline-primary">
                            <i class="fas fa-filter me-2"></i>Filter
                        </button>
                        <a href="{{ route('admin.social-media.index') }}" class="btn btn-outline-secondary">Reset</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 24px;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-secondary opacity-50 small text-uppercase fw-bold">
                    <tr>
                        <th class="border-0">Platform</th>
                        <th class="border-0">Handle</th>
                        <th class="border-0">Followers</th>
                        <th class="border-0">Engagement</th>
                        <th class="border-0">Last Post</th>
                        <th class="border-0">Status</th>
                        <th class="border-0 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($socialAccounts as $account)
                        <tr>
                            <td class="border-0 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="icon-box bg-light rounded-3 p-2 me-3">
                                        <i class="{{ $account->icon }} text-primary"></i>
                                    </div>
                                    <div class="fw-bold">{{ $account->platform_display_name }}</div>
                                </div>
                            </td>
                            <td class="border-0 py-3">
                                <div>
                                    <div class="fw-bold text-dark">{{ $account->handle }}</div>
                                    <small class="text-muted">{{ $account->posts }} posts</small>
                                </div>
                            </td>
                            <td class="border-0 py-3">
                                <span class="fw-bold text-primary">{{ $account->formatted_followers }}</span>
                            </td>
                            <td class="border-0 py-3">
                                <span class="badge bg-success-subtle text-success rounded-pill px-3">
                                    {{ $account->formatted_engagement }}
                                </span>
                            </td>
                            <td class="border-0 py-3 text-secondary">
                                <small>{{ $account->last_post_date ?? 'Never' }}</small>
                            </td>
                            <td class="border-0 py-3">
                                <span class="badge bg-{{ $account->is_active ? 'success-subtle text-success' : 'secondary-subtle text-secondary' }} rounded-pill px-3">
                                    {{ $account->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="border-0 py-3 text-end">
                                <div class="btn-group">
                                    <a href="{{ route('admin.social-media.show', $account) }}" 
                                       class="btn btn-sm btn-light rounded-circle text-primary" title="View">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.social-media.edit', $account) }}" 
                                       class="btn btn-sm btn-light rounded-circle text-secondary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.social-media.toggle-status', $account) }}" 
                                          method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" 
                                                class="btn btn-sm btn-light rounded-circle text-{{ $account->is_active ? 'warning' : 'success' }}" 
                                                title="{{ $account->is_active ? 'Deactivate' : 'Activate' }}">
                                            <i class="fas fa-{{ $account->is_active ? 'pause' : 'play' }}"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.social-media.destroy', $account) }}" 
                                          method="POST" style="display: inline;"
                                          onsubmit="return confirm('Are you sure you want to delete this social media account?')">
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
                                No social media accounts found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $socialAccounts->links() }}
        </div>
    </div>
</div>
@endsection
