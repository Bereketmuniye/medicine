@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Contact Messages" 
    subtitle="Messages from website visitors and customers."
/>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-lg-3">
        <div class="card border-0 shadow-sm" style="border-radius: 16px;">
            <div class="card-body p-4">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                            <i class="bi bi-envelope fs-4 text-primary"></i>
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-muted">Total Messages</h6>
                        <h3 class="mb-0">{{ $contacts->total() }}</h3>
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
                            <i class="bi bi-clock-history fs-4 text-warning"></i>
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-muted">Pending</h6>
                        <h3 class="mb-0">{{ $contacts->where('status', 'pending')->count() }}</h3>
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
                        <h6 class="mb-0 text-muted">Read</h6>
                        <h3 class="mb-0">{{ $contacts->where('status', 'read')->count() }}</h3>
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
                            <i class="bi bi-reply fs-4 text-info"></i>
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-muted">Replied</h6>
                        <h3 class="mb-0">{{ $contacts->where('status', 'replied')->count() }}</h3>
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
                        <th class="border-0">Subject</th>
                        <th class="border-0">Status</th>
                        <th class="border-0">Received At</th>
                        <th class="border-0 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($contacts as $contact)
                        <tr>
                            <td class="border-0 py-3 fw-bold text-dark">{{ $contact->email }}</td>
                            <td class="border-0 py-3">
                                {{ $contact->name ?? '-' }}
                            </td>
                            <td class="border-0 py-3">
                                {{ Str::limit($contact->subject, 30) }}
                            </td>
                            <td class="border-0 py-3">
                                <span class="badge bg-{{ $contact->status === 'pending' ? 'warning' : ($contact->status === 'read' ? 'success' : 'info') }}-subtle text-{{ $contact->status === 'pending' ? 'warning' : ($contact->status === 'read' ? 'success' : 'info') }} rounded-pill px-3">
                                    {{ ucfirst($contact->status) }}
                                </span>
                            </td>
                            <td class="border-0 py-3 text-secondary">{{ $contact->created_at->format('M d, Y \a\t g:i A') }}</td>
                            <td class="border-0 py-3 text-end">
                                <div class="btn-group" role="group">
                                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-light rounded-circle text-danger" type="submit" title="Delete">
                                            <i class="fa-solid fa-user-minus"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="border-0 py-5 text-center text-secondary">
                                <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                No contact messages found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $contacts->links() }}
        </div>
    </div>
</div>
@endsection
