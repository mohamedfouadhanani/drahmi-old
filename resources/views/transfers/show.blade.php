@extends('layout')

@section('title', "Transfer")

@php
    $back_route = route("transfers.index");
    $delete_route = route("transfers.destroy", $transfer);
@endphp

@section('content')
<x-container>
    <x-vtable.table :back_route="$back_route" :delete_route="$delete_route">
        <x-vtable.row column_name="date">{{ $transfer->transaction->date }}</x-vtable.row>
        <x-vtable.row column_name="description">
            {{ $transfer->transaction->description }}
        </x-vtable.row>
        <x-vtable.row column_name="from account">{{ $transfer->from_account->name }}</x-vtable.row>
        <x-vtable.row column_name="from amount">{{ $transfer->from_amount }} {{ $transfer->from_account->currency->code }}</x-vtable.row>
        <x-vtable.row column_name="to account">{{ $transfer->to_account->name }}</x-vtable.row>
        <x-vtable.row column_name="to amount">{{ $transfer->to_amount }} {{ $transfer->to_account->currency->code }}</x-vtable.row>
    </x-vtable.table>
</x-container>
@endsection