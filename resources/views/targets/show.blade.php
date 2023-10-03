@extends('layout')

@section('title', $target->name)

@section('content')
<x-container>
    <section>
        <section>
            id: {{ $target->id }}
        </section>
        <section>
            name: {{ $target->name }}
        </section>
        <section>
            description: {{ $target->description }}
        </section>
        <section>
            amount: {{ $target->amount }} {{ $target->account->currency->code }}
        </section>
        <section>
            account: {{ $target->account->name }}
        </section>
        <section>
            condition: {{ $target->condition }}
        </section>
    </section>
</x-container>
@endsection