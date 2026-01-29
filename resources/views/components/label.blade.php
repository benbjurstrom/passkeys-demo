@props(['required' => false])

<label {{ $attributes->merge(['class' => 'block text-sm font-medium text-zinc-700 dark:text-zinc-300']) }}>
    {{ $slot }}
    @if($required)
        <span class="text-red-500">*</span>
    @endif
</label>
