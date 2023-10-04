@extends('layout')

@section("title", "Profile")

@php
    $name = auth()->user()->name;
    $email = auth()->user()->email;

    $route = route("user-profile-information.update");
    $back_link = route("accounts.index");
    $button_text = "Update";
@endphp

@section('content')
<x-container>
    <x-flash-message name="status" />
    <x-form.form action="{{ $route }}" method="post">
        @csrf
        @method("PUT")
        <x-input.section name="name" label="name">
            <x-input.field type="text" name="name" placeholder="Enter your name" :value="$name" :errors="$errors" />
        </x-input.section>

        <x-input.section name="email" label="email">
            <x-input.field type="email" name="email" placeholder="Enter your email" :value="$email" :errors="$errors" />
        </x-input.section>

        <x-form.action-section back_link="{{ $back_link }}" text="{{ $button_text }}" />
    </x-form.form>
</x-container>
@endsection