@props(['model'])

@php
    $comments = $model->comments()->with('user')->orderBy('created_at', 'desc')->get();
    $commentableType = get_class($model);
@endphp

<div class="comments-container mt-5 pt-4 border-top" id="comments">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h4 class="mb-0 fw-bold">Comments ({{ $comments->count() }})</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-4 rounded-pill px-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4 rounded-pill px-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Comment Form -->
    <div class="comment-form-wrapper bg-light p-4 rounded-4 mb-5 shadow-sm">
        <div class="d-flex gap-3">
            <div class="flex-shrink-0 d-none d-sm-block">
                <div class="user-avatar bg-primary text-white d-flex align-items-center justify-content-center rounded-circle fw-bold" style="width: 45px; height: 45px;">
                    @auth
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    @else
                        <i class="bi bi-person"></i>
                    @endauth
                </div>
            </div>
            <div class="flex-grow-1">
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="commentable_id" value="{{ $model->id }}">
                    <input type="hidden" name="commentable_type" value="{{ $commentableType }}">
                    
                    @guest
                        <div class="mb-3">
                            <input type="text" name="guest_name" class="form-control border-0 bg-white rounded-3 shadow-none p-3" placeholder="Your Name" required>
                        </div>
                    @endguest

                    <div class="mb-3">
                        <textarea name="comment" class="form-control border-0 bg-white rounded-3 shadow-none p-3" rows="3" placeholder="Write a comment..." required style="resize: none;"></textarea>
                    </div>
                    <div class="d-flex justify-content-end align-items-center gap-3">
                        @guest
                            <small class="text-muted"><i class="bi bi-info-circle me-1"></i> You are commenting as a guest.</small>
                        @endguest
                        <button type="submit" class="btn btn-primary rounded-pill px-4 fw-bold">
                            Post Comment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Comments List -->
    <div class="comments-list">
        @forelse($comments as $comment)
            @php
                $displayName = $comment->user ? $comment->user->name : ($comment->guest_name ?? 'Anonymous');
            @endphp
            <div class="comment-item d-flex gap-3 mb-4 animate__animated animate__fadeIn">
                <div class="flex-shrink-0">
                    <div class="user-avatar {{ $comment->user ? 'bg-secondary' : 'bg-dark opacity-50' }} text-white d-flex align-items-center justify-content-center rounded-circle fw-bold" style="width: 45px; height: 45px;">
                        {{ strtoupper(substr($displayName, 0, 1)) }}
                    </div>
                </div>
                <div class="flex-grow-1">
                    <div class="comment-bubble-wrapper position-relative">
                        <div class="comment-bubble bg-light p-3 rounded-4" style="border-top-left-radius: 0 !important;">
                            <div class="comment-header d-flex justify-content-between align-items-center mb-1">
                                <h6 class="mb-0 fw-bold">
                                    {{ $displayName }}
                                    @if(!$comment->user)
                                        <small class="badge bg-light text-muted border ms-1 fw-normal" style="font-size: 0.6rem;">Guest</small>
                                    @endif
                                </h6>
                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                            <div class="comment-text text-dark">
                                {{ $comment->comment }}
                            </div>
                        </div>

                        @auth
                            @if(Auth::id() === $comment->user_id || Auth::user()->is_admin)
                                <div class="comment-actions mt-2 ms-2">
                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link link-danger p-0 text-decoration-none border-0 bg-transparent small" onclick="return confirm('Delete this comment?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-5 text-muted">
                <i class="bi bi-chat-dots fs-1 mb-3 d-block opacity-25"></i>
                <p>No comments yet. Be the first to join the conversation!</p>
            </div>
        @endforelse
    </div>
</div>

<style>
    .rounded-4 { border-radius: 1.25rem !important; }
    .comment-bubble {
        position: relative;
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }
    .user-avatar {
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    .comment-form-wrapper textarea:focus {
        background-color: #fff !important;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05) !important;
    }
    .comment-item {
        transition: all 0.3s ease;
    }
    .comment-actions .btn-link {
        font-size: 0.75rem;
        font-weight: 600;
        opacity: 0.7;
    }
    .comment-actions .btn-link:hover {
        opacity: 1;
    }
</style>
