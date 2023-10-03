@extends('layout')

@section('title', $account->name)

@section('content')
<x-container>
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
            created_at: {{ $account->created_at }}
        </section>
        <section>
            updated_at: {{ $account->updated_at }}
        </section>
    </section>
</x-container>
@endsection