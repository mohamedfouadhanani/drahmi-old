@extends('layout')

@section('title', $income->name)

@section('content')
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
@endsection