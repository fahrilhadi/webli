<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        // return view('auth.login');
        return redirect('/');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            $request->authenticate();
        } catch (ValidationException $e) {
            // Gabungkan semua pesan error menjadi satu array
            session()->flash('toastr_errors_login', collect($e->errors())->flatten()->all());
            return back()->withInput();
        }        

        $request->session()->regenerate();

        $url = '';
        if ($request->user()->role === 'admin') {
            $url = 'admin/dashboard';
        } elseif ($request->user()->role === 'user') {
            $url = '/dashboard';
        }

        // toastr notification
        $notification = [
            'message' => 'Login successfully!',
            'alert-type' => 'success'
        ];

        return redirect()->intended($url)->with($notification);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
