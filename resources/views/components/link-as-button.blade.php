@props(["href", "icon" => "", "type" => "primary"])

@php
    $has_icon = $icon != "";

    $classes = [
        "primary" => "bg-primary-800 hover:bg-primary-700",
        "edit" => "bg-blue-800 hover:bg-blue-700",
        "remove" => "bg-error-800 hover:bg-error-700",
    ];
@endphp

<a href="{{ $href }}" class="rounded px-3 py-2 text-sm shadow-sm capitalize text-white font-semibold {{ $classes[$type] }}">
    @if ($has_icon)
    <i class="{{ $icon }}"></i>
    @endif
    {{ $slot }}
</a>