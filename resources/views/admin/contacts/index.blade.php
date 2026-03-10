@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Contact Messages" 
    subtitle="Messages from visitors and customers."
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
                        <th class="border-0">Date</th>
                        <th class="border-0">Name</th>
                        <th class="border-0">Email</th>
                        <th class="border-0">Subject</th>
                        <th class="border-0">Status</th>
                        <th class="border-0 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($contacts as $contact)
                        <tr>
                            <td class="border-0 py-3 text-secondary">{{ $contact->created_at->format('M d, Y') }}</td>
                            <td class="border-0 py-3 fw-bold text-dark">{{ $contact->name }}</td>
                            <td class="border-0 py-3">
                                <a href="mailto:{{ $contact->email }}" class="text-decoration-none">{{ $contact->email }}</a>
                            </td>
                            <td class="border-0 py-3">{{ Str::limit($contact->subject, 30) }}</td>
                            <td class="border-0 py-3">
                                <span class="badge bg-{{ $contact->status === 'pending' ? 'warning' : ($contact->status === 'read' ? 'success' : 'info') }}-subtle text-{{ $contact->status === 'pending' ? 'warning' : ($contact->contact->status === 'read' ? 'success' : 'info') }} rounded-pill px-3">
                                    {{ ucfirst($contact->status) }}
                                </span>
                            </td>
                            <td class="border-0 py-3 text-end">
                                <div class="btn-group" role="group">
                                    <button class="btn btn-sm btn-light rounded-circle text-primary" 
                                            onclick="viewMessage('{{ $contact->id }}', '{{ $contact->message }}', '{{ $contact->subject }}', '{{ $contact->name }}', '{{ $contact->email }}', '{{ $contact->created_at->format('M d, Y g:i A') }}')" 
                                            title="View Message">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    @if($contact->status === 'pending')
                                        <button class="btn btn-sm btn-light rounded-circle text-success" 
                                                onclick="markAsRead('{{ $contact->id }}')" 
                                                title="Mark as Read">
                                            <i class="fa-solid fa-check"></i>
                                        </button>
                                    @endif
                                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Delete this message?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-light rounded-circle text-danger" type="submit" title="Delete">
                                            <i class="fa-solid fa-trash"></i>
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

<!-- Message Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="messageModalLabel">Message Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <strong>From:</strong> <span id="modalFrom"></span>
                </div>
                <div class="mb-3">
                    <strong>Email:</strong> <span id="modalEmail"></span>
                </div>
                <div class="mb-3">
                    <strong>Subject:</strong> <span id="modalSubject"></span>
                </div>
                <div class="mb-3">
                    <strong>Date:</strong> <span id="modalDate"></span>
                </div>
                <div class="mb-3">
                    <strong>Message:</strong>
                    <div id="modalMessage" style="background: #f8f9fa; padding: 1rem; border-radius: 8px; max-height: 200px; overflow-y: auto;"></div>
                </div>
            </div>
            <div class="modal-footer border-0">
                @if($messageStatus === 'pending')
                    <button type="button" class="btn btn-success" onclick="markAsRead('{{ $messageId }}')">
                        <i class="fa-solid fa-check"></i> Mark as Read
                    </button>
                @endif
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</section>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // View message details
    function viewMessage(id, message, subject, name, email, date) {
        document.getElementById('modalFrom').textContent = name;
        document.getElementById('modalEmail').textContent = email;
        document.getElementById('modalSubject').textContent = subject;
        document.getElementById('modalDate').textContent = date;
        document.getElementById('modalMessage').textContent = message;
        
        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('messageModal'));
        modal.show();
    }

    // Mark message as read
    function markAsRead(id) {
        fetch(`/admin/contacts/${id}/read`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Show success feedback
                const btn = document.querySelector(`button[onclick="markAsRead('${id}')`);
                if (btn) {
                    btn.innerHTML = '<i class="fa-solid fa-check"></i> Marked as Read';
                    btn.disabled = true;
                    btn.classList.remove('btn-success');
                    btn.classList.add('btn-outline-success');
                }
            }
        })
        .catch(error => {
            console.error('Error marking message as read:', error);
        });
    }
</script>
@endsection
