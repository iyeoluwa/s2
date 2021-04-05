<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <title> @yield('title','AMSW - BLOGS')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" data-turbolinks-track href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" data-turbolinks-track type="text/css" href="{{asset('css/trix.css')}}"/>
        <link rel="stylesheet" data-turbolinks-track type="text/css" href="{{asset('css/licon.css')}}"/>
        <link rel="stylesheet" data-turbolinks-track type="text/css" href="{{asset('css/fontawesome.css')}}"/>
          <link rel="stylesheet" data-turbolinks-track type="text/css" href="{{asset('css/all.min.css')}}"/>
         <link rel="stylesheet" data-turbolinks-track type="text/css" href="{{asset('css/solid.min.css')}}"/>
        <link rel="stylesheet" data-turbolinks-track type="text/css" href="{{asset('css/link.css')}}"/>
        @section('tag')
            <meta property="og:site_name" content="A More Sure Word Blog" />
            <meta property="og:title" content="A More Sure Word Blog" />
            <meta property="og:description" content="Official Blog Of A MoreSureword" />
            <meta property="og:url" content="{{url()->full()}}" />
            <meta property="og:type" content="blog" />
            <meta property="og:image" content="{{asset('img/stencil.default(1).jpg')}}" />
            <meta property="twitter:card" content="summary_large_image" />
            <meta property="twitter:image" content="{{asset('img/stencil.default(1).jpg')}}" />
        @show

@livewireStyles
        <script src="{{ mix('js/app.js') }}" defer></script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.blog-navigation')

            <!-- Page Heading -->
            <header class="bg-white  mx-auto px-4 sm:px-6 lg:px-8">
                    {{ $header }}
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @livewireScripts
    </body>
 <!-- Scripts -->
     <script data-turbolinks-track src="{{asset('js/fontawesome.js')}}"></script>

</html>
