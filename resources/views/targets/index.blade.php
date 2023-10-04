@extends('layout')

@section('title', "targets")

@php
    $link = route("targets.create");

    $column_names = ["name", "description", "account", "amount", "condition"];
@endphp

@section('content')
<x-container class="space-y-4">
    <x-flash-message name="success" />
    <x-page-header name="targets" link="{{ $link }}" icon="fa-solid fa-plus"/>
    <x-table.table :column_names="$column_names">
    @foreach ($accounts as $account)
        @foreach ($account->targets as $target)
        @php
            $show_route = route("targets.show", $target);
            $edit_route = route("targets.edit", $target);
            $delete_route = route("targets.destroy", $target);
        @endphp
        <tr>
            <x-table.data>{{ $target->name }}</x-table.data>
            <x-table.data>{{ $target->description }}</x-table.data>
            <x-table.data>{{ $target->account->name }}</x-table.data>
            <x-table.data>{{ $target->amount }} {{ $target->account->currency->code }}</x-table.data>
            <x-table.data>{{ $target->condition }}</x-table.data>
            <x-table.action :show_route="$show_route" :edit_route="$edit_route" :delete_route="$delete_route" />
        </tr>
        @endforeach
    @endforeach
    </x-table.table>
</x-container>
@endsection