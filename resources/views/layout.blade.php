<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- GOOGLE FONT --}}
    {{-- "Dancing Script" --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    {{-- GOOGLE FONT --}}
    
    <script src="https://kit.fontawesome.com/8b339e535a.js" crossorigin="anonymous"></script>

    @vite('resources/js/navbar.js')
    @vite('resources/js/flash-message.js')
    @vite('resources/js/profile-dropdown.js')
    @vite('resources/js/theme.js')

    @vite('resources/css/app.css')

    <title>drahmi | @yield('title')</title>
</head>
<body class="space-y-4 dark:bg-gray-900 dark:text-white">
    @include('partials.header.header')
    @yield('content')
</body>
</html>