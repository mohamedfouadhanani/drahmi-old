@extends('layout')

@section('title', "income")

@section('content')
<x-container>
    <section>
        <section>
            id: {{ $income->id }}
        </section>
        <section>
            date: {{ $income->transaction->date }}
        </section>
        <section>
            description: {{ $income->transaction->description }}
        </section>
        <section>
            amount: {{ $income->amount }}
        </section>
        <section>
            category: {{ $income->category->name }}
        </section>
        <section>
            account: {{ $income->account->name }}
        </section>
    </section>
</x-container>
@endsection