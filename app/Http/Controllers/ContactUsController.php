<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contactUs;
class ContactUsController extends Controller
{
    public function index()
    {
        $contacts = contactUs::get();
        return view('admin.contactEnquiry.index', compact('contacts'));
    }
    public function destroy($id)
    {
        try {
            $contactUs = contactUs::findOrFail($id);
    
            // Perform soft delete
            $contactUs->delete();
            return redirect()->route('admin.contact-enquiry.index')->with('success', 'Contact enquiry deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.contact-enquiry.index')->with('error', 'Failed to delete the contact enquiry. Please try again.');
        }
    }
}
