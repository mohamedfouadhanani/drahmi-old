@extends('layout')

@section('title', "expenses")

@section('content')
<x-container>
    <x-flash-message name="success" />
    
    @foreach ($accounts as $account)
        @foreach ($account->expenses as $expense)
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
            <section>
                <a href="{{ route("expenses.show", $expense) }}">show</a>
                <a href="{{ route("expenses.edit", $expense) }}">edit</a>
                <form action="{{ route("expenses.destroy", $expense) }}" method="post">
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