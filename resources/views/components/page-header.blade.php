@props(["name", "link", "icon" => ""])

<section class="flex justify-between items-center">
    <section>
        <h1 class="font-bold text-2xl capitalize">{{ $name }}</h1>
        <p class="text-sm text-primary-600 dark:text-gray-400">View the list of all {{$name}}</p>
    </section>
    <x-link-as-button href="{{ $link }}" icon="{{ $icon }}">Create</x-link-as-button>
</section>