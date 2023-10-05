@props(["href", "type" => "primary"])

@php
    $classes = [
        "primary" => "primary",
        "http" => "blue"
    ];
@endphp

<a href="{{ $href }}" class="capitalize text-sm text-{{$classes[$type]}}-600 font-semibold hover:text-{{$classes[$type]}}-500 hover:underline">
    {{ $slot }}
</a>