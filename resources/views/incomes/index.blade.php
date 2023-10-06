@extends('layout')

@section('title', "Incomes")

@php
    $link = route("incomes.create");

    $column_names = ["date", "description", "amount", "category", "account"];
@endphp

@section('content')
<x-container class="space-y-4">
    <x-flash-message name="success" />
    <x-page-header name="incomes" link="{{ $link }}" icon="fa-solid fa-plus"/>
    <x-table.table :column_names="$column_names">
    @foreach ($accounts as $account)
        @foreach ($account->incomes as $income)
        @php
            $show_route = route("incomes.show", $income);
            $edit_route = route("incomes.edit", $income);
            $delete_route = route("incomes.destroy", $income);
        @endphp
        <tr>
            <x-table.data>{{ $income->transaction->date }}</x-table.data>
            <x-table.data>{{ $income->transaction->description }}</x-table.data>
            <x-table.data>{{ $income->amount }} {{ $income->account->currency->code }}</x-table.data>
            <x-table.data>{{ $income->category->name }}</x-table.data>
            <x-table.data>{{ $income->account->name }}</x-table.data>
            <x-table.action :show_route="$show_route" :edit_route="$edit_route" :delete_route="$delete_route" />
        </tr>
        @endforeach
    @endforeach
    </x-table.table>
</x-container>
@endsection