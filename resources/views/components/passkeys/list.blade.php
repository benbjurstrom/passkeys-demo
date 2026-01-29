@props(['passkeys'])

<div class="divide-y divide-zinc-200 dark:divide-zinc-800">
    @forelse($passkeys as $passkey)
        <div class="p-6 flex items-center justify-between group">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-zinc-100 to-zinc-200 dark:from-zinc-800 dark:to-zinc-900 rounded-xl flex items-center justify-center shadow-sm ring-1 ring-zinc-200/50 dark:ring-zinc-700/50">
                    <svg class="h-5 w-5 text-zinc-600 dark:text-zinc-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"/>
                        <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"/>
                    </svg>
                </div>
                <div class="space-y-1">
                    <div class="flex items-center gap-2.5">
                        <p class="font-medium tracking-tight">{{ $passkey->name }}</p>
                        @if($passkey->authenticator)
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[11px] font-medium tracking-wide uppercase rounded-md bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-400 ring-1 ring-inset ring-zinc-200 dark:ring-zinc-700">
                                {{ $passkey->authenticator }}
                            </span>
                        @endif
                    </div>
                    <p class="text-sm text-zinc-500 dark:text-zinc-400">
                        Added {{ $passkey->created_at->diffForHumans() }}
                        @if($passkey->last_used_at)
                            <span class="mx-1 text-zinc-300 dark:text-zinc-600">/</span>
                            Last used {{ $passkey->last_used_at->diffForHumans() }}
                        @endif
                    </p>
                </div>
            </div>
            <x-passkeys.delete :passkey="$passkey" />
        </div>
    @empty
        <div class="p-8 text-center">
            <div class="mx-auto w-14 h-14 bg-gradient-to-br from-zinc-100 to-zinc-200 dark:from-zinc-800 dark:to-zinc-900 rounded-2xl flex items-center justify-center mb-4 shadow-sm ring-1 ring-zinc-200/50 dark:ring-zinc-700/50">
                <svg class="h-7 w-7 text-zinc-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"/>
                    <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"/>
                </svg>
            </div>
            <p class="font-medium text-zinc-700 dark:text-zinc-300">No passkeys yet</p>
            <p class="text-sm text-zinc-500 dark:text-zinc-500 mt-1">
                Add a passkey to sign in without a password
            </p>
        </div>
    @endforelse
</div>
