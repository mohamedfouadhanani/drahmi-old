@php
    if (auth()->user()) {
        $profile_picture_path = "storage/" . auth()->user()->profile_picture;
    }
@endphp

<section class="relative p-2">
    <section>
      <button id="profile-dropdown-btn" class="mt-0.5 relative flex rounded-full bg-white dark:bg-gray-900 text-sm focus:outline-none focus:ring-2 focus:ring-white dark:focus:ring-gray-900 focus:ring-offset-2 focus:ring-offset-gray-800 dark:focus:ring-offset-gray-200" id="user-menu-button">
        <img class="h-6 w-6 rounded-full" src="{{ $profile_picture_path ? asset($profile_picture_path) : "https://t3.ftcdn.net/jpg/05/16/27/58/360_F_516275801_f3Fsp17x6HQK0xQgDQEELoTuERO4SsWV.jpg" }}" alt="">
      </button>
    </section>
    <section id="profile-dropdown-list" class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded bg-white dark:bg-gray-900 py-1 shadow-lg ring-1 ring-black dark:ring-gray-600 ring-opacity-5 focus:outline-none">
        @include('partials.profile-dropdown.link', ["href" => route("users.profile"), "text" => "Your Profile"])
        <form action="{{ route("logout") }}" method="post" class="cursor-pointer block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-primary-100 dark:hover:bg-gray-800">
            @csrf
            <input type="submit" value="Sign out" class="cursor-pointer w-full text-left">
        </form>
    </section>
</section>