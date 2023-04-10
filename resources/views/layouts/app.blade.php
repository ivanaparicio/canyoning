<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta name="keywords" content="Canyoning san gil santander, deportes extremos san gil santander, canotaje san gil santander, desportes extremos santander, deportes de aventura san gil santander">
        <meta name="geo.position" content="6.552436;-73.131748 ">
        <meta name="geo.region" content="CO-SAN">
        <meta name="geo.placename" content="San Gil">
        <meta property="og:title" content="Deportes Extremos en San Gil Santander Canyoning">
        <meta property="og:description" content="Deportes extremos en San Gil Santander para llegar al límite: Parapente, Rafting, Torrentismo y mucho más. Consulta nuestros planes ☎ 3232253868">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('vendor/icomoon-v1.0/style.css') }}?v1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="{{ asset('vendor/icomoon-v1.0/style.css') }}?v1">
        @livewireStyles

        <!-- Scripts -->

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('vendor/flex-slider/jquery.flexslider-min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-inter antialiased bg-white text-slate-800" >
        <div class="min-h-screen bg-no-repeat bg-contain bg-fixed" style="background-image: url('{{ Storage::url('images/app/rapel.png') }}')">

            @include('layouts.navigation')            
            
            <main class="{{ request()->routeIs('home') ? '' : 'pt-16' }}">
                {{ $slot }}
            </main>

            @include('footer')

        </div>

        @livewireScripts
        @stack('js')
    </body>
</html>
