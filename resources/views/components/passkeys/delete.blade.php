@props([
    'passkey',
])

<form method="POST" action="/user/passkeys/{{ $passkey->id }}" onsubmit="return confirm('Are you sure you want to remove this passkey?')">
    @csrf
    @method('DELETE')
    <x-button
        type="submit"
        variant="ghost"
        size="sm"
        class="text-red-600 hover:text-red-700 hover:bg-red-50 dark:text-red-400 dark:hover:bg-red-950"
    >
        Remove
    </x-button>
</form>
