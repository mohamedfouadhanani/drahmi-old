@props(["type"])

@php
    $classes = [
        "primary" => "bg-primary-800 dark:bg-gray-950 text-white dark:text-gray-300 hover:bg-primary-700 dark:hover:bg-gray-800 focus:ring-2 focus:ring-primary-700 dark:focus:ring-gray-300 focus:ring-offset-2",
        "secondary" => "bg-transparent ring-1 ring-primary-800 dark:ring-gray-200 text-primary-800 dark:text-gray-200 hover:bg-primary-50 dark:hover:bg-gray-800 focus:bg-primary-100 dark:focus:bg-gray-900"
    ];

    $applyed = $classes[$type];
@endphp

<button class="rounded px-3 py-2 text-sm shadow-sm capitalize font-semibold {{ $applyed }}">
    {{ $slot }}
</button>