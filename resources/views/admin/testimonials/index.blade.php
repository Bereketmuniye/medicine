@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Testimonials" 
    subtitle="Manage client testimonials and reviews."
>
    <x-slot name="action">
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-plus me-2"></i>New Testimonial
        </a>
    </x-slot>
</x-admin.card-header>

<div class="card border-0 shadow-sm" style="border-radius: 24px;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-secondary opacity-50 small text-uppercase fw-bold">
                    <tr>
                        <th class="border-0">#</th>
                        <th class="border-0">ID</th>
                        <th class="border-0">Client</th>
                        <th class="border-0">Content</th>
                        <th class="border-0">Rating</th>
                        <th class="border-0">Status</th>
                        <th class="border-0">Featured</th>
                        <th class="border-0 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($testimonials as $testimonial)
                        <tr>
                            <td class="border-0 py-3">{{ $loop->iteration }}</td>
                            <td class="border-0 py-3">
                                <span class="text-danger fw-bold">{{ $testimonial->testimonial_id }}</span>
                            </td>
                            <td class="border-0 py-3">
                                <div class="d-flex align-items-center">
                                    @if($testimonial->featured_image)
                                        <img src="{{ asset('images/testimonials/' . $testimonial->featured_image) }}" 
                                             class="rounded-circle me-3" 
                                             style="width: 40px; height: 40px; object-fit: cover;"
                                             alt="{{ $testimonial->client_name }}">
                                    @else
                                        <div class="rounded-circle bg-light me-3 d-flex align-items-center justify-content-center" 
                                             style="width: 40px; height: 40px;">
                                            <i class="fa-solid fa-user text-secondary"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <div class="fw-semibold">{{ $testimonial->client_name }}</div>
                                        @if($testimonial->client_position)
                                            <div class="text-muted small">{{ $testimonial->client_position }}</div>
                                        @endif
                                        @if($testimonial->client_company)
                                            <div class="text-muted small">{{ $testimonial->client_company }}</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="border-0 py-3">
                                <div class="text-truncate" style="max-width: 200px;" title="{{ $testimonial->content }}">
                                    {{ Str::limit($testimonial->content, 80) }}
                                </div>
                            </td>
                            <td class="border-0 py-3">
                                @if($testimonial->rating)
                                    <div class="d-flex align-items-center">
                                        <span class="me-1">{{ $testimonial->formatted_rating }}</span>
                                        <div class="text-warning">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= floor($testimonial->rating))
                                                    <i class="fa-solid fa-star"></i>
                                                @elseif($i == ceil($testimonial->rating) && $testimonial->rating % 1 != 0)
                                                    <i class="fa-solid fa-star-half-alt"></i>
                                                @else
                                                    <i class="fa-regular fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </div>
                                @else
                                    <span class="text-muted">No rating</span>
                                @endif
                            </td>
                            <td class="border-0 py-3">
                                <span class="badge rounded-pill 
                                    {{ $testimonial->status === 'published' ? 'bg-success' : 
                                       ($testimonial->status === 'archived' ? 'bg-secondary' : 'bg-warning') }}">
                                    {{ ucfirst($testimonial->status) }}
                                </span>
                            </td>
                            <td class="border-0 py-3">
                                @if($testimonial->is_featured)
                                    <span class="badge bg-info rounded-pill">
                                        <i class="fa-solid fa-star me-1"></i>Featured
                                    </span>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="border-0 py-3 text-end">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" 
                                       class="btn btn-sm btn-outline-primary rounded-pill">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.testimonials.toggle-status', $testimonial) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-info rounded-pill" 
                                                title="Toggle Status">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.testimonials.toggle-featured', $testimonial) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-warning rounded-pill" 
                                                title="Toggle Featured">
                                            <i class="fa-solid fa-star"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this testimonial?')" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="border-0 text-center py-5">
                                <div class="text-muted">
                                    <i class="fa-solid fa-quote-left fa-3x mb-3 d-block"></i>
                                    No testimonials found. Create your first testimonial to get started.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($testimonials->hasPages())
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="text-muted small">
                    Showing {{ $testimonials->firstItem() }} to {{ $testimonials->lastItem() }} of {{ $testimonials->total() }} testimonials
                </div>
                {{ $testimonials->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
