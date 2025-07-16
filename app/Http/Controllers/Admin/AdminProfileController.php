<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $adminProfile = User::findOrFail($id);
        return view('admin.profile.index', compact('adminProfile'));
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
            'name' => 'required',
            'email' => 'required|email:users',
            'photo' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        // get user by ID
        $id = Auth::user()->id;
        $adminProfile = User::findOrFail($id);

        // check if photo is uploaded
        if ($request->hasFile('photo')) {

            // upload new photo
            $photo = $request->file('photo');
            $photo->storeAs('public/admin/profile', $photo->hashName());

            // delete old photo
            Storage::delete('public/admin/profile/'.$adminProfile->photo);

            // update admin profile with new photo
            $adminProfile->update([
                'photo' => $photo->hashName(),
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'occupation' => $request->occupation,
                'website' => $request->website,
            ]);

        } else {

            // update admin profile without photo
            $adminProfile->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'occupation' => $request->occupation,
                'website' => $request->website,
            ]);
        }

        // toastr notification
        $notification = array (
            'message' => 'Profile Updated Successfully!',
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
