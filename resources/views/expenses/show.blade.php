@extends('layout')

@section('title', "Expense")

@php
    $back_route = route("expenses.index");
    $delete_route = route("expenses.destroy", $expense);
@endphp

@section('content')
<x-container>
    <x-vtable.table :back_route="$back_route" :delete_route="$delete_route">
        <x-vtable.row column_name="date">{{ $expense->transaction->date }}</x-vtable.row>
        <x-vtable.row column_name="description">
            {{ $expense->transaction->description }}
        </x-vtable.row>
        <x-vtable.row column_name="amount">{{ $expense->amount }} {{ $expense->account->currency->code }}</x-vtable.row>
        <x-vtable.row column_name="account">{{ $expense->account->name }}</x-vtable.row>
        <x-vtable.row column_name="category">{{ $expense->category->name }}</x-vtable.row>
    </x-vtable.table>
</x-container>
@endsection