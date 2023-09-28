@extends('layout')

@section("title", "Reset Your Password")

@section('content')
    <form action="{{ route("password.update") }}" method="post">
        @csrf
        <input type="hidden" value="{{ $request->email }}" name="email">

        <input type="hidden" value="{{ $request->route("token") }}" name="token">

        <x-input-field name="password" label="password">
            <input type="password" id="password" placeholder="Enter your password" name="password">
        </x-input-field>

        <x-input-field name="password_confirmation" label="confirmation password">
            <input type="password" id="password_confirmation" placeholder="Re-enter your password" name="password_confirmation">
        </x-input-field>

        <input type="submit" value="reset" />
    </form>
@endsection