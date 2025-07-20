<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create()
    {
        // return view('auth.forgot-password');
        return redirect('/');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
        ]);

        if ($validator->fails()) {
            // Flash semua error sebagai toastr_errors
            session()->flash('toastr_errors_recovery', $validator->errors()->all());
            return back()->withInput();
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            session()->flash('message_recovery', 'Password reset link has been sent to your email.');
            session()->flash('alert-type', 'success');
            return back();
        } else {
            session()->flash('toastr_errors_recovery', [__($status)]);
            return back()->withInput();
        }
    }
}
