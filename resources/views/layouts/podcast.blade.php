<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>AMSW | @yield('title','podcasts')</title>

        <!-- Fonts -->
        <link rel="stylesheet" data-turbolinks-track href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" data-turbolinks-track href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" type="text/css" data-turbolinks-track href="{{asset('css/trix.css')}}"/>
        <link rel="stylesheet" type="text/css" data-turbolinks-track href="{{asset('css/licon.css')}}"/>

@livewireStyles

 <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen " style="background: #101820;">
            @include('layouts.podcast-navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow   hidden overflow-hidden">
                <div class="flex flex-col flex-wrap border-r border-gray-100">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>

                {{ $slot }}

            </main>
        </div>

        <x-podcast-player  />

    @livewireScripts
    </body>
 <!-- Scripts -->

 <script data-turbolinks-track src="{{asset('js/src/howler.core.js')}}"></script>
</html>
