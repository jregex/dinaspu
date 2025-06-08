<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function login()
    {
        $data = [
            'title' => 'Login',
        ];

        return view('vendor.adminlte.auth.login', $data);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $cek = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (Auth::attempt($cek)) {
            return redirect()->intended('admin/dashboard');
        }
        throw ValidationException::withMessages([
            'email' => 'Email atau password tidak terdaftar',
        ]);
        // return back()->with('failed','email tidak ada atau password salah');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('home');
    }
}
