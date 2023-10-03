@extends('layout')

@section('title', "targets")

@section('content')
<x-container>
    <x-flash-message name="success" />
    
    @foreach ($accounts as $account)
        @foreach ($account->targets as $target)
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
            <section>
                <a href="{{ route("targets.show", $target) }}">show</a>
                <a href="{{ route("targets.edit", $target) }}">edit</a>
                <form action="{{ route("targets.destroy", $target) }}" method="post">
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