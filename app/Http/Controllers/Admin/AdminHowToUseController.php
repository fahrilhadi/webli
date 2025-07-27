<?php

namespace App\Http\Controllers\Admin;

use App\Models\HowToUse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminHowToUseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminHowToUseDatas = HowToUse::latest()->get();
        return view('admin.how-to-use.index', compact('adminHowToUseDatas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.how-to-use.create');
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

        HowToUse::create([
            'content_title' => $request->content_title,
            'content_subtitle' => $request->content_subtitle,
        ]);

        // toastr notification
        $notification = array (
            'message' => 'Created Successfully!',
            'alert-type' => 'success'
        );

        // redirect back
        return redirect()->route('admin.how-to-use.index')->with($notification);
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
        $adminHowToUseData = HowToUse::findOrFail($id);
        return view('admin.how-to-use.edit', compact('adminHowToUseData'));
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
        
        $adminHowToUse = HowToUse::findOrFail($id);

        $adminHowToUse->update([
                'content_title' => $request->content_title,
                'content_subtitle' => $request->content_subtitle,
            ]);

        // toastr notification
        $notification = array (
            'message' => 'Updated Successfully!',
            'alert-type' => 'success'
        );

        // redirect back
        return redirect()->route('admin.how-to-use.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get howTouse use by ID
        $howToUse = HowToUse::findOrFail($id);

        //delete howToUse
        $howToUse->delete();

        // toastr notification
        $notification = array (
            'message' => 'Deleted Successfully!',
            'alert-type' => 'success'
        );

        //redirect to index
        return redirect()->route('admin.how-to-use.index')->with($notification);
    }
}
