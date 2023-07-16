<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @livewireStyles
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>recommend - @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <!--@vite(['resources/css/app.css', 'resources/js/app.js'])-->
        @vite('resources/css/app.css')

    </head>
    <body class="min-h-screen font-sans antialiased bg-slate-50">
        <div class="flex items-center justify-between border-b border-slate-400 shadow-md sticky top-0 bg-slate-200 h-10 w-full">
            <div>
                <h3
                    class="p-2 text-grey-600"
                >
                    <a
                        class="hover:text-blue-400"
                        href=""
                    >
                        home
                    </a>
                    @yield('header')
                </h3>
            </div>
            <div>
                @if (Auth::user())
                    <a 
                        class="p-2 text-grey-600 hover:text-blue-400"
                        href="{{ route('profile.show', ['user'=>Auth::user()]) }}"
                    >
                        {{ Auth::user()->name }}
                    </a>
                @else
                    <a 
                        class="p-2 text-grey-600 hover:text-blue-400"
                        href="{{ route('login') }}"
                    >
                        login
                    </a>
                    <a 
                        class="p-2 text-grey-600 hover:text-blue-400"
                        href="{{ route('register') }}"
                    >
                        register
                    </a>
                @endif
            </div>
        </div>

        <div class="p-2">
            @yield('content')
            <!--
            <div class="w-screen bg-primary-200">
                <p>footer</p>
            </div>
            -->
        </div>
        @livewireScripts
    </body>
</html>
