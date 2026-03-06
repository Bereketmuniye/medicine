@extends('layouts.admin')

@section('content')
<x-admin.card-header 
    title="Video Library" 
    subtitle="Manage your treatment demonstrations and educational videos."
>
    <x-slot name="action">
        <a href="{{ route('admin.videos.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-plus me-2"></i>Add Video
        </a>
    </x-slot>
</x-admin.card-header>

<div class="card border-0 shadow-sm" style="border-radius: 24px;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="text-secondary opacity-50 small text-uppercase fw-bold">
                    <tr>
                        <th class="border-0">Video</th>
                        <th class="border-0">Category</th>
                        <th class="border-0">Platform</th>
                        <th class="border-0 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="small">
                    @forelse($videos as $video)
                        <tr>
                            <td class="border-0 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="video-thumb me-3 rounded-3 overflow-hidden position-relative cursor-pointer" 
                                         style="width: 80px; height: 45px; background: #000;"
                                         onclick="playVideo('{{ $video->embed_url }}', '{{ $video->title }}')">
                                        @if($video->thumbnail)
                                            <img src="{{ asset('storage/' . $video->thumbnail) }}" class="w-100 h-100 object-fit-cover opacity-75">
                                        @endif
                                        <div class="position-absolute top-50 start-50 translate-middle text-white">
                                            <i class="fa-solid fa-play fa-xs"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{ $video->title }}</div>
                                        <div class="text-secondary text-xs text-truncate" style="max-width: 250px;">{{ $video->video_url }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="border-0 py-3">
                                <span class="badge bg-light text-dark rounded-pill px-3">{{ $video->category->name }}</span>
                            </td>
                            <td class="border-0 py-3">
                                @if(str_contains($video->video_url, 'youtube.com') || str_contains($video->video_url, 'youtu.be'))
                                    <span class="text-danger"><i class="fa-brands fa-youtube me-1"></i> YouTube</span>
                                @else
                                    <span class="text-primary"><i class="fa-solid fa-link me-1"></i> External</span>
                                @endif
                            </td>
                            <td class="border-0 py-3 text-end">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-icon btn-light rounded-circle" data-bs-toggle="dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm rounded-4 p-2">
                                        <li><a class="dropdown-item rounded-3" href="javascript:void(0)" onclick="playVideo('{{ $video->embed_url }}', '{{ $video->title }}')"><i class="fa-solid fa-play-circle me-2 text-primary"></i> Play Now</a></li>
                                        <li><a class="dropdown-item rounded-3" href="{{ $video->video_url }}" target="_blank"><i class="fa-solid fa-external-link me-2 text-info"></i> Watch Original</a></li>
                                        <li><a class="dropdown-item rounded-3" href="{{ route('admin.videos.edit', $video) }}"><i class="fa-solid fa-pen-to-square me-2 text-primary"></i> Edit</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('admin.videos.destroy', $video) }}" method="POST" onsubmit="return confirm('Remove this video?')">
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
                            <td colspan="4" class="border-0 py-5 text-center text-secondary">
                                <div class="mb-3">
                                    <i class="fa-solid fa-video-slash fa-3x opacity-25"></i>
                                </div>
                                <h6 class="fw-bold">No videos in library</h6>
                                <p class="small mb-0">Start uploading your treatment demonstrations.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $videos->links() }}
    </div>
</div>

<!-- Video Player Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 overflow-hidden" style="border-radius: 24px;">
            <div class="modal-header border-0 p-4 pb-0">
                <h6 class="modal-title fw-bold" id="videoModalTitle">Video Player</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="ratio ratio-16x9 rounded-4 overflow-hidden shadow-sm bg-black">
                    <iframe id="videoPlayerFrame" src="" allowfullscreen></iframe>
                </div>
                <div class="mt-3 small text-secondary">
                    <i class="fa-solid fa-info-circle me-1"></i> Video content is hosted externally.
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function playVideo(embedUrl, title) {
        document.getElementById('videoModalTitle').innerText = title;
        document.getElementById('videoPlayerFrame').src = embedUrl;
        new bootstrap.Modal(document.getElementById('videoModal')).show();
    }

    // Clear iframe on close to stop playback
    document.getElementById('videoModal').addEventListener('hidden.bs.modal', function () {
        document.getElementById('videoPlayerFrame').src = '';
    });
</script>

<style>
    .cursor-pointer { cursor: pointer; }
    .video-thumb:hover .fa-play { transform: translate(-50%, -50%) scale(1.2); transition: 0.2s; }
</style>
@endsection
