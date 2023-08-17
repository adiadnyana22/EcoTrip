<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage() {
        return view('user.login');
    }

    public function loginMtd(Request $request) {
        $validateReq = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($validateReq)) {
            return redirect()->route('home');
        }

        return back()->withErrors([
            'login' => "Email atau password tidak cocok",
        ]);
    }

    public function registerPage() {
        return view('user.register');
    }

    public function logoutMtd() {
        Auth::logout();

        return redirect()->route('login');
    }
}
