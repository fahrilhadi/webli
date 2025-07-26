<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminFeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminFeatureDatas = Feature::latest()->get();
        return view('admin.feature.index', compact('adminFeatureDatas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form
        $request->validate([
            'content_title' => 'required',
            'content_subtitle' => 'required',
        ]);

        Feature::create([
            'content_title' => $request->content_title,
            'content_subtitle' => $request->content_subtitle,
        ]);

        // toastr notification
        $notification = array (
            'message' => 'Created Successfully!',
            'alert-type' => 'success'
        );

        // redirect back
        return redirect()->route('admin.features.index')->with($notification);
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
        $adminFeatureData = Feature::findOrFail($id);
        return view('admin.feature.edit', compact('adminFeatureData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $request->validate([
            'content_title' => 'required',
            'content_subtitle' => 'required',
        ]);

        // get user by ID
        $id = Auth::user()->id;
        $adminFeature = Feature::findOrFail($id);

        $adminFeature->update([
                'content_title' => $request->content_title,
                'content_subtitle' => $request->content_subtitle,
            ]);

        // toastr notification
        $notification = array (
            'message' => 'Updated Successfully!',
            'alert-type' => 'success'
        );

        // redirect back
        return redirect()->route('admin.features.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get feature by ID
        $feature = Feature::findOrFail($id);

        //delete feature
        $feature->delete();

        // toastr notification
        $notification = array (
            'message' => 'Deleted Successfully!',
            'alert-type' => 'success'
        );

        //redirect to index
        return redirect()->route('admin.features.index')->with($notification);
    }
}
