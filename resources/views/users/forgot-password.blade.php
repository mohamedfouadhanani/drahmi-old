@extends('layout')

@section("title", "Forgot Password")

@php
    $email = old("email");

    $route = route("password.request");
    $back_link = route("login");
@endphp

@section('content')
<x-container>
    <x-flash-message name="status" />
    <x-form.form action="{{ $route }}" method="post">
        @csrf
        <x-input.section name="email" label="email">
            <x-input.field type="email" name="email" placeholder="Enter your email" :value="$email" :errors="$errors" />
        </x-input.section>

        <x-form.action-section back_link="{{ $back_link }}" text="reset" />
    </x-form.form>
</x-container>
@endsection