<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\NewDeviceRequest;
use App\Models\User;
use App\Notifications\SetupPasskeyNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class NewDeviceController extends Controller
{
    public function create(): View
    {
        return view('auth.new-device');
    }

    public function store(NewDeviceRequest $request): RedirectResponse
    {
        $user = User::query()
            ->where('email', $request->email)
            ->whereNotNull('email_verified_at')
            ->first();

        if ($user) {
            $setupUrl = URL::temporarySignedRoute(
                'new-device.passkey-setup',
                now()->addMinutes(60),
                ['user' => $user->id]
            );

            $user->notify(new SetupPasskeyNotification($setupUrl, 'Set Up a New Passkey'));
        }

        return redirect()->route('new-device.sent')->with([
            'email' => $request->email,
            'tryAgainRoute' => route('new-device'),
        ]);
    }
}
