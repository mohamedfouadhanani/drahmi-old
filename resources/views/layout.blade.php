<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://kit.fontawesome.com/8b339e535a.js" crossorigin="anonymous"></script>

    @vite('resources/js/navbar.js')

    @vite('resources/css/app.css')

    <title>drahmi | @yield('title')</title>
</head>
<body class="space-y-4">
    @include('partials.header')
    @yield('content')
</body>
</html>