@extends('layout')

@section('title', $category->name)

@section('content')
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
        created_at: {{ $category->created_at }}
    </section>
    <section>
        updated_at: {{ $category->updated_at }}
    </section>
</section>
@endsection