<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session()->has('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // For this simple case, we'll check for hardcoded admin credentials
        if ($credentials['username'] === 'admin' && $credentials['password'] === 'admin123') {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard')->with('success', 'Welcome back, Admin!');
        }

        return back()
            ->withInput($request->only('username'))
            ->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ]);
    }

    public function logout(Request $request)
    {        session()->flush();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
