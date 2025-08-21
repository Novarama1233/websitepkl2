<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUserController extends Controller
{
    public function userlogin() 
    {
     
        return view('auth.userlogin');   
    }

    public function authenticated(Request $request)
    {
        $request->validate([
            'email'=>  'required|email',
            'password'=> 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/user/dashboard');
        }

        return back()->withErrors([
            'loginError' => 'Email atau password salah'
        ]);
    }
    public function userlogout()
    {
        Auth::logout();

        return redirect('/user/login');
    }
}
