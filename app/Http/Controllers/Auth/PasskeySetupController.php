<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PasskeySetupController extends Controller
{
    public function show(Request $request, User $user): View|RedirectResponse
    {
        Auth::login($user);

        if (! $user->hasVerifiedEmail()) {
            $user->forceFill(['email_verified_at' => now()])->save();
        }

        return view('auth.passkey-setup', [
            'user' => $user,
            'passkeyName' => $this->generatePasskeyName($request),
        ]);
    }

    protected function generatePasskeyName(Request $request): string
    {
        $userAgent = $request->userAgent() ?? '';

        if (str_contains($userAgent, 'iPhone')) {
            return 'iPhone';
        }
        if (str_contains($userAgent, 'iPad')) {
            return 'iPad';
        }
        if (str_contains($userAgent, 'Mac')) {
            return 'Mac';
        }
        if (str_contains($userAgent, 'Windows')) {
            return 'Windows PC';
        }
        if (str_contains($userAgent, 'Android')) {
            return 'Android';
        }

        return 'My Passkey';
    }
}
