<?php

namespace App\Http\Requests\Auth;

use Illuminate\Support\Str;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash as FacadesHash;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    /**
     * Custom error messages.
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email.',
            'password.required' => 'Password is required.',
        ];
    }

    /**
     * Custom validation error response for toast
     */
    protected function failedValidation(Validator $validator)
    {
        session()->flash('toastr_errors_login', $validator->errors()->all());

        throw new HttpResponseException(
            redirect()->back()->withInput()
        );
    }

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        // Cek apakah sudah melebihi batas percobaan
        $this->ensureIsNotRateLimited();

        $email = $this->input('email');
        $password = $this->input('password');

        $user = \App\Models\User::where('email', $email)->first();

        if (! $user) {
            RateLimiter::hit($this->throttleKey());

            $attempts = RateLimiter::attempts($this->throttleKey());
            $remaining = max(0, 5 - $attempts);

            if ($attempts >= 5) {
                throw ValidationException::withMessages([
                    'email' => 'Too many login attempts. Please reset your password.',
                ])->redirectTo(route('password.request'));
            }

            $message = 'We couldn’t find an account with that email address.';
            if ($attempts >= 2) {
                $message .= " You have $remaining attempts left.";
            }

            throw ValidationException::withMessages([
                'email' => $message,
            ]);
        }

        if (! FacadesHash::check($password, $user->password)) {
            RateLimiter::hit($this->throttleKey());

            $attempts = RateLimiter::attempts($this->throttleKey());
            $remaining = max(0, 5 - $attempts);

            if ($attempts >= 5) {
                throw ValidationException::withMessages([
                    'password' => 'Too many login attempts. Please reset your password.',
                ])->redirectTo(route('password.request'));
            }

            $message = 'The password you entered is incorrect.';
            if ($attempts >= 2) {
                $message .= " You have $remaining attempts left.";
            }

            throw ValidationException::withMessages([
                'password' => $message,
            ]);
        }

        // Lolos validasi: login
        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'email' => 'Login failed. Please try again.',
            ]);
        }

        // Login sukses, reset hit counter
        RateLimiter::clear($this->throttleKey());
    }


    /**
     * Ensure the login request is not rate limited.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
