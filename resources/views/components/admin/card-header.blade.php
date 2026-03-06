<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">{{ $title }}</h4>
        <p class="text-secondary small mb-0">{{ $subtitle ?? '' }}</p>
    </div>
    @isset($action)
        <div>
            {{ $action }}
        </div>
    @endisset
</div>
