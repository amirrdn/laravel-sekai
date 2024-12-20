<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        try {
            // Cek autentikasi login
            $request->authenticate();
    
            // Regenerasi session setelah login berhasil
            $request->session()->regenerate();
    
        } catch (ValidationException $e) {
            dd($e);
            return redirect()->route('login')->withErrors(['email' => 'Invalid credentials.']);
        }
    
        if (Auth::user()->role_id !== 1) {
            Auth::logout();  // Logout user yang memiliki role_id selain 1
            return redirect()->route('login')->withErrors(['email' => 'You do not have the required role to log in.']);
        }

        return redirect()->intended(route('dashboard', absolute: false));
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
