<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HearAbout;

class StaffQuoteController extends Controller
{
    public function index()
    {
        $hearAbout = HearAbout::with('quote')->get();
        return view('staff.hearAbout.index', compact('hearAbout'));
    }

    public function destroy($id)
    {
        try {
            $hearAbout = HearAbout::findOrFail($id);
    
            // Perform soft delete
            $hearAbout->delete();
            return redirect()->route('staff.quote.index')->with('success', 'Quote enquiry deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('staff.quote.index')->with('error', 'Failed to delete the quote enquiry. Please try again.');
        }
    }
}
