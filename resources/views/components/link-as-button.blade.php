@props(["href", "icon"])

@php
    $has_icon = $icon != "";
@endphp

<a href="{{ $href }}" class="rounded px-3 py-2 text-sm shadow-sm capitalize font-semibold bg-primary-800 text-white hover:bg-primary-700">
    @if ($has_icon)
    <i class="{{ $icon }} mr-2"></i>
    @endif
    {{ $slot }}
</a>