<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah siswa
        $totalStudents = User::where('role', 'user')->count();
        return view('admin.dashboard.index', compact('totalStudents'));
    }
}
