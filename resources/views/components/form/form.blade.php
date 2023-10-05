@props(["method", "action", "class" => "", "enctype" => ""])

<form class="shadow ring-1 ring-primary-200 dark:ring-gray-800 p-4 rounded {{ $class }}" action="{{ $action }}" method="{{ $method }}" enctype="{{ $enctype }}">
    {{ $slot }}
</form>