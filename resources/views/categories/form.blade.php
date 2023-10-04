@extends('layout')

@section('title', $category->exists ? "Update Category" : "Create Category")

@php
    $name = old("name", $category->name);
    $description = old("description", $category->description);

    $route = route($category->exists ? "categories.update" : "categories.store", $category);

    $back_link = route("categories.index");
    $button_text = $category->exists ? "Update" : "Create";
@endphp

@section('content')
<x-container>
    <x-form.form action="{{ $route }}" method="post">
        @csrf
        @method($category->exists ? "PUT" : "POST")
        
        <x-input.section name="name" label="name">
            <x-input.field type="text" name="name" placeholder="Enter the categorys name" :value="$name" :errors="$errors" />
        </x-input.section>

        <x-input.section name="description" label="description">
            <x-textarea-field name="description" placeholder="Enter the categorys description" :value="$description" :errors="$errors" />
        </x-input.section>

        <x-form.action-section back_link="{{ $back_link }}" text="{{ $button_text }}" />
    </x-form.form>
</x-container>
@endsection