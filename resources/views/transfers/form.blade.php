@extends('layout')

@section('title', $transfer->exists ? "Update Transfer" : "Create Transfer")

@php
    $date = old("date", $transfer->transaction == null ? "" : \Carbon\Carbon::parse($transfer->transaction->date)->format('Y-m-d'));
    $description = old("description", $transfer->transaction == null ? "" : $transfer->transaction->description);
    $from_amount = old("from_amount", $transfer->from_amount);
    $to_amount = old("to_amount", $transfer->to_amount);

    $route = route($transfer->exists ? "transfers.update" : "transfers.store", $transfer);
    $back_link = route("transfers.index");
    $button_text = $transfer->exists ? "Update" : "Create";
@endphp

@section('content')
<x-container>
    <x-form.form action="{{ $route }}" method="post">
        @csrf
        @method($transfer->exists ? "PUT" : "POST")

        {{-- date --}}
        <x-input.section name="date" label="date">
            <x-input.field type="date" name="date" placeholder="Enter the transfers date" :value="$date" :errors="$errors" />
        </x-input.section>

        {{-- description --}}
        <x-input.section name="description" label="description">
            <x-textarea-field name="description" placeholder="Enter the transfers description" :value="$description" :errors="$errors" />
        </x-input.section>

        {{-- from account --}}
        <x-input.section name="from_account_id" label="from account">
            <x-select-field name="from_account_id">
                @foreach ($accounts as $account)
                    <option {{ $transfer->from_account_id === $account->id ? "selected" : "" }} value="{{ $account->id }}">{{ $account->name }} - {{ $account->balance }} {{ $account->currency->code }}</option>
                @endforeach
            </x-select-field>
        </x-input.section>
        
        {{-- from amount --}}
        <x-input.section name="from_amount" label="from amount">
            <x-input.field type="number" name="from_amount" placeholder="Enter the transfers from amount" :value="$from_amount" :errors="$errors" />
        </x-input.section>

        {{-- from account --}}
        <x-input.section name="to_account_id" label="to account">
            <x-select-field name="to_account_id">
                @foreach ($accounts as $account)
                    <option {{ $transfer->to_account_id === $account->id ? "selected" : "" }} value="{{ $account->id }}">{{ $account->name }} - {{ $account->balance }} {{ $account->currency->code }}</option>
                @endforeach
            </x-select-field>
        </x-input.section>
        
        {{-- to amount --}}
        <x-input.section name="to_amount" label="to amount">
            <x-input.field type="number" name="to_amount" placeholder="Enter the transfers to amount" :value="$to_amount" :errors="$errors" />
        </x-input.section>

        <x-form.action-section back_link="{{ $back_link }}" text="{{ $button_text }}" />
    </x-form.form>
</x-container>
@endsection