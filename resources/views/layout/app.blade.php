<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ToDo APP</title>

        <!-- Styles -->
        @if (Route::is('login') || Route::is('register'))
            <link rel="stylesheet" href="/css/auth.css">
        @else
            <link rel="stylesheet" href="/css/todo.css">
        @endif

        <!-- Fonts -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Sans+HK&amp;display=swap">
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono">
    </head>
    <body>

        @yield('content')
        
        <!-- Scripts -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script> -->
        <script src="/js/vue.local.js"></script>
        <script src="/js/script.js"></script>
    </body>
</html>
