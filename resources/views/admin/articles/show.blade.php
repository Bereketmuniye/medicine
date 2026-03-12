@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Article Details" 
    subtitle="View and manage article information."
>
    <x-slot name="action">
        <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-primary rounded-pill px-4 me-2">
            <i class="fa-solid fa-pen-to-square me-2"></i>Edit
        </a>
        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this article?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger rounded-pill px-4">
                <i class="fa-solid fa-trash-can me-2"></i>Delete
            </button>
        </form>
    </x-slot>
</x-admin.card-header>

<div class="card border-0 shadow-sm" style="border-radius: 24px;">
    <div class="card-body p-4">
        <!-- Article Header -->
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-danger text-white rounded-pill px-3 me-3">
                        {{ $article->article_id }}
                    </span>
                    <span class="badge {{ $article->status === 'published' ? 'bg-success' : 'bg-warning' }} rounded-pill px-3">
                        {{ ucfirst($article->status) }}
                    </span>
                </div>
                <h2 class="fw-bold mb-3">{{ $article->title }}</h2>
                <div class="d-flex align-items-center text-secondary small mb-3">
                    <span class="me-3">
                        <i class="fa-solid fa-user me-1"></i>
                        {{ $article->author->name }}
                    </span>
                    <span class="me-3">
                        <i class="fa-solid fa-calendar me-1"></i>
                        {{ $article->created_at->format('M d, Y') }}
                    </span>
                    @if($article->published_at)
                        <span class="me-3">
                            <i class="fa-solid fa-clock me-1"></i>
                            Published {{ $article->published_at->format('M d, Y') }}
                        </span>
                    @endif
                    <span>
                        <i class="fa-solid fa-eye me-1"></i>
                        {{ number_format($article->views) }} views
                    </span>
                </div>
            </div>
            <div class="col-md-4">
                @if($article->featured_image)
                    @php
                        $images = json_decode($article->featured_image, true);
                    @endphp
                    @if(is_array($images) && count($images) > 0)
                        <div class="rounded-3 overflow-hidden" style="height: 200px;">
                            <img src="{{ asset('storage/' . $images[0]) }}" 
                                 class="w-100 h-100 object-fit-cover main-article-image" 
                                 alt="{{ $article->title }}">
                        </div>
                        @if(count($images) > 1)
                            <div class="mt-2">
                                <div class="d-flex gap-1 flex-wrap">
                                    @foreach($images as $index => $imgPath)
                                        <img 
                                            src="{{ asset('storage/' . $imgPath) }}" 
                                            class="rounded-2"
                                            style="width: 30px; height: 30px; object-fit: cover; cursor: pointer;"
                                            alt="Article image {{ $index + 1 }}"
                                            onclick="document.querySelector('.main-article-image').src='{{ asset('storage/' . $imgPath) }}'"
                                        >
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="rounded-3 overflow-hidden" style="height: 200px;">
                            <img src="{{ asset('storage/' . $article->featured_image) }}" 
                                 class="w-100 h-100 object-fit-cover main-article-image" 
                                 alt="{{ $article->title }}">
                        </div>
                    @endif
                @else
                    <div class="rounded-3 bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                        <div class="text-center text-secondary">
                            <i class="fa-solid fa-image fa-2x mb-2"></i>
                            <p class="small mb-0">No images</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Categories -->
        @if($article->categories->count() > 0)
            <div class="mb-4">
                <h5 class="fw-bold mb-3">Categories</h5>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($article->categories as $category)
                        <span class="badge bg-primary-subtle text-primary rounded-pill px-3">
                            {{ $category->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Content -->
        <div class="mb-4">
            <h5 class="fw-bold mb-3">Content</h5>
            <div class="bg-light rounded-3 p-4">
                <div class="article-content">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </div>
        </div>

        <!-- Article Info -->
        <div class="row">
            <div class="col-md-6">
                <div class="bg-light rounded-3 p-3">
                    <h6 class="fw-bold mb-2">Article Information</h6>
                    <div class="small">
                        <div class="mb-2">
                            <strong>Article ID:</strong> {{ $article->article_id }}
                        </div>
                        <div class="mb-2">
                            <strong>Status:</strong> 
                            <span class="badge {{ $article->status === 'published' ? 'bg-success' : 'bg-warning' }} rounded-pill px-2">
                                {{ ucfirst($article->status) }}
                            </span>
                        </div>
                        <div class="mb-2">
                            <strong>Slug:</strong> {{ $article->slug }}
                        </div>
                        <div class="mb-2">
                            <strong>Views:</strong> {{ number_format($article->views) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="bg-light rounded-3 p-3">
                    <h6 class="fw-bold mb-2">Timestamps</h6>
                    <div class="small">
                        <div class="mb-2">
                            <strong>Created:</strong> {{ $article->created_at->format('M d, Y H:i') }}
                        </div>
                        <div class="mb-2">
                            <strong>Updated:</strong> {{ $article->updated_at->format('M d, Y H:i') }}
                        </div>
                        @if($article->published_at)
                            <div class="mb-2">
                                <strong>Published:</strong> {{ $article->published_at->format('M d, Y H:i') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
