<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\enquiry;

class AdminDashboardController extends Controller
{
    //
    public function index()
    {
        $user = User::where('role', 1)->count();
        $enquiry = enquiry::count();
        return view('admin.index', compact('user', 'enquiry'));
    }
}
