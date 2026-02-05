@props([
    'redirect' => '/dashboard',
])

<div {{ $attributes }}>
    <x-button
        type="button"
        id="passkey-login-btn"
        class="w-full gap-2"
        variant="secondary"
    >
        <svg id="passkey-icon" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M15 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"/>
            <path d="M5 21v-2a4 4 0 0 1 4-4h2"/>
            <path d="m16 19 2 2 4-4"/>
        </svg>
        <svg id="passkey-spinner" class="hidden h-5 w-5 animate-spin" viewBox="0 0 24 24" fill="none">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <span id="passkey-btn-text">Sign in with passkey</span>
    </x-button>

    <p id="passkey-error" class="mt-2 hidden text-sm text-red-600 dark:text-red-400"></p>
</div>

@push('scripts')
<script type="module">
    const button = document.getElementById('passkey-login-btn');
    const buttonText = document.getElementById('passkey-btn-text');

    // Check browser support
    if (!Passkeys.isSupported()) {
        button.disabled = true;
        buttonText.textContent = 'Passkeys not supported';
    }

    // Handle button click
    button.addEventListener('click', async () => {
        setLoading();

        try {
            await Passkeys.verify();
            window.location.href = @json($redirect);
        } catch (error) {
            showError(error.message || 'Authentication failed');
        }
    });

    // Enable passkey autofill
    Passkeys.autofill()
        .then((result) => {
            if (result?.verified) {
                window.location.href = @json($redirect);
            }
        })
        .catch((error) => showError(error.message || 'Authentication failed'));

    // UI helpers
    const errorEl = document.getElementById('passkey-error');
    const icon = document.getElementById('passkey-icon');
    const spinner = document.getElementById('passkey-spinner');

    function setLoading() {
        errorEl.classList.add('hidden');
        button.disabled = true;
        icon.classList.add('hidden');
        spinner.classList.remove('hidden');
        buttonText.textContent = 'Authenticating...';
    }

    function showError(message) {
        errorEl.textContent = message;
        errorEl.classList.remove('hidden');
        button.disabled = false;
        icon.classList.remove('hidden');
        spinner.classList.add('hidden');
        buttonText.textContent = 'Sign in with passkey';
    }
</script>
@endpush
