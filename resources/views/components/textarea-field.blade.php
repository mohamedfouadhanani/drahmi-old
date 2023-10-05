@props(["name", "type", "placeholder", "value" => "", "errors"])

@php
    $has_error = $errors->has($name);
@endphp

<textarea @class(["rounded dark:bg-gray-800", "border-error" => $has_error, "border-primary-300 dark:border-gray-700" => !$has_error]) placeholder="{{ $placeholder }}" name="{{ $name }}" id="{{ $name }}">{{ $value }}</textarea>