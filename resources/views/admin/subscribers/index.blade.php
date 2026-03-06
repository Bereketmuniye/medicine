@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Community Subscribers" 
    subtitle="People following your traditional medicine updates."
/>

<div class="card border-0 shadow-sm" style="border-radius: 24px;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-secondary opacity-50 small text-uppercase fw-bold">
                    <tr>
                        <th class="border-0">Email Address</th>
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
                                <span class="badge bg-success-subtle text-success rounded-pill px-3">{{ ucfirst($subscriber->status) }}</span>
                            </td>
                            <td class="border-0 py-3 text-secondary">{{ $subscriber->created_at->format('M d, Y') }}</td>
                            <td class="border-0 py-3 text-end">
                                <form action="{{ route('admin.subscribers.destroy', $subscriber->email) }}" method="POST" onsubmit="return confirm('Remove this subscriber?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-light rounded-circle text-danger" type="submit">
                                        <i class="fa-solid fa-user-minus"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="border-0 py-5 text-center text-secondary">
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
