@extends('layout')

@section("title", "Profile")

@section('content')
    <x-flash-message name="status" />
    <form action="{{ route("user-profile-information.update") }}" method="post">
        @csrf
        @method("PUT")
        <x-input-field name="name" label="name">
            <input type="text" id="name" placeholder="Enter your name" value="{{ auth()->user()->name }}" name="name">
        </x-input-field>

        <x-input-field name="email" label="email">
            <input type="email" id="email" placeholder="Enter your email" value="{{ auth()->user()->email }}" name="email">
        </x-input-field>

        <input type="submit" value="update" />
    </form>

    <span>already have an account? <a href="{{route("login")}}">login</a></span>
    
@endsection