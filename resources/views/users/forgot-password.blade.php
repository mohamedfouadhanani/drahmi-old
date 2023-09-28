@extends('layout')

@section("title", "Forgot Password")

@section('content')
    <x-flash-message name="status" />
    <form action="{{ route("password.request") }}" method="post">
        @csrf
        <x-input-field name="email" label="email">
            <input type="email" id="email" placeholder="Enter your email" value="{{ old("email") }}" name="email">
        </x-input-field>

        <input type="submit" value="reset" />
    </form>

    <span>don't have an account? <a href="{{route("register")}}">register</a></span>
@endsection