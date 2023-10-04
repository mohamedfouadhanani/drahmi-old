@extends('layout')

@section("title", "Profile")

@php
    $name = auth()->user()->name;
    $email = auth()->user()->email;

    $route_name_email = route("user-profile-information.update");
    $back_link = route("accounts.index");
    $button_text = "Update";

    $route_profile_picture = route("users.profile_picture_update");
@endphp

@section('content')
<x-container class="space-y-4">
    <x-flash-message name="status" />
    <x-form.form action="{{ $route_name_email }}" method="post">
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

    <x-form.form action="{{ $route_profile_picture }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        
        <x-input.section name="profile_picture" label="profile picture">
            <x-input.field type="file" name="profile_picture" />
        </x-input.section>

        <x-form.action-section back_link="{{ $back_link }}" text="{{ $button_text }}" />
    </x-form.form>
</x-container>
@endsection