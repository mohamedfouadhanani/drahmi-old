@extends('layout')

@section("title", "Reset Your Password")

@php
    $route = route("password.update");
    $back_link = route("login");
    $button_text = "reset";
@endphp

@section('content')
<x-container>
    <x-form.from action="{{ $route }}" method="post">
        @csrf
        <input type="hidden" value="{{ $request->email }}" name="email">

        <input type="hidden" value="{{ $request->route("token") }}" name="token">

        <x-input.section name="password" label="password">
            <x-input.field type="password" name="password" placeholder="Enter the new password" :value="$password" :errors="$errors" />
        </x-input.section>

        <x-input.section name="password_confirmation" label="confirmation password">
            <x-input.field type="password" name="password_confirmation" placeholder="Re-enter the new password" :errors="$errors" />
        </x-input.section>

        <x-form.action-section back_link="{{ $back_link }}" text="{{ $button_text }}" />
    </x-form.from>
</x-container>
@endsection