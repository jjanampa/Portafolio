<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('dark_mode') ? 'dark' : '' }} {{ session('color_scheme') != 'default' ? ' ' . session('color_scheme') : '' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}  {{ isset($title) ? '|' . $title :  '' }}</title>

        @yield('head')

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- BEGIN: CSS Assets-->
        @livewireStyles
        @stack('styles')
        <!-- END: CSS Assets-->
    </head>
    <body class="bg-gray-50 dark:bg-gray-800">
        @include('layouts.partials.header')
        <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">

            @include('layouts.partials.sidebar')

            <div id="main-content">
                <main>
                    <div class="px-4 pt-6">
                        @include('layouts.partials._breadcrumb')
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
        @livewireScripts

        <!-- BEGIN: Vendor JS Assets-->
        @stack('vendors')
        <!-- END: Vendor JS Assets-->

        <!-- BEGIN: Pages, layouts, components JS Assets-->
        @stack('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                window.addEventListener('closeModal', event => {
                    let modals = FlowbiteInstances.getInstances('Modal');
                    Object.values(modals).forEach(modal => modal.hide());
                })
            });
        </script>
        <!-- END: Pages, layouts, components JS Assets-->
    </body>
</html>
