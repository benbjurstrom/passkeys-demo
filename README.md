# Laravel Passkeys Demo

This demo showcases first-party passkeys support in Laravel. It demonstrates passwordless authentication using WebAuthn and includes passkey registration, passwordless login, and autofill support.

This app uses both packages:

- [`@laravel/passkeys`](https://github.com/laravel/passkeys) - JavaScript client for WebAuthn browser APIs
- [`laravel/passkeys`](https://github.com/laravel/passkeys-server) - Server-side passkey authentication for Laravel

## Getting Started

Run the following to get started:

```bash
composer setup
```

**Note:** the passkey client requires an HTTPS connection. For local development you should use something like Laravel Herd. Make sure PASSKEY_RELYING_PARTY_ID matches your domain.

login with `test@example.com`/`123` to set your first passkey
