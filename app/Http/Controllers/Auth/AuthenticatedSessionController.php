<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\HearAboutOption;
use App\Models\category;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $category  = category::orderBy('id', 'asc')->where('status',0)->take(5)->get();

        $categories = category::with('subcategories')->get();
        $HearAboutOption = HearAboutOption::where('status',0)->get();
        return view('auth.login', compact('HearAboutOption', 'category', 'categories'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::user()->role == 0)
        {
            return redirect()->route('admin.index');
        }
        else if(Auth::user()->role == 1)
        {
            return redirect()->route('staff.index');
        }
        else
        {
            return redirect()->route('user.index');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
