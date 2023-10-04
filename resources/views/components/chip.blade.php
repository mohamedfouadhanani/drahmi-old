@props(["type" => "basic"])

@php
    $classes = [
        "basic" => "bg-primary-100 ring-primary-300 text-primary-600",
        "info" => "bg-blue-100 ring-blue-300 text-blue-600",
        "success" => "bg-green-100 ring-green-300 text-green-600",
        "error" => "bg-red-100 ring-red-300 text-red-600",
    ]
@endphp

<span class="ring-1 text-xs rounded-md capitalize font-medium px-2 py-1 {{ $classes[$type] }}">
    {{ $slot }}
</span>