@extends('layout')

@section('title', $account->name)

@php
    $back_route = route("accounts.index");
    $delete_route = route("accounts.destroy", $account);
@endphp

@section('content')
<x-container>
    <x-vtable.table :back_route="$back_route" :delete_route="$delete_route">
        <x-vtable.row column_name="name">{{ $account->name }}</x-vtable.row>
        <x-vtable.row column_name="description">
            {{ $account->description }}
        </x-vtable.row>
        <x-vtable.row column_name="balance">{{ $account->balance }} {{ $account->currency->code }}</x-vtable.row>
        <x-vtable.row column_name="currency">{{ $account->currency->name }}</x-vtable.row>
    </x-vtable.table>
</x-container>
@endsection