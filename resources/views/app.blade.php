<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Custom CSS and Boostrap -->
        <link rel="icon" type="image/png" href="{{ config('r2.endpoint') }}/images/brands/logo.png'">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('css/argon.css?v=1.0.0') }}" rel="stylesheet">
        <!-- Finark CSS -->
        <link type="text/css" href="{{ asset('css/finark.css') }}" rel="stylesheet">

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js'])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
