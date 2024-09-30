<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contactUs;

class StaffContactUsController extends Controller
{
    
    public function index()
    {
        $contacts = contactUs::get();
        return view('staff.contactEnquiry.index', compact('contacts'));
    }
    public function destroy($id)
    {
        try {
            $contactUs = contactUs::findOrFail($id);
    
            // Perform soft delete
            $contactUs->delete();
            return redirect()->route('staff.contact-enquiry.index')->with('success', 'Contact enquiry deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('staff.contact-enquiry.index')->with('error', 'Failed to delete the contact enquiry. Please try again.');
        }
    }
}
