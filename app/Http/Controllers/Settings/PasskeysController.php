<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PasskeysController extends Controller
{
    /**
     * Show the user's passkeys settings page.
     */
    public function index(Request $request): Response
    {
        $passkeys = $request->user()->passkeys()
            ->select(['id', 'name', 'credential', 'created_at', 'last_used_at'])
            ->latest()
            ->get()
            ->map(fn ($passkey) => [
                'id' => $passkey->id,
                'name' => $passkey->name,
                'authenticator' => $passkey->authenticator,
                'created_at' => $passkey->created_at->toISOString(),
                'last_used_at' => $passkey->last_used_at?->toISOString(),
            ]);

        return Inertia::render('settings/passkeys', [
            'passkeys' => $passkeys,
        ]);
    }
}
