<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Unique;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                $this->uniqueVerifiedEmail(),
            ],
        ];
    }

    /**
     * Email must be unique among verified users only.
     * Unverified users can be overwritten (allows re-registration).
     */
    protected function uniqueVerifiedEmail(): Unique
    {
        return (new Unique('users', 'email'))
            ->whereNotNull('email_verified_at');
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.unique' => 'An account with this email already exists.',
        ];
    }
}
