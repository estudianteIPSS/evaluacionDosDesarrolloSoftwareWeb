@props([
    'href' => '#',
])

<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'font-medium text-indigo-600 transition hover:text-indigo-700'
    ]) }}
>
    {{ $slot }}
</a>