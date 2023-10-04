@props(["name", "type", "placeholder", "value" => "", "errors", "autocomplete" => "off"])

@php
    $has_error = $errors->has($name);
@endphp

<input 
    @class(["rounded", "border-error" => $has_error, "border-primary-300" => !$has_error])
    id="{{ $name }}" 
    type="{{ $type }}" 
    name="{{ $name }}" 
    value="{{ $value }}" 
    placeholder="{{ $placeholder }}" 
    autocomplete={{ $autocomplete }}
/>