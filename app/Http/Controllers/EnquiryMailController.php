<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Email;
use PDF; // Import the PDF facade
use Exception; // Import the Exception class

class EnquiryMailController extends Controller
{
    public function store(Request $request)
    {
        // Define custom validation messages
        $messages = [
            'email_content.required' => 'The email content is required.',
            // 'enquiry_id.required' => 'The enquiry ID is required.',
            // 'enquiry_id.exists' => 'The selected enquiry ID does not exist.',
            // 'user_email.required' => 'The user email is required.',
            // 'user_email.email' => 'The user email must be a valid email address.',
            // 'status.required' => 'The status is required.',
        ];

        // Validate the request with custom messages
        $request->validate([
            'email_content' => 'required',
            'enquiry_id' => 'required|exists:enquiries,id',
            'user_email' => 'required|email',
            'status' => 'required',
        ], $messages);

        try {
            // Create the remark
            $email = new Email();
            $email->enquiry_id = $request->input('enquiry_id');
            // $email->user_id = auth()->id(); // Assuming you're using Laravel's auth
            $email->user_id = 2; 
            $email->status = $request->input('status');

            // Prepare email content for the template
            $content = $request->input('email_content');

            // Generate the PDF
            $pdf = PDF::loadView('emails.template', ['content' => $content]);

            // Save the PDF to a specified path
            $pdfName = 'email_template_' . time() . '.pdf'; // Generate unique name
            $pdfPath = public_path('assets/pdf/' . $pdfName); // Adjust the folder path as needed
            $pdf->save($pdfPath); // Save the PDF file

            // Store the PDF path in the database
            $email->email_content = $pdfName; // Save the file path
            $email->save();
            // $html = view('emails.template', ['content' => $content])->render();
            // // echo "<pre>"; print_r($html); die;
            // // // Optionally, send the email with the PDF attached
            // Mail::send([], [], function ($message) use ($html, $request) {
            //     $message->to($request->input('user_email'))
            //             ->subject('Enquiry Details')
            //             ->html($html); // Set the HTML content
            // });
            // Render the HTML from the template

            // Send the email with the HTML content and the PDF attached
            Mail::send('emails.template', ['content' => $content], function($message) use ($request, $pdfPath) {
                $message->to($request->input('user_email'))
                        ->subject('Enquiry Details')
                        ->attach($pdfPath, [
                            'as' => 'Enquiry.pdf',
                            'mime' => 'application/pdf',
                        ]);
            });
           return redirect()->back()->with('success', 'Email sent successfully!');

        } catch (Exception $e) {
            // Log the error message
            \Log::error('Error sending email: ' . $e->getMessage());

            // Return an error response with a validation message
            return redirect()->back()->with('error', 'An error occurred while sending the email. Please try again later.');
        }
    }
}