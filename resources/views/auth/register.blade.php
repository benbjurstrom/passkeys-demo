<x-layouts.app title="Register">
    <div class="flex min-h-[calc(100vh-3.5rem)] items-center justify-center px-4 py-12">
        <div class="w-full max-w-sm space-y-6">
            <div class="text-center">
                <h1 class="text-2xl font-bold">Create an account</h1>
                <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">
                    Register with your email to get started
                </p>
            </div>

            <x-card>
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <div class="space-y-2">
                        <x-label for="name" :required="true">Name</x-label>
                        <x-input
                            type="text"
                            id="name"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                        />
                        @error('name')
                            <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <x-label for="email" :required="true">Email</x-label>
                        <x-input
                            type="email"
                            id="email"
                            name="email"
                            :value="old('email')"
                            required
                            autocomplete="email"
                        />
                        @error('email')
                            <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-button type="submit" class="w-full">Continue</x-button>
                </form>

                <p class="mt-4 text-center text-sm text-zinc-600 dark:text-zinc-400">
                    Already have an account?
                    <a href="{{ route('login') }}" class="font-medium text-zinc-900 dark:text-zinc-100 hover:underline">
                        Sign in
                    </a>
                </p>
            </x-card>
        </div>
    </div>
</x-layouts.app>
