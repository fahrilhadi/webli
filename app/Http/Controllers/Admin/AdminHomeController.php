<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminHomeDatas = Home::latest()->get();
        return view('admin.home.index', compact('adminHomeDatas'));
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
        $adminHomeData = Home::findOrFail($id);
        return view('admin.home.edit', compact('adminHomeData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
        ]);

        // Temukan adminHomeData berdasarkan ID
        $adminHomeData = Home::findOrFail($id);

        // Data untuk diupdate
        $adminHomeData->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
        ]);

        // toastr notification
        $notification = array (
            'message' => 'Updated Successfully!',
            'alert-type' => 'success'
        );

        // redirect back
        return redirect()->route('admin.home.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
