<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Easy Timer</title>

    <!-- Fonts -->
    <link href="/css/app.css" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <style>

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">
        @section('content')
            <div class="title m-b-md">
                Easy Timer
            </div>

            <div class="links">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/imprint') }}">Imprint</a>
            </div>
        @show
    </div>
</div>
</body>
</html>
