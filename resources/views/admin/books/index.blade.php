@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Book Store Management" 
    subtitle="Manage your physical books and digital medical publications."
>
    <x-slot name="action">
        <a href="{{ route('admin.books.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-plus me-2"></i>Add New Book
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
                        <th class="border-0">Book ID</th>
                        <th class="border-0">Book</th>
                        <th class="border-0">Format</th>
                        <th class="border-0">Price</th>
                        <th class="border-0">Inventory</th>
                        <th class="border-0 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($books as $book)
                        <tr>
                             <td class="border-0 py-3">{{ $loop->iteration }}</td>
                            <td class="border-0 py-3"><a href="{{ route('admin.books.show', $book) }}" rel="noopener noreferrer" class="text-decoration-none text-danger">{{ $book->book_id }}</a></td>
                            <td class="border-0 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="book-cover me-3 rounded-2 shadow-sm overflow-hidden" style="width: 40px; height: 56px; background: #f8f9fa;">
                                        @if($book->cover)
                                            @php
                                                $covers = json_decode($book->cover, true);
                                            @endphp
                                            @if(is_array($covers) && count($covers) > 0)
                                                <div class="d-flex gap-1">
                                                    @foreach($covers as $index => $coverPath)
                                                        @if($index < 2)
                                                            <img 
                                                                src="{{ asset('storage/' . $coverPath) }}" 
                                                                class="rounded-1"
                                                                style="width: 18px; height: 18px; object-fit: cover;"
                                                                alt="Book cover {{ $index + 1 }}"
                                                            >
                                                        @endif
                                                    @endforeach
                                                    @if(count($covers) > 2)
                                                        <div class="d-flex align-items-center justify-content-center text-secondary" style="width: 18px; height: 18px; font-size: 8px;">
                                                            +{{ count($covers) - 2 }}
                                                        </div>
                                                    @endif
                                                </div>
                                            @else
                                                <img src="{{ asset('storage/' . $book->cover) }}" class="w-100 h-100 object-fit-cover">
                                            @endif
                                        @else
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center text-secondary opacity-25">
                                                <i class="fa-solid fa-book-open"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">
                                            <a href="{{ route('admin.books.show', $book) }}" class="text-decoration-none text-dark">{{ $book->title }}</a>
                                        </div>
                                        <div class="text-secondary text-xs">{{ $book->slug }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="border-0 py-3">
                                <x-admin.status-badge :status="$book->type" />
                            </td>
                            <td class="border-0 py-3 fw-bold text-dark">{{ number_format($book->price, 2) }} ETB</td>
                            <td class="border-0 py-3">
                                @if($book->type === 'physical')
                                    <span class="text-dark fw-medium">{{ $book->stock }} in stock</span>
                                @else
                                    <span class="text-secondary italic">Digital Access</span>
                                @endif
                            </td>
                            <td class="border-0 py-3 text-end">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-icon btn-light rounded-circle" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm rounded-4 p-2">
                                        <li><a class="dropdown-item rounded-3" href="{{ route('admin.books.edit', $book) }}"><i class="fa-solid fa-pen-to-square me-2 text-primary"></i> Edit Details</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('admin.books.destroy', $book) }}" method="POST" onsubmit="return confirm('Delete this book?')">
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
                                    <i class="fa-solid fa-book fa-3x opacity-25"></i>
                                </div>
                                <h6 class="fw-bold">No books in store</h6>
                                <p class="small mb-0">Start adding your health publications.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $books->links() }}
        </div>
    </div>
</div>
@endsection
