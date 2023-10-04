@extends('layout')

@section('title', "income")

@php
    $back_route = route("incomes.index");
    $delete_route = route("incomes.destroy", $income);
@endphp

@section('content')
<x-container>
    <x-vtable.table :back_route="$back_route" :delete_route="$delete_route">
        <x-vtable.row column_name="date">{{ $income->transaction->date }}</x-vtable.row>
        <x-vtable.row column_name="description">
            {{ $income->transaction->description }}
        </x-vtable.row>
        <x-vtable.row column_name="amount">{{ $income->amount }} {{ $income->account->currency->code }}</x-vtable.row>
        <x-vtable.row column_name="account">{{ $income->account->name }}</x-vtable.row>
        <x-vtable.row column_name="category">{{ $income->category->name }}</x-vtable.row>
    </x-vtable.table>
</x-container>
@endsection