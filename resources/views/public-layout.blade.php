<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME', '') }}@if (isset($pageTitle))
            - {{ $pageTitle }}
        @endif</title>
        @vite('resources/css/app.css')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playball&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->

    </head>
    <body>

        @yield('content')

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        <!-- <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="{{ mix('js/app.js') }}"></script> -->
        

    </body>
</html>
