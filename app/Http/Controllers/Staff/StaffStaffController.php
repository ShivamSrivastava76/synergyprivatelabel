<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission;
use App\Models\permissionUsers; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class StaffStaffController extends Controller
{

    public function dashboard()
    {
        $staff = User::with('permissions')->find(Auth::user()->id);
        Auth::login($staff);
        return view('staff.index');
    }

    public function index()
    {
        $staffs = User::where('role', 1)
                ->get();
        return view('staff.staff.index', compact('staffs'));
    }
    
    public function create()
    {
        $permissions = Permission::all();
        return view('staff.staff.create',compact('permissions'));
    }
    public function store(Request $request)
    {
        // Custom validation messages
        $messages = [
            'first_name.required' => 'First name is required.',
            'first_name.string'   => 'First name must be a string.',
            'first_name.max'      => 'First name should not be more than 255 characters.',
            'last_name.required'  => 'Last name is required.',
            'last_name.string'    => 'Last name must be a string.',
            'last_name.max'       => 'Last name should not be more than 255 characters.',
            'email.required'      => 'Email address is required.',
            'email.email'         => 'Please enter a valid email address.',
            'email.unique'        => 'This email is already taken.',
            'password.required'   => 'Password is required.',
            'password.min'        => 'Password should be at least 8 characters long.',
        ];

        // Validate form input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:8',
        ], $messages);

        try {
            // Store the new staff member
            $user = User::create([
                'first_name' => $request->input('first_name'),
                'last_name'  => $request->input('last_name'),
                'email'      => $request->input('email'),
                'role'       => 1, // Assuming '1' is the role for staff members
                'password'   => Hash::make($request->input('password')), // Encrypt the password
            ]);
            // Attach selected permissions
            $user->permissions()->attach($request->input('permissions'), ['status' => 0]);
            

            // Redirect with a success message
            return redirect()->route('staff.staff.index')->with('success', 'Staff member added successfully.');

        } catch (\Exception $e) {
            // Catch and handle any errors
            return redirect()->back()->withErrors(['error' => 'There was an error creating the staff member. Please try again.']);
        }
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $permissions = Permission::all();

        return view('staff.staff.edit', compact('user', 'permissions'));
    }
    public function update(Request $request, $id)
    {
        // Custom validation messages
        $messages = [
            'first_name.required' => 'First name is required.',
            'first_name.string'   => 'First name must be a string.',
            'first_name.max'      => 'First name should not be more than 255 characters.',
            'last_name.required'  => 'Last name is required.',
            'last_name.string'    => 'Last name must be a string.',
            'last_name.max'       => 'Last name should not be more than 255 characters.',
            'email.required'      => 'Email address is required.',
            'email.email'         => 'Please enter a valid email address.',
            'email.unique'        => 'This email is already taken.',
        ];

        // Validate the input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $id, // Ignore the current user's email
            // Password is optional on update, but if provided, it should be at least 8 characters
            'password'   => 'nullable|string|min:8',
            'permissions.*' => 'integer|exists:permissions,id', 
        ], $messages);

        try {
            // Fetch the user to update
            $user = User::findOrFail($id);

            // Update user details
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');

            // Only update the password if provided
            if ($request->filled('password')) {
                $user->password = Hash::make($request->input('password'));
            }

            $user->save();
            $permissions = $request->input('permissions');
            $permissionsWithStatus = [];
            foreach ($permissions as $permissionId) {
                $permissionsWithStatus[$permissionId] = ['status' => 0]; // Set status to 0
            }

            // Sync permissions and provide status
            $user->permissions()->sync($permissionsWithStatus);

            // Redirect with a success message
            return redirect()->route('staff.staff.index')->with('success', 'Staff member updated successfully.');

        } catch (\Exception $e) {
            
            return redirect()->back()->withErrors(['error' => 'There was an error updating the staff member. Please try again.']);
        }
    }
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
    
            $user->delete();
    
            return redirect()->route('staff.staff.index')->with('success', 'Staff deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('staff.staff.index')->with('error', 'Failed to delete the staff. Please try again.');
        }
    }

}
