<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Passkeys Demo') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</head>
<body class="min-h-screen bg-zinc-50 text-zinc-900 dark:bg-zinc-900 dark:text-zinc-100 antialiased">
    <div class="min-h-screen flex flex-col">
        <nav class="border-b border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-950">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-14">
                    <div class="flex items-center">
                        <a href="/" class="text-lg font-semibold">Passkeys Demo</a>
                    </div>
                    <div class="flex items-center gap-4">
                        @auth
                            <span class="text-sm text-zinc-600 dark:text-zinc-400">{{ auth()->user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-button type="submit" variant="ghost" size="sm">Logout</x-button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100">Login</a>
                            <a href="{{ route('register') }}" class="text-sm font-medium text-zinc-900 dark:text-zinc-100 hover:underline">Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <main class="flex-1">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
