<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Notifications\SetupPasskeyNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        // Delete any existing unverified user with this email
        User::query()
            ->where('email', $request->email)
            ->whereNull('email_verified_at')
            ->delete();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'verification.passkey-setup',
            now()->addMinutes(60),
            ['user' => $user->id]
        );

        $user->notify(new SetupPasskeyNotification($verificationUrl, 'Complete Your Registration'));

        return redirect()->route('register.sent')->with([
            'email' => $user->email,
            'tryAgainRoute' => route('register'),
        ]);
    }
}
