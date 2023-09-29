@extends('layout')

@section('title', $account->exists ? "Update Account" : "Create Account")

@section('content')
    <form action="{{ route($account->exists ? "accounts.update" : "accounts.store", $account) }}" method="post">
        @csrf
        @method($account->exists ? "PUT" : "POST")

        <x-input-field name="name" label="name">
            <input type="text" id="name" placeholder="Enter the accounts name" value="{{ old("name", $account->name) }}" name="name">
        </x-input-field>

        <x-input-field name="description" label="description">
            <textarea name="description" id="description" placeholder="Enter the accounts description">{{ old("description", $account->description) }}</textarea>
        </x-input-field>

        <x-input-field name="initial_balance" label="initial balance">
            <input type="number" id="initial_balance" placeholder="Enter the accounts initial balance" value="{{ old("initial_balance", $account->initial_balance) }}" name="initial_balance">
        </x-input-field>

        <x-input-field name="currency_id" label="currency">
            <select name="currency_id" id="currency_id">
                @foreach ($currencies as $currency)
                    <option {{ $account->currency_id === $currency->id ? "selected" : "" }} value="{{ $currency->id }}">{{ $currency->name }}</option>
                @endforeach
            </select>
        </x-input-field>
        
        <input type="submit" value="{{ $account->exists ? "Update" : "Create" }}" />
    </form>
@endsection