<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/drag-arrange.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
        <link rel="stylesheet" href="{{ asset('vendor/icomoon-v1.0/style.css') }}?v1">
        @livewireStyles

        <!-- Scripts -->

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased font-inter">
        <div class="min-h-screen bg-slate-50">

            @include('layouts.menu')

            <main class="pl-56">
                {{ $slot }}
            </main>


        </div>

        @livewireScripts
        @stack('js')
    </body>
</html>
