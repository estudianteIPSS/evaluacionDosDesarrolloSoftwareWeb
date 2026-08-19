@props([
    'type' => 'success',
])

@php
    $classes = match ($type) {
        'success' => 'bg-green-50 text-green-800 ring-green-200',
        'error' => 'bg-red-50 text-red-800 ring-red-200',
        'warning' => 'bg-yellow-50 text-yellow-800 ring-yellow-200',
        'info' => 'bg-blue-50 text-blue-800 ring-blue-200',
        default => 'bg-gray-50 text-gray-800 ring-gray-200',
    };
@endphp

<div class="rounded-lg p-4 text-sm ring-1 {{ $classes }}">
    {{ $slot }}
</div>