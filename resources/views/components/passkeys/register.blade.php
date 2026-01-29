@props([
    'onSuccess' => 'window.location.reload()',
])

<x-button type="button" id="passkey-add-btn" {{ $attributes->merge(['class' => 'gap-2']) }}>
    <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M12 5v14M5 12h14"/>
    </svg>
    Add passkey
</x-button>

<form id="passkey-add-form" class="hidden mt-6 p-4 rounded-lg border border-zinc-200 dark:border-zinc-800 bg-zinc-50 dark:bg-zinc-900">
    <div class="space-y-4">
        <div class="space-y-2">
            <x-label for="passkey-name" :required="true">Passkey name</x-label>
            <x-input
                type="text"
                id="passkey-name"
                placeholder="e.g., MacBook Pro, iPhone"
            />
            <p class="text-xs text-zinc-500 dark:text-zinc-400">
                Give this passkey a name to help you identify it later
            </p>
        </div>
        <div class="flex gap-2">
            <x-button type="submit" id="passkey-register-btn">
                Register passkey
            </x-button>
            <x-button type="button" id="passkey-cancel-btn" variant="ghost">
                Cancel
            </x-button>
        </div>
        <p id="passkey-register-error" class="hidden text-sm text-red-600 dark:text-red-400"></p>
    </div>
</form>

@push('scripts')
<script type="module">
    const addBtn = document.getElementById('passkey-add-btn');
    const registerBtn = document.getElementById('passkey-register-btn');
    const nameInput = document.getElementById('passkey-name');

    // Check browser support
    if (!Passkeys.isSupported()) {
        addBtn.disabled = true;
        addBtn.textContent = 'Passkeys not supported';
    }

    // Show/hide form
    addBtn.addEventListener('click', showForm);
    document.getElementById('passkey-cancel-btn').addEventListener('click', hideForm);

    // UI helpers
    const form = document.getElementById('passkey-add-form');

    // Register passkey
    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const name = nameInput.value.trim();

        if (!name) {
            showError('Please enter a name for your passkey');
            return;
        }

        setLoading();

        try {
            await Passkeys.register({ name });
            {!! $onSuccess !!};
        } catch (error) {
            showError(error.message || 'Failed to register passkey');
        }
    });
    const errorEl = document.getElementById('passkey-register-error');

    function showForm() {
        form.classList.remove('hidden');
        nameInput.focus();
        errorEl.classList.add('hidden');
    }

    function hideForm() {
        form.classList.add('hidden');
        nameInput.value = '';
        errorEl.classList.add('hidden');
    }

    function setLoading() {
        errorEl.classList.add('hidden');
        registerBtn.disabled = true;
        registerBtn.textContent = 'Registering...';
    }

    function showError(message) {
        errorEl.textContent = message;
        errorEl.classList.remove('hidden');
        registerBtn.disabled = false;
        registerBtn.textContent = 'Register passkey';
    }
</script>
@endpush
