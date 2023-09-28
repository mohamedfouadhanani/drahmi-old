@extends('layout')

@section("title", "Login")

@section('content')
    <form action="{{ route("login") }}" method="post">
        @csrf
        <x-input-field name="email" label="email">
            <input type="email" id="email" placeholder="Enter your email" value="{{ old("email") }}" name="email">
        </x-input-field>

        <x-input-field name="password" label="password">
            <input type="password" id="password" placeholder="Enter your password" name="password">
        </x-input-field>

        <input type="submit" value="login" />
    </form>

    <span>don't have an account? <a href="{{route("register")}}">register</a></span>
    
@endsection