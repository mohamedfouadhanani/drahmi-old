@extends('layout')

@section('title', $target->exists ? "Update Target" : "Create Target")

@section('content')
    <form action="{{ route($target->exists ? "targets.update" : "targets.store", $target) }}" method="post">
        @csrf
        @method($target->exists ? "PUT" : "POST")
        
        <x-input-field name="name" label="name">
            <input type="text" id="name" placeholder="Enter the targets name" value="{{ old("name", $target->name) }}" name="name">
        </x-input-field>

        <x-input-field name="description" label="description">
            <textarea name="description" id="description" placeholder="Enter the targets description">{{ old("description", $target->description) }}</textarea>
        </x-input-field>

        <x-input-field name="account_id" label="account">
            <select name="account_id" id="account_id">
                @foreach ($accounts as $account)
                    <option {{ $target->account_id === $account->id ? "selected" : "" }} value="{{ $account->id }}">{{ $account->name }}</option>
                @endforeach
            </select>
        </x-input-field>

        <x-input-field name="amount" label="amount">
            <input type="number" id="amount" placeholder="Enter the targets amount" value="{{ old("amount", $target->amount) }}" name="amount">
        </x-input-field>
        <x-input-field name="condition" label="condition">
            <select name="condition" id="condition">
                @foreach ($conditions as $condition)
                    <option {{ $target->condition->value == $condition ? "selected" : "" }} value="{{ $condition }}">{{ $condition }}</option>
                @endforeach
            </select>
        </x-input-field>

        <input type="submit" value="{{ $target->exists ? "Update" : "Create" }}" />
    </form>
@endsection