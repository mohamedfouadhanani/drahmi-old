@extends('layout')

@section('title', "transfers")

@php
    $link = route("transfers.create")
@endphp

@section('content')
<x-container>
    <x-flash-message name="success" />
    <x-page-header name="transfers" link="{{ $link }}" icon="fa-solid fa-plus"/>
    @foreach ($accounts as $account)
        @foreach ($account->from_transfers as $transfer)
        <section>
            <section>
                id: {{ $transfer->id }}
            </section>
            <section>
                date: {{ $transfer->transaction->date }}
            </section>
            <section>
                description: {{ $transfer->transaction->description }}
            </section>
            <section>
                from account: {{ $transfer->from_account->name }}
            </section>
            <section>
                from amount: {{ $transfer->from_amount }}
            </section>
            <section>
                to account: {{ $transfer->to_account->name }}
            </section>
            <section>
                to amount: {{ $transfer->to_amount }}
            </section>
            <section>
                <a href="{{ route("transfers.show", $transfer) }}">show</a>
                <a href="{{ route("transfers.edit", $transfer) }}">edit</a>
                <form action="{{ route("transfers.destroy", $transfer) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="delete">
                </form>
            </section>
        </section>
        @endforeach
    @endforeach
</x-container>
@endsection