@extends('layout')

@section('title', $target->exists ? "Update Target" : "Create Target")

@php
    $name = old("name", $target->name);
    $description = old("description", $target->transaction == null ? "" : $target->transaction->description);
    $amount = old("amount", $target->amount);

    $route = route($target->exists ? "targets.update" : "targets.store", $target);
    $back_link = route("targets.index");
    $button_text = $target->exists ? "Update" : "Create";
@endphp

@section('content')
<x-container>
    <x-form.form action="{{ $route }}" method="post">
        @csrf
        @method($target->exists ? "PUT" : "POST")
        
        <x-input.section name="name" label="name">
            <x-input.field type="text" name="name" placeholder="Enter the targets name" :value="$name" :errors="$errors" />
        </x-input.section>

        <x-input.section name="description" label="description">
            <x-textarea-field name="description" placeholder="Enter the targets description" :value="$description" :errors="$errors" />
        </x-input.section>

        <x-input.section name="account_id" label="account">
            <x-select-field name="account_id">
                @foreach ($accounts as $account)
                    <option {{ $target->account_id === $account->id ? "selected" : "" }} value="{{ $account->id }}">{{ $account->name }} - {{ $account->balance }} {{ $account->currency->code }}</option>
                @endforeach
            </x-select-field>
        </x-input.section>

        <x-input.section name="amount" label="amount">
            <x-input.field type="number" name="amount" placeholder="Enter the targets amount" :value="$amount" :errors="$errors" />
        </x-input.section>

        <x-input.section name="condition" label="condition">
            <x-select-field name="condition">
                @foreach ($conditions as $condition)
                    <option {{ $target->condition->value == $condition ? "selected" : "" }} value="{{ $condition }}">{{ $condition }}</option>
                @endforeach
            </x-select-field>
        </x-input.section>

        <x-form.action-section back_link="{{ $back_link }}" text="{{ $button_text }}" />
    </x-form.form>
</x-container>
@endsection