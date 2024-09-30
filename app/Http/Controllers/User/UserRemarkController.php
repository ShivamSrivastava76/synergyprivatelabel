<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Remark;

class UserRemarkController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'remark' => 'required',
                'enquiry_id' => 'required|exists:enquiries,id',
                'user_id' => 'required|exists:users,id',
                'status' => 'required',
            ]);

            // Create the remark
            $remark = new Remark();
            $remark->enquiry_id = $request->input('enquiry_id');
            $remark->remark = $request->input('remark');
            $remark->user_id = $request->input('user_id');
            $remark->user_type = Auth::user()->role;
            $remark->remark_type = 'remark';
            $remark->status = $request->input('status');
            $remark->save();

            // Redirect to the appropriate page with a success message
            return redirect()->back()->with('success', 'Remark added successfully');
        
        } catch (\Exception $e) {
            // Handle the exception and return an error message
            return redirect()->back()->with('error', 'Failed to add remark. Please try again. Error: ' . $e->getMessage());
        }
    }

}
