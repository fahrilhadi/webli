<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminContactDatas = Contact::latest()->get();
        return view('admin.contact.index', compact('adminContactDatas'));
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
        $adminContactData = Contact::findOrFail($id);
        return view('admin.contact.show', compact('adminContactData'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get Contact use by ID
        $contact = Contact::findOrFail($id);

        //delete Contact
        $contact->delete();

        // toastr notification
        $notification = array (
            'message' => 'Deleted Successfully!',
            'alert-type' => 'success'
        );

        //redirect to index
        return redirect()->route('admin.contact.index')->with($notification);
    }
}
