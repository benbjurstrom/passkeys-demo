@props([
    'type' => 'info',
])

@php
$types = [
    'info' => 'bg-blue-50 border-blue-200 text-blue-800 dark:bg-blue-950 dark:border-blue-800 dark:text-blue-200',
    'success' => 'bg-green-50 border-green-200 text-green-800 dark:bg-green-950 dark:border-green-800 dark:text-green-200',
    'warning' => 'bg-yellow-50 border-yellow-200 text-yellow-800 dark:bg-yellow-950 dark:border-yellow-800 dark:text-yellow-200',
    'error' => 'bg-red-50 border-red-200 text-red-800 dark:bg-red-950 dark:border-red-800 dark:text-red-200',
];
@endphp

<div {{ $attributes->merge(['class' => 'rounded-lg border p-4 text-sm ' . $types[$type]]) }}>
    {{ $slot }}
</div>
