@php
    $id ??= "";
@endphp

<nav id="{{ $id }}" class="{{ $class }}">
    @auth
    <x-navbar.link href="{{ $accounts_route }}">accounts</x-navbar.link>
    <x-navbar.link href="{{ $categories_route }}">categories</x-navbar.link>
    <x-navbar.link href="{{ $incomes_route }}">incomes</x-navbar.link>
    <x-navbar.link href="{{ $expenses_route }}">expenses</x-navbar.link>
    <x-navbar.link href="{{ $transfers_route }}">transfers</x-navbar.link>
    <x-navbar.link href="{{ $targets_route }}">targets</x-navbar.link>        
    @endauth
    
    @guest
    <x-navbar.link href="{{ $login_route }}">login</x-navbar.link>
    <x-navbar.link href="{{ $register_route }}">register</x-navbar.link>
    @endguest
</nav>