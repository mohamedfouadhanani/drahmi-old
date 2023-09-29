@extends('layout')

@section('title', $category->exists ? "Update Category" : "Create Category")

@section('content')
    <form action="{{ route($category->exists ? "categories.update" : "categories.store", $category) }}" method="post">
        @csrf
        @method($category->exists ? "PUT" : "POST")
        
        <x-input-field name="name" label="name">
            <input type="text" id="name" placeholder="Enter the categorys name" value="{{ old("name", $category->name) }}" name="name">
        </x-input-field>

        <x-input-field name="description" label="description">
            <textarea name="description" id="description" placeholder="Enter the categorys description">{{ old("description", $category->description) }}</textarea>
        </x-input-field>

        <input type="submit" value="{{ $category->exists ? "Update" : "Create" }}" />
    </form>
@endsection