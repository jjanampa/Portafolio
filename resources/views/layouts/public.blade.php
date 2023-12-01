<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('dark_mode') ? 'dark' : '' }} {{ session('color_scheme') != 'default' ? ' ' . session('color_scheme') : '' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}  {{ isset($title) ? '|' . $title :  '' }}</title>

        @yield('head')

        <!-- Scripts -->
        @vite(['resources/css/public.css', 'resources/js/public.js'])

        <!-- BEGIN: CSS Assets-->
        @livewireStyles
        @stack('styles')
        <!-- END: CSS Assets-->
    </head>
    <body >
        <div class="content-wrapper">

            <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                        <x-application-mark class="h-8 w-8" />
                        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{ config('app.name') }}</span>
                    </a>
                    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

                        @if (Route::has('login'))
                            <div class="">
                                @auth
                                    <a href="{{ route('dashboard') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>

                </div>
            </nav>
            <!-- /header -->
            <div class="mt-24 mb-24">
                {{ $slot }}
            </div>

        </div>

        @livewireScripts

        <!-- BEGIN: Vendor JS Assets-->
        @stack('vendors')
        <!-- END: Vendor JS Assets-->

        <!-- BEGIN: Pages, layouts, components JS Assets-->
        @stack('scripts')
        <!-- END: Pages, layouts, components JS Assets-->
    </body>
</html>
