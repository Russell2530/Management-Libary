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
        
        <!-- Dark mode and glassmorphism styles -->
        <style>
            :root {
                color-scheme: dark;
            }
            
            body {
                background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
                background-attachment: fixed;
            }
            
            .glass {
                background: rgba(15, 23, 42, 0.7);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(148, 163, 184, 0.1);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            {{-- <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-white" />
                </a>
            </div> --}}

            <!-- Updated guest layout with glassmorphism and dark theme -->
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 glass rounded-2xl overflow-hidden sm:rounded-2xl shadow-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
