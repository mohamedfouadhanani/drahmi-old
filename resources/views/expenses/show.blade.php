@extends('layout')

@section('title', "expense")

@section('content')
<x-container>
    <section>
        <section>
            id: {{ $expense->id }}
        </section>
        <section>
            date: {{ $expense->transaction->date }}
        </section>
        <section>
            description: {{ $expense->transaction->description }}
        </section>
        <section>
            amount: {{ $expense->amount }}
        </section>
        <section>
            category: {{ $expense->category->name }}
        </section>
        <section>
            account: {{ $expense->account->name }}
        </section>
    </section>
</x-container>
@endsection