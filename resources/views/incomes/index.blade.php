@extends('layout')

@section('title', "incomes")

@section('content')
    @foreach ($accounts as $account)
        @foreach ($account->incomes as $income)
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
            <section>
                <a href="{{ route("incomes.show", $income) }}">show</a>
                <a href="{{ route("incomes.edit", $income) }}">edit</a>
                <form action="{{ route("incomes.destroy", $income) }}" method="post">
                    @csrf
                    @method("DELETE")
                    <input type="submit" value="delete">
                </form>
            </section>
        </section>
        @endforeach
    @endforeach
@endsection