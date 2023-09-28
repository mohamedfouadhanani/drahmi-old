@extends('layout')

@section("title", "Register")

@section('content')
    <form action="{{ route("register") }}" method="post">
        @csrf
        <x-input-field name="name" label="name">
            <input type="text" id="name" placeholder="Enter your name" value="{{ old("name") }}" name="name">
        </x-input-field>

        <x-input-field name="email" label="email">
            <input type="email" id="email" placeholder="Enter your email" value="{{ old("email") }}" name="email">
        </x-input-field>

        <x-input-field name="password" label="password">
            <input type="password" id="password" placeholder="Enter your password" name="password">
        </x-input-field>

        <x-input-field name="password_confirmation" label="confirmation password">
            <input type="password" id="password_confirmation" placeholder="Re-enter your password" name="password_confirmation">
        </x-input-field>

        <input type="submit" value="register" />
    </form>

    <span>already have an account? <a href="{{route("login")}}">login</a></span>
    
@endsection