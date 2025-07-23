<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserChangePasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $userChangePassword = User::findOrFail($id);
        return view('user.change-password.index', compact('userChangePassword'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ],[
            'old_password.required' => 'The current password field is required.',
            'new_password.required' => 'The new password field is required.',
            'new_password.confirmed' => 'The new password confirmation does not match.'
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {
            // toastr notification
            $notification = array (
                'message' => 'The current password is incorrect!',
                'alert-type' => 'error'
            );

            // redirect back
            return back()->with($notification);
        }

        $id = Auth::user()->id;
        $userChangePassword = User::findOrFail($id);

        // update new password
        $userChangePassword->update([
            'password' => Hash::make($request->new_password)
        ]);

        // toastr notification
        $notification = array (
            'message' => 'Password changed successfully!',
            'alert-type' => 'success'
        );

        // redirect back
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
