@props(["name", "errors"])

@php
    $has_error = $errors->has($name);
@endphp

<select name="{{ $name }}" id="{{ $name }}" class="border-primary-300 dark:border-gray-700 rounded dark:bg-gray-800">
    {{ $slot }}
</select>