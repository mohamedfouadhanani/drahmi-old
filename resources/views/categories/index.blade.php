@extends('layout')

@section('title', "Categories")

@php
    $link = route("categories.create");

    $column_names = ["name", "description"];
@endphp

@section('content')
<x-container class="space-y-4">
    <x-flash-message name="success" />
    <x-page-header name="categories" link="{{ $link }}" icon="fa-solid fa-plus"/>
    <x-table.table :column_names="$column_names">
        @foreach ($categories as $category)
        @php
            $show_route = route("categories.show", $category);
            $edit_route = route("categories.edit", $category);
            $delete_route = route("categories.destroy", $category);
        @endphp
        <tr>
            <x-table.data>{{ $category->name }}</x-table.data>
            <x-table.data>{{ $category->description }}</x-table.data>
            <x-table.action :show_route="$show_route" :edit_route="$edit_route" :delete_route="$delete_route" />
        </tr>
        @endforeach
    </x-table.table>
</x-container>
@endsection