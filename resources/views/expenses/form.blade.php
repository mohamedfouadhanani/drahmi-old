@extends('layout')

@section('title', $expense->exists ? "Update Expense" : "Create Expense")

@php
    $date = old("date", $expense->transaction == null ? "" : \Carbon\Carbon::parse($expense->transaction->date)->format('Y-m-d'));
    $description = old("description", $expense->transaction == null ? "" : $expense->transaction->description);
    $amount = old("amount", $expense->amount);

    $route = route($expense->exists ? "expenses.update" : "expenses.store", $expense);
    $back_link = route("expenses.index");
    $button_text = $expense->exists ? "Update" : "Create";
@endphp

@section('content')
<x-container>
    <x-form.form action="{{ $route }}" method="post">
        @csrf
        @method($expense->exists ? "PUT" : "POST")

        {{-- date --}}
        <x-input.section name="date" label="date">
            <x-input.field type="date" name="date" placeholder="Enter the expenses date" :value="$date" :errors="$errors" />
        </x-input.section>

        {{-- description --}}
        <x-input.section name="description" label="description">
            <x-textarea-field name="description" placeholder="Enter the expenses description" :value="$description" :errors="$errors" />
        </x-input.section>

        {{-- amount --}}
        <x-input.section name="amount" label="amount">
            <x-input.field type="number" name="amount" placeholder="Enter the expenses amount" :value="$amount" :errors="$errors" />
        </x-input.section>

        {{-- account --}}
        <x-input.section name="account_id" label="account">
            <x-select-field name="account_id">
                @foreach ($accounts as $account)
                    <option {{ $expense->account_id === $account->id ? "selected" : "" }} value="{{ $account->id }}">{{ $account->name }}</option>
                @endforeach
            </x-select-field>
        </x-input.section>

        {{-- category --}}
        <x-input.section name="category_id" label="category">
            <x-select-field name="category_id">
                <optgroup label="System Categories">
                    @foreach ($system_categories as $system_category)
                        <option {{ $expense->category_id === $system_category->id ? "selected" : "" }} value="{{ $system_category->id }}">{{ $system_category->name }}</option>
                    @endforeach
                </optgroup>

                @if (count($custom_categories) > 0)
                <optgroup label="Custom Categories">
                    @foreach ($custom_categories as $custom_category)
                        <option {{ $expense->category_id === $custom_category->id ? "selected" : "" }} value="{{ $custom_category->id }}">{{ $custom_category->name }}</option>
                    @endforeach
                </optgroup>
                @endif
            </x-select-field>
        </x-input.section>

        <x-form.action-section back_link="{{ $back_link }}" text="{{ $button_text }}" />
    </x-form.form>
</x-container>
@endsection