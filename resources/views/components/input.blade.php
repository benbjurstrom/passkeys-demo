@props([
    'type' => 'text',
    'disabled' => false,
])

<input
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm text-zinc-900 placeholder-zinc-500 focus:border-zinc-500 focus:outline-none focus:ring-1 focus:ring-zinc-500 disabled:cursor-not-allowed disabled:bg-zinc-100 disabled:opacity-50 dark:border-zinc-700 dark:bg-zinc-900 dark:text-zinc-100 dark:placeholder-zinc-400 dark:focus:border-zinc-500'
    ]) }}
    @if($disabled) disabled @endif
/>
