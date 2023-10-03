@props(["href", "text", "class" => ""])

@php
    $is_current_link = str_contains(url()->current(), $href);
@endphp

<a href="{{ $href }}" @class(["px-3 py-2 sm:rounded bg-transparent hover:bg-neutral-800 font-light capitalize text-sm {{ $class }}", "bg-neutral-800" => $is_current_link])>{{ $slot }}</a>