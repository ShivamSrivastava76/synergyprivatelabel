<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\enquiry;

class AdminEnquiryController extends Controller
{
    public function index()
    {
        // Retrieve all enquiries with the related user, product, ordered remark details, and emails
        // $enquiries = enquiry::with(['user', 'enquiryProducts.product', 'remarks.user', 'emails']) // Add 'emails' here
        //             ->where('status', 0)
        //             ->get();

        $enquiries = enquiry::with(['user'])->orderBy('last_message', 'ASC')->orderBy('updated_at', 'DESC')->paginate(10);

        // Return the view with the enquiries data
        return view('admin.enquries.index', compact('enquiries'));
    }

    public function showEnquiryDetails($id)
    {
        // $enquiry = enquiry::with(['user', 'enquiryProducts.product', 'emails']) // Include emails here if needed
        //                   ->findOrFail($id);
        $enquiry = enquiry::with(['user', 'enquiryProducts.product']) // Include emails here if needed
        ->findOrFail($id);
        // $enquiry = Enquiry::with('remarks.user')->findOrFail($id);
        // echo "<pre>"; print_r($enquiry); die;
        return view('admin.enquries.partials.details', compact('enquiry'));
    }

    public  function iplock(Request $request)
    {
        enquiry::where('ip_address', $request->ip)->update(['status'=> $request->status]);

    }

    public  function searchEnquiries(Request $request)
    {
        $searchValue = $request->input('searchValue', '');

        $enquiries = enquiry::with(['user'])
        ->when($searchValue, function ($query, $searchValue) {
            $query->whereHas('user', function ($userQuery) use ($searchValue) {
                $userQuery->where('email', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('first_name', 'LIKE', '%' . $searchValue . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchValue . '%');
            });
        })
        ->orderBy('last_message', 'ASC')
        ->orderBy('updated_at', 'DESC')
        ->paginate(10);

            return view('admin.compment.enquiriesList', compact('enquiries'));

    }
}
