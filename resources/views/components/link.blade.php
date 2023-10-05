@props(["href", "type" => "primary"])

@php
    $classes = [
        "primary" => "primary",
        "http" => "blue"
    ];
@endphp

<a href="{{ $href }}" class="capitalize text-sm text-{{$classes[$type]}}-600 dark:text-gray-400 font-semibold hover:text-gray-500 dark:hover:text-gray-500 hover:underline">
    {{ $slot }}
</a>