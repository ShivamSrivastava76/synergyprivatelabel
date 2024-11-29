<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\HearAboutOption;
use App\Models\category;
use App\Models\AddToCard;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $category  = category::orderBy('id', 'asc')->where('status',0)->take(5)->get();
        $categories = category::with('subcategories')->get();
        $HearAboutOption = HearAboutOption::where('status',0)->get();
        return view('auth.register', compact('HearAboutOption', 'category', 'categories'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'role' => 2,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        
        $output = [];
        

        // Loop through the command output to find the first valid MAC address
        $ip = exec('getmac', $output);;
        foreach ($output as $line) {
            // Use regex to find a MAC address pattern
            if (preg_match('/([0-9A-F]{2}(-[0-9A-F]{2}){5})/i', $line, $matches)) {
                $ip = $matches[0]; // Extract the MAC address
                break;
            }
        }
        
        $count = AddToCard::where('ip_address', $ip)->count();
        if($count > 0)
            return redirect('checkout');
        else
            return redirect()->route('user.index');
    }
}
