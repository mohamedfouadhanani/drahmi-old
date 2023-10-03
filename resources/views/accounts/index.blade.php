@extends('layout')

@section('title', "Accounts")

@php
    $link = route("accounts.create")
@endphp

@section('content')
    <x-container>
        <x-flash-message name="success" />
        <x-page-header name="accounts" link="{{ $link }}" icon="fa-solid fa-plus"/>
        @foreach ($accounts as $account)
            <section>
                <section>
                    id: {{ $account->id }}
                </section>
                <section>
                    name: {{ $account->name }}
                </section>
                <section>
                    description: {{ $account->description }}
                </section>
                <section>
                    initial balance: {{ $account->initial_balance }}
                </section>
                <section>
                    currency: {{ $account->currency->name }}
                </section>
                <section>
                    <a href="{{ route("accounts.show", $account) }}">show</a>
                    <a href="{{ route("accounts.edit", $account) }}">edit</a>
                    <form action="{{ route("accounts.destroy", $account) }}" method="post">
                        @csrf
                        @method("DELETE")
                        <input type="submit" value="delete">
                    </form>
                </section>
            </section>
        @endforeach
    </x-container>
@endsection