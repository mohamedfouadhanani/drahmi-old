@extends('layout')

@section('title', $income->exists ? "Update Income" : "Create Income")

@section('content')
    <form action="{{ route($income->exists ? "incomes.update" : "incomes.store", $income) }}" method="post">
        @csrf
        @method($income->exists ? "PUT" : "POST")

        {{-- date --}}
        <x-input-field name="date" label="date">
            <input type="date" id="date" placeholder="Enter the incomes date" value="{{ old("date", \Carbon\Carbon::parse($income->transaction->date)->format('Y-m-d')) }}" name="date">
        </x-input-field>

        {{-- description --}}
        <x-input-field name="description" label="description">
            <textarea name="description" id="description" placeholder="Enter the incomes description">{{ old("description", $income->transaction->description) }}</textarea>
        </x-input-field>

        {{-- amount --}}
        <x-input-field name="amount" label="amount">
            <input type="number" id="amount" placeholder="Enter the incomes amount" value="{{ old("amount", $income->amount) }}" name="amount">
        </x-input-field>

        {{-- account --}}
        <x-input-field name="account_id" label="account">
            <select name="account_id" id="account_id">
                @foreach ($accounts as $account)
                    <option {{ $income->account_id === $account->id ? "selected" : "" }} value="{{ $account->id }}">{{ $account->name }}</option>
                @endforeach
            </select>
        </x-input-field>

        {{-- category --}}
        <x-input-field name="category_id" label="category">
            <select name="category_id" id="category_id">
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
            </select>
        </x-input-field>

        <input type="submit" value="{{ $income->exists ? "Update" : "Create" }}" />
    </form>
@endsection