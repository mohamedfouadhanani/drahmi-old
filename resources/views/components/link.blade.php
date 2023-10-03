@props(["href", "class" => ""])

<a href="{{ $href }}" class="capitalize text-sm text-primary-600 font-semibold hover:text-primary-500 hover:underline {{ $class }}">
    {{ $slot }}
</a>