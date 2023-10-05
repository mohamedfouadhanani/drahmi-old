@extends('layout')

@section("title", "Email Verification")

@section('content')
    <x-container class="space-y-4">
        <x-flash-message name="status" />
        
        <form action="{{ route("verification.send") }}" method="post" class="inline text-xl capitalize">
            @csrf
            <span class="">you must verify your email address, please check your email for the verification link</span>
            <input class="text-blue-600 hover:underline cursor-pointer" type="submit" value="resend email" />
        </form>
    </x-container>
    
@endsection