@extends('layout')

@section('title', $account->exists ? "Update Account" : "Create Account")

@php
    $name = old("name", $account->name);
    $description = old("description", $account->description);
    $initial_balance = old("initial_balance", $account->initial_balance);

    $route = route($account->exists ? "accounts.update" : "accounts.store", $account);
    $back_link = route("accounts.index");
    $button_text = $account->exists ? "Update" : "Create";
@endphp

@section('content')
<x-container>
    <x-form.form action="{{ $route }}" method="post">
        @csrf
        @method($account->exists ? "PUT" : "POST")

        <x-input.section name="name" label="name">
            <x-input.field type="text" name="name" placeholder="Enter the accounts name" :value="$name" :errors="$errors" />
        </x-input.section>

        <x-input.section name="description" label="description">
            <x-textarea-field name="description" placeholder="Enter the accounts description" :value="$description" :errors="$errors" />
        </x-input.section>

        <x-input.section name="initial_balance" label="initial balance">
            <x-input.field type="number" name="initial_balance" placeholder="Enter the accounts initial balance" :value="$initial_balance" :errors="$errors" />
        </x-input.section>

        <x-input.section name="currency_id" label="currency">
            <x-select-field name="currency_id">
                @foreach ($currencies as $currency)
                    <option {{ $account->currency_id === $currency->id ? "selected" : "" }} value="{{ $currency->id }}">{{ $currency->name }}</option>
                @endforeach
            </x-select-field>
        </x-input.section>
        
        <x-form.action-section back_link="{{ $back_link }}" text="{{ $button_text }}" />
    </x-form.form>
</x-container>
@endsection