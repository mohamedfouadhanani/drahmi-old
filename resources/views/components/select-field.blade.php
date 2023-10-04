@props(["name", "errors"])

@php
    $has_error = $errors->has($name);
@endphp

<select name="{{ $name }}" id="{{ $name }}" class="border-primary-300 rounded">
    {{ $slot }}
</select>