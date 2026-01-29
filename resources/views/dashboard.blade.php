<x-layouts.app title="Dashboard">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="space-y-8">
            <div>
                <h1 class="text-2xl font-bold">Welcome, {{ auth()->user()->name }}</h1>
                <p class="mt-1 text-zinc-600 dark:text-zinc-400">Manage your account</p>
            </div>

            <x-card :padding="false">

            </x-card>
        </div>
    </div>
</x-layouts.app>
