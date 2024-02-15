@props(["href", "text"])

@php
    $is_current_link = str_contains(url()->current(), $href);
@endphp

<a href="{{ $href }}" @class(["px-3 py-2 sm:rounded dark:hover:bg-gray-800 hover:bg-primary-800 font-light capitalize text-sm", "bg-primary-800 dark:bg-gray-900" => $is_current_link, "bg-transparent" => !$is_current_link])>{{ $slot }}</a>