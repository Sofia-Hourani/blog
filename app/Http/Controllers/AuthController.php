<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|alpha',
            'email'=>['required','email'],
            'password'=>'required'
        ]);

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {

            return redirect()->route('user');
        }
        return  back()->withErrors(['email' => 'Invalid login credentials']);

    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/home_page');
    }


}
