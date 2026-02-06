<x-layouts.app title="Check Your Email">
    <div class="flex min-h-[calc(100vh-3.5rem)] items-center justify-center px-4 py-12">
        <div class="w-full max-w-sm space-y-6">
            <div class="text-center">
                <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-green-100 dark:bg-green-900">
                    <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h1 class="text-2xl font-bold">Check your email</h1>
                <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">
                    We've sent a passkey setup link to
                    <span class="font-medium text-zinc-900 dark:text-zinc-100">{{ session('email') }}</span>
                </p>
            </div>

            <x-card>
                <div class="space-y-4 text-sm text-zinc-600 dark:text-zinc-400">
                    <p>Click the link in the email to set up your passkey.</p>
                    <p>The link expires in 60 minutes.</p>
                </div>
            </x-card>

            <p class="text-center text-sm text-zinc-600 dark:text-zinc-400">
                Didn't receive an email?
                <a href="{{ session('tryAgainRoute', route('register')) }}" class="font-medium text-zinc-900 dark:text-zinc-100 hover:underline">
                    Try again
                </a>
            </p>
        </div>
    </div>
</x-layouts.app>
