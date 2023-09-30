@extends('layout')

@section('title', $expense->exists ? "Update Expense" : "Create Expense")

@section('content')
    <form action="{{ route($expense->exists ? "expenses.update" : "expenses.store", $expense) }}" method="post">
        @csrf
        @method($expense->exists ? "PUT" : "POST")

        {{-- date --}}
        <x-input-field name="date" label="date">
            <input type="date" id="date" placeholder="Enter the expenses date" value="{{ old("date", $expense->transaction == null ? "" : \Carbon\Carbon::parse($expense->transaction->date)->format('Y-m-d')) }}" name="date">
        </x-input-field>

        {{-- description --}}
        <x-input-field name="description" label="description">
            <textarea name="description" id="description" placeholder="Enter the expenses description">{{ old("description", $expense->transaction == null ? "" : $expense->transaction->description) }}</textarea>
        </x-input-field>

        {{-- amount --}}
        <x-input-field name="amount" label="amount">
            <input type="number" id="amount" placeholder="Enter the expenses amount" value="{{ old("amount", $expense->amount) }}" name="amount">
        </x-input-field>

        {{-- account --}}
        <x-input-field name="account_id" label="account">
            <select name="account_id" id="account_id">
                @foreach ($accounts as $account)
                    <option {{ $expense->account_id === $account->id ? "selected" : "" }} value="{{ $account->id }}">{{ $account->name }}</option>
                @endforeach
            </select>
        </x-input-field>

        {{-- category --}}
        <x-input-field name="category_id" label="category">
            <select name="category_id" id="category_id">
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
            </select>
        </x-input-field>

        <input type="submit" value="{{ $expense->exists ? "Update" : "Create" }}" />
    </form>
@endsection