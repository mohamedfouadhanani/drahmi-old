@props(["type"])

@php
    $classes = [
        "primary" => "bg-primary-800 text-white hover:bg-primary-700 focus:ring-2 focus:ring-primary-700 focus:ring-offset-2",
        "secondary" => "bg-transparent ring-1 ring-primary-800 text-primary-800 hover:bg-primary-50 focus:bg-primary-100"
    ];

    $applyed = $classes[$type];
@endphp

<button class="rounded px-3 py-2 text-sm shadow-sm capitalize font-semibold {{ $applyed }}">
    {{ $slot }}
</button>