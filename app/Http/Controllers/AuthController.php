<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            if(Auth::user()->role_id == 1) return redirect()->route('adminDashboard');

            return redirect()->route('home');
        }

        return back()->withErrors([
            'login' => "Email atau password tidak cocok",
        ]);
    }

    public function registerPage() {
        return view('user.register');
    }

    public function registerMtd(Request $request) {
        $validateReq = $request->validate([
            'email' => 'required|email',
            'password' => 'required|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->coin = 0;
        $user->role_id = 2;
        $user->save();
        
        return redirect()->route('login');
    }

    public function logoutMtd() {
        Auth::logout();

        return redirect()->route('login');
    }
}
