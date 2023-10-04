@extends('layout')

@section('title', "Accounts")

@php
    $link = route("accounts.create");

    $column_names = ["name", "description", "balance", "currency"];
@endphp

@section('content')
    <x-container class="space-y-4">
        <x-flash-message name="success" />
        <x-page-header name="accounts" link="{{ $link }}" icon="fa-solid fa-plus"/>
        <x-table.table :column_names="$column_names">
            @foreach ($accounts as $account)
            @php
                $show_route = route("accounts.show", $account);
                $edit_route = route("accounts.edit", $account);
                $delete_route = route("accounts.destroy", $account);
            @endphp
            <tr>
                <x-table.data>{{ $account->name }}</x-table.data>
                <x-table.data>{{ $account->description }}</x-table.data>
                <x-table.data>{{ $account->balance }}</x-table.data>
                <x-table.data>{{ $account->currency->name }}</x-table.data>
                <x-table.action :show_route="$show_route" :edit_route="$edit_route" :delete_route="$delete_route" />
            </tr>
            @endforeach
        </x-table.table>
    </x-container>
@endsection