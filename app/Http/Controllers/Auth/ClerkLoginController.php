<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClerkLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:clerk')->except('clerkLogout');
    }

    public function showLoginForm()
    {
        return view('auth.clerk-login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('clerk')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('clerk.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function clerkLogout()
    {
        Auth::guard('clerk')->logout();
        return redirect('/welcome');
    }
}
