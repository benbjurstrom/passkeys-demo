<x-layouts.app title="Set Up Passkey">
    <div class="flex min-h-[calc(100vh-3.5rem)] items-center justify-center px-4 py-12">
        <div class="w-full max-w-sm space-y-6">
            <div class="text-center">
                <div class="mx-auto mb-4 flex h-12 w-12 items-center justify-center rounded-full bg-zinc-100 dark:bg-zinc-800">
                    <svg class="h-6 w-6 text-zinc-600 dark:text-zinc-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M15 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/>
                        <path d="M5 21v-2a4 4 0 0 1 4-4h2"/>
                        <path d="m16 19 2 2 4-4"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-bold">Set up your passkey</h1>
                <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">
                    Welcome, {{ $user->name }}! Create a passkey to securely sign in without a password.
                </p>
            </div>

            <x-card>
                <div class="space-y-6">
                    <div class="space-y-2">
                        <x-label for="passkey-name">Passkey name</x-label>
                        <x-input
                            type="text"
                            id="passkey-name"
                            :value="$passkeyName"
                            placeholder="e.g., MacBook Pro, iPhone"
                        />
                        <p class="text-xs text-zinc-500 dark:text-zinc-400">
                            Give this passkey a name to help you identify it later
                        </p>
                    </div>

                    <x-button type="button" id="passkey-setup-btn" class="w-full gap-2">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M15 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/>
                            <path d="M5 21v-2a4 4 0 0 1 4-4h2"/>
                            <path d="m16 19 2 2 4-4"/>
                        </svg>
                        <span id="passkey-btn-text">Create passkey</span>
                    </x-button>

                    <p id="passkey-error" class="hidden text-sm text-red-600 dark:text-red-400"></p>
                </div>
            </x-card>
        </div>
    </div>

    @push('scripts')
    <script type="module">
        const button = document.getElementById('passkey-setup-btn');
        const buttonText = document.getElementById('passkey-btn-text');
        const nameInput = document.getElementById('passkey-name');
        const errorEl = document.getElementById('passkey-error');

        if (!Passkeys.isSupported()) {
            button.disabled = true;
            buttonText.textContent = 'Passkeys not supported';
        }

        button.addEventListener('click', async () => {
            const name = nameInput.value.trim() || @json($passkeyName);

            setLoading();

            try {
                await Passkeys.register({ name });
                window.location.href = @json(route('dashboard'));
            } catch (error) {
                showError(error.message || 'Failed to create passkey');
            }
        });

        function setLoading() {
            errorEl.classList.add('hidden');
            button.disabled = true;
            buttonText.textContent = 'Creating passkey...';
        }

        function showError(message) {
            errorEl.textContent = message;
            errorEl.classList.remove('hidden');
            button.disabled = false;
            buttonText.textContent = 'Create passkey';
        }
    </script>
    @endpush
</x-layouts.app>
