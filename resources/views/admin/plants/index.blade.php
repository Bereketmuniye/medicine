@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Medicinal Plants Encyclopedia" 
    subtitle="Catalog and manage your database of Ethiopian medicinal flora."
>
    <x-slot name="action">
        <a href="{{ route('admin.plants.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-plus me-2"></i>Add New Plant
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
                        <th class="border-0">PLant ID</th>
                        <th class="border-0">Plant Details</th>
                        <th class="border-0">Scientific Name</th>
                        <th class="border-0">Region</th>
                        <th class="border-0">Price</th>
                        <th class="border-0">Medical Uses</th>
                        <th class="border-0 text-end">Actions</th>
                    </tr>
                </thead>

                <tbody class="small">
                    @forelse($plants as $plant)
                        <tr>
                            <td class="border-0 py-3">{{ $loop->iteration }}</td>
                            <td class="border-0 py-3"><a href="{{ route('admin.plants.show', $plant) }}" rel="noopener noreferrer" class="text-decoration-none text-danger">{{ $plant->plant_id }}</a></td>
                            <td class="border-0 py-3">
                                <div class="d-flex align-items-center">

                                    <div class="plant-img me-3 rounded-3 overflow-hidden" style="width: 48px; height: 48px; background: #e8f5e9;">

                                        @if($plant->image)

                                            @php
                                                $images = json_decode($plant->image, true);
                                            @endphp

                                            @if(is_array($images) && count($images) > 0)
                                                <div class="d-flex gap-1 mb-2">
                                                    @foreach($images as $index => $imgPath)
                                                        <img 
                                                            src="{{ asset('storage/' . $imgPath) }}" 
                                                            class="rounded-2"
                                                            style="width: 20px; height: 20px; object-fit: cover;"
                                                            alt="Plant image {{ $index + 1 }}"
                                                        >
                                                    @endforeach
                                                </div>
                                            @else
                                                <img 
                                                    src="{{ asset('storage/' . $plant->image) }}" 
                                                    class="w-100 h-100 object-fit-cover"
                                                    alt="{{ $plant->name }}"
                                                >
                                            @endif

                                        @else
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center text-success opacity-50">
                                                <i class="fa-solid fa-seedling"></i>
                                            </div>
                                        @endif

                                    </div>

                                    <div>
                                        <div class="fw-bold text-dark">{{ $plant->name }}</div>
                                        <div class="text-secondary text-xs">
                                            {{ $plant->local_name ?? 'No local name' }}
                                        </div>
                                    </div>

                                </div>
                            </td>

                            <td class="border-0 py-3 italic text-secondary">
                                {{ $plant->scientific_name ?? 'Not classified' }}
                            </td>

                            <td class="border-0 py-3 text-dark fw-medium">
                                {{ $plant->region ?? 'Various' }}
                            </td>

                            <td class="border-0 py-3">
                                <span class="badge bg-success-subtle text-success rounded-pill px-3">
                                    @if($plant->price)
                                        ETB {{ number_format($plant->price, 2, '.', ',') }}
                                    @else
                                        Free
                                    @endif
                                </span>
                            </td>

                            <td class="border-0 py-3">
                                <span class="badge bg-success-subtle text-success rounded-pill px-3">
                                    {{ $plant->uses->count() }} Uses
                                </span>
                            </td>

                            <td class="border-0 py-3 text-end">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-icon btn-light rounded-circle" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm rounded-4 p-2">
                                        <li>
                                            <a class="dropdown-item rounded-3" href="{{ route('admin.plants.show', $plant) }}">
                                                <i class="fa-solid fa-eye me-2 text-info"></i> View
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item rounded-3" href="{{ route('admin.plants.edit', $plant) }}">
                                                <i class="fa-solid fa-pen-to-square me-2 text-primary"></i> Edit
                                            </a>
                                        </li>

                                        <li><hr class="dropdown-divider"></li>

                                        <li>
                                            <form action="{{ route('admin.plants.destroy', $plant) }}" method="POST" onsubmit="return confirm('Delete this plant from encyclopedia?')">
                                                @csrf
                                                @method('DELETE')

                                                <button class="dropdown-item rounded-3 text-danger" type="submit">
                                                    <i class="fa-solid fa-trash-can me-2"></i> Delete
                                                </button>
                                            </form>
                                        </li>

                                    </ul>
                                </div>
                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="border-0 py-5 text-center text-secondary">
                                <div class="mb-3">
                                    <i class="fa-solid fa-seedling fa-3x opacity-25"></i>
                                </div>
                                <h6 class="fw-bold">No plants cataloged</h6>
                                <p class="small mb-0">
                                    Start building your medicinal plant database.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <div class="mt-4 d-flex justify-content-center">
            {{ $plants->links('pagination::bootstrap-4') }}
        </div>

    </div>
</div>
@endsection