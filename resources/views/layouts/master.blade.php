<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>Laravel</title> 
    </head>
    <body class="mx-20"> 
        @yield('content')
    </body>
    <script src="{{ asset('js/app/spinner.js') }}"></script>
</html>
