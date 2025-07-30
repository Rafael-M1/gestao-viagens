<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="flex min-h-screen">
            <aside class="w-64 bg-white border-r shadow-md">
                <div class="p-6">
                    <h1 class="text-xl font-bold text-gray-800 mb-6">Painel</h1>
                    <nav class="space-y-4">
                        <a href="/dashboard" class="block text-gray-700 hover:text-blue-600">Dashboard</a>
                        <a href="/profile" class="block text-gray-700 hover:text-blue-600">Perfil</a>
                        <a href="/vehicles" class="block text-gray-700 hover:text-blue-600">Veículos</a>
                        <a href="/brands" class="block text-gray-700 hover:text-blue-600">Marcas</a>
                        <a href="/vehicle-models" class="block text-gray-700 hover:text-blue-600">Modelos</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a :href="route('logout')"
                                class="block text-gray-700 hover:text-blue-600 cursor-pointer"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out System') }}
                            </a>
                        </form>
                    </nav>
                </div>
            </aside>
            <div class="flex-1">
                <div class="sm:px-6 lg:px-8 py-1">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
