@props(['status', 'type' => 'default'])

@php
    $classes = [
        'published' => 'bg-success-subtle text-success',
        'draft' => 'bg-warning-subtle text-warning',
        'active' => 'bg-success-subtle text-success',
        'inactive' => 'bg-danger-subtle text-danger',
        'digital' => 'bg-primary-subtle text-primary',
        'physical' => 'bg-info-subtle text-info',
    ];

    $class = $classes[strtolower($status)] ?? 'bg-light text-dark';
@endphp

<span {{ $attributes->merge(['class' => 'badge rounded-pill px-3 ' . $class]) }}>
    {{ ucfirst($status) }}
</span>
