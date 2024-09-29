<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;
class EnquiryController extends Controller
{
    public function index()
    {
        // Retrieve all enquiries with the related user, product, ordered remark details, and emails
        // $enquiries = Enquiry::with(['user', 'enquiryProducts.product', 'remarks.user', 'emails']) // Add 'emails' here
        //             ->where('status', 0)
        //             ->get();

        $enquiries = Enquiry::with(['user']) // Add 'emails' here
                    ->where('status', 0)
                    ->get();

        // Return the view with the enquiries data
        return view('admin.enquries.index', compact('enquiries'));
    }

    public function showEnquiryDetails($id)
    {
        // $enquiry = Enquiry::with(['user', 'enquiryProducts.product', 'emails']) // Include emails here if needed
        //                   ->findOrFail($id);
        $enquiry = Enquiry::with(['user', 'enquiryProducts.product']) // Include emails here if needed
        ->findOrFail($id);
        // $enquiry = Enquiry::with('remarks.user')->findOrFail($id);
        // echo "<pre>"; print_r($enquiry); die;
        return view('admin.enquries.partials.details', compact('enquiry'));
    }

}
