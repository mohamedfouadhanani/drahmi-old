@extends('layout')

@section('title', $target->name)

@php
    $back_route = route("targets.index");
    $delete_route = route("targets.destroy", $target);
@endphp

@section('content')
<x-container>
    <x-vtable.table :back_route="$back_route" :delete_route="$delete_route">
        <x-vtable.row column_name="name">{{ $target->name }}</x-vtable.row>
        <x-vtable.row column_name="description">
            {{ $target->description }}
        </x-vtable.row>
        <x-vtable.row column_name="account">{{ $target->account->name }}</x-vtable.row>
        <x-vtable.row column_name="amount">{{ $target->amount }} {{ $target->account->currency->code }}</x-vtable.row>
        <x-vtable.row column_name="condition">{{ $target->condition }}</x-vtable.row>
        <x-vtable.row column_name="is reached">
            @if ($target->is_reached)
                <x-chip type="success">yes</x-chip>
            @else
                <x-chip type="error">no</x-chip>
            @endif
        </x-vtable.row>
    </x-vtable.table>
</x-container>
@endsection