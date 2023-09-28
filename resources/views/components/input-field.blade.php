@props(['name', "label"])

<section>
    <label for="{{ $name }}">{{ $label }}</label>
    {{ $slot }}
    @error($name)
        <span>{{$message}}</span>
    @enderror
</section>