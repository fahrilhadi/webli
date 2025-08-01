<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminStudentsDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminStudentDatas = User::where('role','user')->latest()->get();
        return view('admin.students-data.index', compact('adminStudentDatas'));
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
        $isChecked = $request->input('is_checked', 0);

        $user = User::findOrFail($id);
        if ($user) {
            $user->status =  $isChecked;
            $user->save();
        }

        return response()->json([
            'message' => 'Status Updated Successfully.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
