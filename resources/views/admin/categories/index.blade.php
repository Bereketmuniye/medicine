@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Categories" 
    subtitle="Organize your educational content and traditional research."
>
    <x-slot name="action">
        <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
            <i class="fa-solid fa-plus me-2"></i>New Category
        </button>
    </x-slot>
</x-admin.card-header>

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm" style="border-radius: 24px;">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="text-secondary opacity-50 small text-uppercase fw-bold">
                            <tr>
                                <th class="border-0">Name</th>
                                <th class="border-0">Slug</th>
                                <th class="border-0 text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="small">
                            @forelse($categories as $category)
                                <tr>
                                    <td class="border-0 py-3 fw-bold text-dark">{{ $category->name }}</td>
                                    <td class="border-0 py-3 text-secondary">{{ $category->slug }}</td>
                                    <td class="border-0 py-3 text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <button class="btn btn-sm btn-light rounded-circle" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $category->id }}">
                                                <i class="fa-solid fa-pen text-primary"></i>
                                            </button>
                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category?')">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-sm btn-light rounded-circle text-danger" type="submit">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                        
                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0 shadow" style="border-radius: 24px;">
                                                    <div class="modal-header border-0 p-4">
                                                        <h5 class="fw-bold mb-0">Edit Category</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                                                        @csrf @method('PUT')
                                                        <div class="modal-body p-4 pt-0">
                                                            <div class="form-group">
                                                                <label class="form-label small fw-bold">Category Name</label>
                                                                <input type="text" name="name" class="form-control rounded-4 p-3" value="{{ $category->name }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer border-0 p-4 pt-0">
                                                            <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary rounded-pill px-4">Update Category</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="border-0 py-5 text-center text-secondary">
                                        No categories found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card border-0 shadow-sm p-4 bg-primary bg-opacity-10 text-primary" style="border-radius: 24px;">
            <div class="d-flex align-items-center mb-2">
                <i class="fa-solid fa-info-circle me-2"></i>
                <h6 class="fw-bold mb-0">System Logic</h6>
            </div>
            <p class="small mb-0 text-secondary">Categories help organzie articles and videos. Deleting a category will un-tag related content but won't delete the content itself.</p>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createCategoryModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow" style="border-radius: 24px;">
            <div class="modal-header border-0 p-4">
                <h5 class="fw-bold mb-0">New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="modal-body p-4 pt-0">
                    <div class="form-group">
                        <label class="form-label small fw-bold">Category Name</label>
                        <input type="text" name="name" class="form-control rounded-4 p-3" placeholder="e.g. Traditional Herbs" required>
                    </div>
                </div>
                <div class="modal-footer border-0 p-4 pt-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">Create Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
