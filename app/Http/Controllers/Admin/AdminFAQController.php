<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminFaqDatas = Faq::latest()->get();
        return view('admin.faq.index', compact('adminFaqDatas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate form
        $request->validate([
            'content_title' => 'required',
            'content_description' => 'required',
        ]);

        Faq::create([
            'content_title' => $request->content_title,
            'content_description' => $request->content_description,
        ]);

        // toastr notification
        $notification = array (
            'message' => 'Created Successfully!',
            'alert-type' => 'success'
        );

        // redirect back
        return redirect()->route('admin.faq.index')->with($notification);
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
        $adminfaqData = Faq::findOrFail($id);
        return view('admin.faq.edit', compact('adminfaqData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate form
        $request->validate([
            'content_title' => ['required', 'string', 'max:255'],
            'content_description' => 'required',
        ]);

        // Temukan adminfaqData berdasarkan ID
        $adminfaqData = Faq::findOrFail($id);

        // Data untuk diupdate
        $adminfaqData->update([
            'content_title' => $request->content_title,
            'content_description' => $request->content_description,
        ]);

        // toastr notification
        $notification = array (
            'message' => 'Updated Successfully!',
            'alert-type' => 'success'
        );

        // redirect back
        return redirect()->route('admin.faq.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         //get Faq use by ID
         $faq = Faq::findOrFail($id);

         //delete Faq
         $faq->delete();
 
         // toastr notification
         $notification = array (
             'message' => 'Deleted Successfully!',
             'alert-type' => 'success'
         );
 
         //redirect to index
         return redirect()->route('admin.faq.index')->with($notification);
    }
}
