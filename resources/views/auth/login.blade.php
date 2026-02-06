<x-layouts.app title="Login">
    <div class="flex min-h-[calc(100vh-3.5rem)] items-center justify-center px-4 py-12">
        <div class="w-full max-w-sm space-y-6">
            <div class="text-center">
                <h1 class="text-2xl font-bold">Welcome back</h1>
                <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">Sign in to your account</p>
            </div>

            @if (session('status'))
                <div class="rounded-lg bg-green-50 dark:bg-green-900/20 p-4 text-sm text-green-700 dark:text-green-400">
                    {{ session('status') }}
                </div>
            @endif

            <x-card>
                <div class="space-y-6">
                    <x-passkeys.verify :redirect="route('dashboard')" />
                </div>

                <p class="mt-4 text-center text-sm text-zinc-600 dark:text-zinc-400">
                    <a href="{{ route('new-device') }}" class="font-medium text-zinc-900 dark:text-zinc-100 hover:underline">
                        Can't access your passkey?
                    </a>
                </p>

                <p class="mt-4 text-center text-sm text-zinc-600 dark:text-zinc-400">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="font-medium text-zinc-900 dark:text-zinc-100 hover:underline">
                        Register
                    </a>
                </p>
            </x-card>
        </div>
    </div>
</x-layouts.app>
