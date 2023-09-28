@extends('layout')

@section("title", "Email Verification")

@section('content')
    <x-flash-message name="status" />

    <h1>you must verify your email address, please check your email for the verification link</h1>

    <form action="{{ route("verification.send") }}" method="post">
        @csrf
        <input type="submit" value="resend email" />
    </form>

    <span>don't have an account? <a href="{{route("register")}}">register</a></span>
    
@endsection