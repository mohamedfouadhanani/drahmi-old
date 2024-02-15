@php
    $accounts_route = route("accounts.index");
    $categories_route = route("categories.index");
    $incomes_route = route("incomes.index");
    $expenses_route = route("expenses.index");
    $transfers_route = route("transfers.index");
    $targets_route = route("targets.index");
    $profile_route = route("users.profile");
    $login_route = route("login");
    $register_route = route("register");

    if (auth()->user()) {
        $profile_picture_path = "storage/" . auth()->user()->profile_picture;
    }
@endphp

<header class="bg-neutral-900 text-white dark:bg-gray-900">
    <x-container class="flex justify-between items-center">
        <section class="flex items-center space-x-2 select-none">
            <i class="fa-solid fa-money-bills text-xl"></i>
            <h1 class="font-bold text-xl capitalize font-dancing">drahmi</h1>
        </section>
        <section class="flex items-center justify-between">
            @include('partials.header.nav-links', ["class" => "hidden sm:flex items-center space-x-2"])
            <button id="theme-btn" class="px-3 py-2 rounded bg-transparent focus:bg-primary-800 dark:focus:bg-gray-800" id="menu-btn">
                <i class="fa-solid fa-sun"></i>
            </button>
            @auth
                @include('partials.profile-dropdown.dropdown')
            @endauth
            <section class="sm:hidden flex items-center justify-between space-x-2">
                @auth
                @endauth
                <button class="px-3 py-2 rounded bg-transparent focus:bg-primary-800 dark:focus:bg-gray-800" id="menu-btn">
                    <i id="bars-icon" class="fa-solid fa-bars"></i>
                    <i id="xmark-icon" class="hidden fa-solid fa-xmark"></i>
                </button>
            </section>
        </section>
    </x-container>
    {{-- small screen navbar --}}
    @include('partials.header.nav-links', ["id" => "small-screen-navbar", "class" => "hidden flex-col dark:bg-gray-950"])
</header>