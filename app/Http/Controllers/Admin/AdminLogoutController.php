<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminLogoutController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // toastr notification
        $notification = array (
            'message' => 'Logout berhasil!',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }
}
