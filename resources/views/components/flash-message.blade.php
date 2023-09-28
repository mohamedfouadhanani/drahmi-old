@props(['name'])

@if (session()->has($name))
    <section>
        {{ session($name) }}
    </section>
@endif