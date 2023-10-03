@extends('layout')

@section('title', "transfer")

@section('content')
<x-container>
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
    </section>
</x-container>
@endsection