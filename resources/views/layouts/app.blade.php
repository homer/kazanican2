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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                window.Echo.channel('system-maintenance').listen('SystemMaintenanceEvent', (event) => {
                    let elContainer = document.getElementsByTagName('main')[0];

                    let div = document.createElement('div');
                    div.classList.add('max-w-7xl','mx-auto','mx-8','p-8','bg-white','border','shadow');
                    div.innerHTML = 'Warning: The system will go down for maintenance.';

                    elContainer.insertBefore(div, location.firstChild);
                });

                window.Echo.private('App.Models.User.' + {{ auth()->id() }}).listen('ExportFinishedEvent', (event) => {
                    console.log(event.user_id);
                })

                window.Echo.private('App.Models.User.' + {{ auth()->id() }}).listen('NewOrderEvent', (event) => {
                    let elContainer = document.getElementsByTagName('main')[0];

                    let div = document.createElement('div');
                    div.classList.add('max-w-7xl','mx-auto','mx-8','p-8','bg-white','border','shadow');
                    div.innerHTML = event.user_id + ' - Yeni Sipariş: ' + event.amount;

                    elContainer.insertBefore(div, location.firstChild);
                })
            });
        </script>
    </body>
</html>
