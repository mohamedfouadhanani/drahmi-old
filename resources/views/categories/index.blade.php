@extends('layout')

@section('title', "categories")

@section('content')
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
@endsection