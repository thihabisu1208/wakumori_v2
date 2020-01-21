<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'わくわくの森') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/saruFace12.png') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="game">
        <main id="gameContent">
            <div class="gameHeader">
                @yield('gameHeader')
            </div>
            <div class="gameOrders">
                @yield('order')
            </div>
            <div class="gameData">
                @yield('game')
            </div>
            <div class="gameItems">
                @yield('item')
            </div>
        </main> 
    </div>
</body>
</html>