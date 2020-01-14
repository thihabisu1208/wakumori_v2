<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'わくわくの森') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="shortcut icon" href="{{ asset('img/saruFace12.png') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="home">
        <div id="topNav">
            <p>
                <a style="color: #000; text-decoration: none;" href="{{ url('/home') }}">{{ config('app.name', 'Laravel') }}</a>
            </p>
        </div>

        <main class="container" id="teacher">
            @yield('content')
        </main>
    </div>
</body>
</html>
