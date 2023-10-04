@extends('layout')

@section('title', "transfers")

@php
    $link = route("transfers.create");

    $column_names = ["date", "description", "from account", "from amount", "to account", "to amount"];
@endphp

@section('content')
<x-container class="space-y-4">
    <x-flash-message name="success" />
    <x-page-header name="transfers" link="{{ $link }}" icon="fa-solid fa-plus"/>
    <x-table.table :column_names="$column_names">
    @foreach ($accounts as $account)
        @foreach ($account->from_transfers as $transfer)
        @php
            $show_route = route("transfers.show", $transfer);
            $edit_route = route("transfers.edit", $transfer);
            $delete_route = route("transfers.destroy", $transfer);
        @endphp
        <tr>
            <x-table.data>{{ $transfer->transaction->date }}</x-table.data>
            <x-table.data>{{ $transfer->transaction->description }}</x-table.data>
            <x-table.data>{{ $transfer->from_account->name }}</x-table.data>
            <x-table.data>{{ $transfer->from_amount }}</x-table.data>
            <x-table.data>{{ $transfer->to_account->name }}</x-table.data>
            <x-table.data>{{ $transfer->to_amount }}</x-table.data>
            <x-table.action :show_route="$show_route" :edit_route="$edit_route" :delete_route="$delete_route" />
        </tr>
        @endforeach
    @endforeach
    </x-table.table>
</x-container>
@endsection