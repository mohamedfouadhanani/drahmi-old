@extends('layout')

@section('title', "Expenses")

@php
    $link = route("expenses.create");

    $column_names = ["date", "description", "amount", "category", "account"];
@endphp

@section('content')
<x-container class="space-y-4">
    <x-flash-message name="success" />
    <x-page-header name="expenses" link="{{ $link }}" icon="fa-solid fa-plus"/>
    <x-table.table :column_names="$column_names">
    @foreach ($accounts as $account)
        @foreach ($account->expenses as $expense)
        @php
            $show_route = route("expenses.show", $expense);
            $edit_route = route("expenses.edit", $expense);
            $delete_route = route("expenses.destroy", $expense);
        @endphp
        <tr>
            <x-table.data>{{ $expense->transaction->date }}</x-table.data>
            <x-table.data>{{ $expense->transaction->description }}</x-table.data>
            <x-table.data>{{ $expense->amount }} {{ $expense->account->currency->code }}</x-table.data>
            <x-table.data>{{ $expense->category->name }}</x-table.data>
            <x-table.data>{{ $expense->account->name }}</x-table.data>
            <x-table.action :show_route="$show_route" :edit_route="$edit_route" :delete_route="$delete_route" />
        </tr>
        @endforeach
    @endforeach
    </x-table.table>    
</x-container>
@endsection