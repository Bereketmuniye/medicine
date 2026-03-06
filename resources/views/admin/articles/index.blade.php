@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Articles & Research" 
    subtitle="Manage your educational content and medical research."
>
    <x-slot name="action">
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-plus me-2"></i>New Article
        </a>
    </x-slot>
</x-admin.card-header>

<div class="card border-0 shadow-sm" style="border-radius: 24px;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-secondary opacity-50 small text-uppercase fw-bold">
                    <tr>
                        <th class="border-0">Article</th>
                        <th class="border-0">Categories</th>
                        <th class="border-0">Status</th>
                        <th class="border-0">Views</th>
                        <th class="border-0 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($articles as $article)
                        <tr>
                            <td class="border-0 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="article-img me-3 rounded-3 overflow-hidden" style="width: 48px; height: 48px; background: #f8f9fa;">
                                        @if($article->featured_image)
                                            <img src="{{ asset('storage/' . $article->featured_image) }}" class="w-100 h-100 object-fit-cover">
                                        @else
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center text-secondary">
                                                <i class="fa-solid fa-image"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $article->title }}</div>
                                        <div class="text-secondary text-xs">By {{ $article->author->name }} &bull; {{ $article->created_at->format('M d, Y') }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="border-0 py-3">
                                @foreach($article->categories as $category)
                                    <span class="badge bg-light text-dark rounded-pill">{{ $category->name }}</span>
                                @endforeach
                            </td>
                            <td class="border-0 py-3">
                                <x-admin.status-badge :status="$article->status" />
                            </td>
                            <td class="border-0 py-3 fw-bold text-dark">{{ number_format($article->views) }}</td>
                            <td class="border-0 py-3 text-end">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-icon btn-light rounded-circle" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm rounded-4 p-2">
                                        <li><a class="dropdown-item rounded-3" href="{{ route('admin.articles.edit', $article) }}"><i class="fa-solid fa-pen-to-square me-2 text-primary"></i> Edit</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Delete this article?')">
                                                @csrf @method('DELETE')
                                                <button class="dropdown-item rounded-3 text-danger" type="submit"><i class="fa-solid fa-trash-can me-2"></i> Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border-0 py-5 text-center text-secondary">
                                <div class="mb-3">
                                    <i class="fa-solid fa-newspaper fa-3x opacity-25"></i>
                                </div>
                                <h6 class="fw-bold">No articles found</h6>
                                <p class="small mb-0">Start by creating your first educational piece.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $articles->links() }}
        </div>
    </div>
</div>
@endsection
