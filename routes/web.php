<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewDeviceController;
use App\Http\Controllers\Auth\PasskeySetupController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::get('register/sent', fn () => view('auth.email-sent'))->name('register.sent');

    Route::get('verify/{user}/passkey', [PasskeySetupController::class, 'show'])
        ->name('verification.passkey-setup')
        ->middleware('signed');

    Route::get('new-device', [NewDeviceController::class, 'create'])->name('new-device');
    Route::post('new-device', [NewDeviceController::class, 'store']);
    Route::get('new-device/sent', fn () => view('auth.email-sent'))->name('new-device.sent');

    Route::get('new-device/{user}/passkey', [PasskeySetupController::class, 'show'])
        ->name('new-device.passkey-setup')
        ->middleware('signed');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
