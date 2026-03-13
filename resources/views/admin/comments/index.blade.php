@extends('layouts.admin')

@section('title', 'Manage Comments')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex align-items-center justify-content-between">
                <h5 class="mb-0 text-primary fw-bold">User Comments</h5>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-pill px-4" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 200px;">User/Guest</th>
                                <th>Comment</th>
                                <th>Source</th>
                                <th>Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($comments as $comment)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-3 bg-secondary text-white d-flex align-items-center justify-content-center rounded-circle fw-bold" style="width: 35px; height: 35px; min-width: 35px;">
                                                {{ strtoupper(substr($comment->user ? $comment->user->name : ($comment->guest_name ?? 'A'), 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="fw-bold text-dark">{{ $comment->user ? $comment->user->name : ($comment->guest_name ?? 'Anonymous') }}</div>
                                                @if(!$comment->user)
                                                    <span class="badge bg-light text-muted border fw-normal" style="font-size: 0.7rem;">Guest</span>
                                                @else
                                                    <small class="text-muted">{{ $comment->user->email }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-wrap" style="max-width: 400px; font-size: 0.9rem;">
                                            {{ $comment->comment }}
                                        </div>
                                    </td>
                                    <td>
                                        @if($comment->commentable_type === 'App\Models\Article')
                                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle py-1 px-2">
                                                <i class="bi bi-journal-text me-1"></i> Article
                                            </span>
                                            <div class="mt-1 small">
                                                <a href="{{ route('articles.show', $comment->commentable->slug ?? '#') }}" target="_blank" class="text-decoration-none text-muted">
                                                    {{ Str::limit($comment->commentable->title ?? 'Deleted Article', 30) }}
                                                </a>
                                            </div>
                                        @elseif($comment->commentable_type === 'App\Models\Book')
                                            <span class="badge bg-success-subtle text-success border border-success-subtle py-1 px-2">
                                                <i class="bi bi-book me-1"></i> Book
                                            </span>
                                            <div class="mt-1 small">
                                                <a href="{{ route('books.show', $comment->commentable->slug ?? '#') }}" target="_blank" class="text-decoration-none text-muted">
                                                    {{ Str::limit($comment->commentable->title ?? 'Deleted Book', 30) }}
                                                </a>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="text-muted small">
                                            {{ $comment->created_at->format('M d, Y') }}<br>
                                            <span class="opacity-75">{{ $comment->created_at->format('H:i') }}</span>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3" onclick="return confirm('Ready to delete this comment?')">
                                                <i class="bi bi-trash me-1"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-5 text-center text-muted">
                                        <i class="bi bi-chat-left-dots fs-1 mb-3 d-block opacity-25"></i>
                                        <p class="mb-0">No comments found yet.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    {{ $comments->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-primary-subtle { background-color: #cfe2ff !important; }
    .bg-success-subtle { background-color: #d1e7dd !important; }
    .text-primary { color: #0d6efd !important; }
    .text-success { color: #198754 !important; }
    .table-hover tbody tr:hover {
        background-color: rgba(0,0,0,0.01);
    }
</style>
@endsection
