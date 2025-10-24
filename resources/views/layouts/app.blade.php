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
        
        <!-- Added dark mode and glassmorphism styles -->
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
            
            .glass-light {
                background: rgba(30, 41, 59, 0.5);
                backdrop-filter: blur(8px);
                border: 1px solid rgba(148, 163, 184, 0.15);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="glass border-b border-slate-700/50 shadow-2xl">
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
    </body>
</html>
