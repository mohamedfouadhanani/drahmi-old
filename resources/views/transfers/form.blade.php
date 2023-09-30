@extends('layout')

@section('title', $transfer->exists ? "Update Transfer" : "Create Transfer")

@section('content')
    <form action="{{ route($transfer->exists ? "transfers.update" : "transfers.store", $transfer) }}" method="post">
        @csrf
        @method($transfer->exists ? "PUT" : "POST")

        {{-- date --}}
        <x-input-field name="date" label="date">
            <input type="date" id="date" placeholder="Enter the transfers date" value="{{ old("date", $transfer->transaction == null ? "" : \Carbon\Carbon::parse($transfer->transaction->date)->format('Y-m-d')) }}" name="date">
        </x-input-field>

        {{-- description --}}
        <x-input-field name="description" label="description">
            <textarea name="description" id="description" placeholder="Enter the transfers description">{{ old("description", $transfer->transaction == null ? "" : $transfer->transaction->description) }}</textarea>
        </x-input-field>

        {{-- from account --}}
        <x-input-field name="from_account_id" label="from account">
            <select name="from_account_id" id="from_account_id">
                @foreach ($accounts as $account)
                    <option {{ $transfer->from_account_id === $account->id ? "selected" : "" }} value="{{ $account->id }}">{{ $account->name }}</option>
                @endforeach
            </select>
        </x-input-field>
        
        {{-- from amount --}}
        <x-input-field name="from_amount" label="from amount">
            <input type="number" id="from_amount" placeholder="Enter the transfers from amount" value="{{ old("from_amount", $transfer->from_amount) }}" name="from_amount">
        </x-input-field>

        {{-- from account --}}
        <x-input-field name="to_account_id" label="to account">
            <select name="to_account_id" id="to_account_id">
                @foreach ($accounts as $account)
                    <option {{ $transfer->to_account_id === $account->id ? "selected" : "" }} value="{{ $account->id }}">{{ $account->name }}</option>
                @endforeach
            </select>
        </x-input-field>
        
        {{-- to amount --}}
        <x-input-field name="to_amount" label="to amount">
            <input type="number" id="to_amount" placeholder="Enter the transfers to amount" value="{{ old("to_amount", $transfer->to_amount) }}" name="to_amount">
        </x-input-field>

        <input type="submit" value="{{ $transfer->exists ? "Update" : "Create" }}" />
    </form>
@endsection