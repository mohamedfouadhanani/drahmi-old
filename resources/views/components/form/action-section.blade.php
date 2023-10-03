@props(["text", "back_link"])

<section class="flex justify-between items-center capitalize">
    <x-button type="primary">
        {{ $text }}
    </x-button>
    <x-link href="{{ $back_link }}">go back</x-link>
</section>