<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\remark;

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
            $remark = new remark();
            $remark->enquiry_id = $request->input('enquiry_id');
            $remark->remark = $request->input('remark');
            $remark->user_id = $request->input('user_id');
            $remark->user_type = Auth::user()->role;
            $remark->remark_type = 'remark';
            $remark->status = $request->input('status');
            $remark->save();
            if($request->send_mail)
            {
                $content = $request->input('remark');
                $filePath = $request->uploaded_file_path;  
                // if(!empty($filePath))
                // {
                //     $remark = new remark();
                //     $remark->enquiry_id = $request->input('enquiry_id');
                //     $remark->user_id = $request->input('user_id');
                //     $remark->user_type = Auth::user()->role;
                //     $remark->remark_type = 'email';
                //     $remark->status = $request->input('status');
                //     $remark->remark = $filePath;
                //     $remark->save();
                // }
                

                $html = view('emails.template', ['content' => $content])->render();
                try {
                    Mail::send([], [], function ($message) use ($html, $request, $filePath) {
                        // $message->to($request->user_email)
                        $message->to('testing@mastiforever.com')
                                ->subject('Enquiry Details')
                                ->html($html);
                                if ($filePath) {
                                    $message->attach(storage_path('app/public/' . $filePath), [
                                        'as' => 'Enquiry.pdf',
                                        'mime' => 'application/pdf',
                                    ]);
                                }
                    });
                
                    // If no exception, the mail was sent successfully
                    // return response()->json(['message' => 'Mail sent successfully']);
                } catch (\Exception $e) {
                    // Log the error or return the error message
                    Log::error('Mail send failed: ' . $e->getMessage());
                
                    
                }
            }


            // Redirect to the appropriate page with a success message
            return redirect()->back()->with('success', 'Remark added successfully');
        
        } catch (\Exception $e) {
            // echo "<pre>"; print_r($e); die;
            // Handle the exception and return an error message
            return redirect()->back()->with('error', 'Failed to add remark. Please try again. Error: ' . $e->getMessage());
        }
    }

}
