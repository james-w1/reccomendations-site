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
    <body class="min-h-screen font-sans antialiased bg-slate-50 overflow-hidden">
        <div class="flex items-center justify-between border-b border-slate-400 shadow-md sticky top-0 bg-slate-200 h-10 w-full">
            <div>
                <h3
                    class="p-2 text-grey-600"
                >
                    <a
                        class="hover:text-blue-400"
                        href=""
                    >
                        <div class="flex items-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                            recommendMe
                        </div>
                    </a>
                    @yield('header')
                </h3>
            </div>
            <div>
                @if (Auth::user())
                    <a
                        class="p-2 text-grey-600 hover:text-blue-400"
                        href=""
                    >
                        {{ Auth::user()->name }}
                    </a>
                    <a
                        class="p-2 text-grey-600 hover:text-blue-400"
                        href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    >
                        log-out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
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

        <div class="">
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
