@extends('layout')

@section('title', $category->name)

@php
    $back_route = route("categories.index");
    $delete_route = route("categories.destroy", $category);
@endphp

@section('content')
<x-container>
    <x-vtable.table :back_route="$back_route" :delete_route="$delete_route">
        <x-vtable.row column_name="name">{{ $category->name }}</x-vtable.row>
        <x-vtable.row column_name="description">
            {{ $category->description }}
        </x-vtable.row>
    </x-vtable.table>
</x-container>
@endsection