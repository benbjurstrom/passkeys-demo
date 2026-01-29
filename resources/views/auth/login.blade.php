<x-layouts.app title="Login">
    <div class="flex min-h-[calc(100vh-3.5rem)] items-center justify-center px-4 py-12">
        <div class="w-full max-w-sm space-y-6">
            <div class="text-center">
                <h1 class="text-2xl font-bold">Welcome back</h1>
                <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">Sign in to your account</p>
            </div>

            <x-card>
                <div class="space-y-6">
                    <x-passkeys.verify :redirect="route('dashboard')" />

                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-zinc-200 dark:border-zinc-800"></div>
                        </div>    <div class="relative flex justify-center text-xs uppercase">
                            <span class="bg-white dark:bg-zinc-950 px-2 text-zinc-500">Or continue with</span>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf

                        <div class="space-y-2">
                            <x-label for="email" :required="true">Email</x-label>
                            <x-input
                                type="email"
                                id="email"
                                name="email"
                                :value="old('email')"
                                required
                                autofocus
                                autocomplete="username webauthn"
                            />
                            @error('email')
                                <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <x-label for="password" :required="true">Password</x-label>
                            <x-input
                                type="password"
                                id="password"
                                name="password"
                                required
                                autocomplete="current-password"
                            />
                            @error('password')
                                <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <label class="flex items-center gap-2">
                                <input type="checkbox" name="remember" class="rounded border-zinc-300 dark:border-zinc-700">
                                <span class="text-sm text-zinc-600 dark:text-zinc-400">Remember me</span>
                            </label>
                        </div>

                        <x-button type="submit" class="w-full">Sign in</x-button>
                    </form>
                </div>
            </x-card>
        </div>
    </div>
</x-layouts.app>
