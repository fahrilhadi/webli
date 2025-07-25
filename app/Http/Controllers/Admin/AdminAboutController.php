<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminAboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminAboutDatas = About::latest()->get();
        return view('admin.about.index', compact('adminAboutDatas'));
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
        $adminAboutData = About::findOrFail($id);
        return view('admin.about.edit', compact('adminAboutData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048'
        ]);

        // get user by ID
        $id = Auth::user()->id;
        $adminAbout = About::findOrFail($id);

        // check if photo is uploaded
        if ($request->hasFile('image')) {

            // upload new image
            $image = $request->file('image');
            $image->storeAs('public/admin/about', $image->hashName());

            // delete old image
            Storage::delete('public/admin/about/'.$adminAbout->image);

            // update admin profile with new photo
            $adminAbout->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'description' => $request->description,
            ]);

        } else {

            // update admin about without photo
            $adminAbout->update([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'description' => $request->description,
            ]);
        }

        // toastr notification
        $notification = array (
            'message' => 'Updated Successfully!',
            'alert-type' => 'success'
        );

        // redirect back
        return redirect()->route('admin.about.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
