<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HearAbout;

class AdminQuoteController extends Controller
{
    public function index()
    {
        $hearAbout = HearAbout::with('quote')->get();
        return view('admin.hearAbout.index', compact('hearAbout'));
    }
    
    public function destroy($id)
    {
        try {
            $hearAbout = HearAbout::findOrFail($id);
    
            // Perform soft delete
            $hearAbout->delete();
            return redirect()->route('admin.quote.index')->with('success', 'Quote enquiry deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('admin.quote.index')->with('error', 'Failed to delete the quote enquiry. Please try again.');
        }
    }
}
