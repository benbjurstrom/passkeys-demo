@props([
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
    'disabled' => false,
])

@php
$baseClasses = 'inline-flex items-center justify-center font-medium rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed';

$variants = [
    'primary' => 'bg-zinc-900 text-white hover:bg-zinc-800 focus:ring-zinc-900 dark:bg-zinc-100 dark:text-zinc-900 dark:hover:bg-zinc-200 dark:focus:ring-zinc-100',
    'secondary' => 'bg-zinc-100 text-zinc-900 hover:bg-zinc-200 focus:ring-zinc-500 dark:bg-zinc-800 dark:text-zinc-100 dark:hover:bg-zinc-700',
    'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-600',
    'ghost' => 'text-zinc-600 hover:text-zinc-900 hover:bg-zinc-100 focus:ring-zinc-500 dark:text-zinc-400 dark:hover:text-zinc-100 dark:hover:bg-zinc-800',
    'outline' => 'border border-zinc-300 text-zinc-700 hover:bg-zinc-50 focus:ring-zinc-500 dark:border-zinc-700 dark:text-zinc-300 dark:hover:bg-zinc-800',
];

$sizes = [
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-4 py-2 text-sm',
    'lg' => 'px-6 py-3 text-base',
];

$classes = $baseClasses . ' ' . $variants[$variant] . ' ' . $sizes[$size];
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => $classes]) }}
    @if($disabled) disabled @endif
>
    {{ $slot }}
</button>
