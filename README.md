# Laravel Passkeys Demo

This demo showcases first-party passkeys support in Laravel. It demonstrates passwordless registration, passkey login with autofill, and adding a passkey on a new device.

This app uses both packages:

- [`@laravel/passkeys`](https://github.com/laravel/passkeys) - JavaScript client for WebAuthn browser APIs
- [`laravel/passkeys`](https://github.com/laravel/passkeys-server) - Server-side passkey authentication for Laravel

## Getting Started

```bash
composer setup
```

**Note:** the passkey client requires an HTTPS connection. For local development you should use something like Laravel Herd. Make sure PASSKEY_RELYING_PARTY_ID matches your domain.
