@extends('layout')

@section('title', "categories")

@php
    $link = route("categories.create")
@endphp

@section('content')
<x-container>
    <x-flash-message name="success" />
    <x-page-header name="categories" link="{{ $link }}" icon="fa-solid fa-plus"/>
    @foreach ($categories as $category)
    <section>
        <section>
            id: {{ $category->id }}
        </section>
        <section>
            name: {{ $category->name }}
        </section>
        <section>
            description: {{ $category->description }}
        </section>
        <section>
            <a href="{{ route("categories.show", $category) }}">show</a>
            <a href="{{ route("categories.edit", $category) }}">edit</a>
            <form action="{{ route("categories.destroy", $category) }}" method="post">
                @csrf
                @method("DELETE")
                <input type="submit" value="delete">
            </form>
        </section>
    </section>
    @endforeach
</x-container>
@endsection