@extends('layout')

@section('title', $income->exists ? "Update Income" : "Create Income")

@php
    $date = old("date", $income->transaction == null ? "" : \Carbon\Carbon::parse($income->transaction->date)->format('Y-m-d'));
    $description = old("description", $income->transaction == null ? "" : $income->transaction->description);
    $amount = old("amount", $income->amount);

    $route = route($income->exists ? "incomes.update" : "incomes.store", $income);
    $back_link = route("incomes.index");
    $button_text = $income->exists ? "Update" : "Create";
@endphp

@section('content')
<x-container>
    <x-form.form action="{{ $route }}" method="post">
        @csrf
        @method($income->exists ? "PUT" : "POST")

        {{-- date --}}
        <x-input.section name="date" label="date">
            <x-input.field type="date" name="date" placeholder="Enter the incomes date" :value="$date" :errors="$errors" />
        </x-input.section>

        {{-- description --}}
        <x-input.section name="description" label="description">
            <x-textarea-field name="description" placeholder="Enter the incomes description" :value="$description" :errors="$errors" />
        </x-input.section>

        {{-- amount --}}
        <x-input.section name="amount" label="amount">
            <x-input.field type="number" name="amount" placeholder="Enter the incomes amount" :value="$amount" :errors="$errors" />
        </x-input.section>

        {{-- account --}}
        <x-input.section name="account_id" label="account">
            <x-select-field name="account_id">
                @foreach ($accounts as $account)
                    <option {{ $income->account_id === $account->id ? "selected" : "" }} value="{{ $account->id }}">{{ $account->name }} - {{ $account->balance }} {{ $account->currency->code }}</option>
                @endforeach
            </x-select-field>
        </x-input.section>

        {{-- category --}}
        <x-input.section name="category_id" label="category">
            <x-select-field name="category_id">
                <optgroup label="System Categories">
                    @foreach ($system_categories as $system_category)
                        <option {{ $income->category_id === $system_category->id ? "selected" : "" }} value="{{ $system_category->id }}">{{ $system_category->name }}</option>
                    @endforeach
                </optgroup>

                @if (count($custom_categories) > 0)
                <optgroup label="Custom Categories">
                    @foreach ($custom_categories as $custom_category)
                        <option {{ $income->category_id === $custom_category->id ? "selected" : "" }} value="{{ $custom_category->id }}">{{ $custom_category->name }}</option>
                    @endforeach
                </optgroup>
                @endif
            </x-select-field>
        </x-input.section>

        <x-form.action-section back_link="{{ $back_link }}" text="{{ $button_text }}" />
    </x-form.form>
</x-container>
@endsection