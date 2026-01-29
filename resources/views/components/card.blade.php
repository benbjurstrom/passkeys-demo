@props(['padding' => true])

<div {{ $attributes->merge(['class' => 'bg-white dark:bg-zinc-950 border border-zinc-200 dark:border-zinc-800 rounded-xl shadow-sm' . ($padding ? ' p-6' : '')]) }}>
    {{ $slot }}
</div>
