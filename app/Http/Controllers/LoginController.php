<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function loginPage()
    {
        return view("loginPage");
    }

    public function handleLogin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if(Auth::attempt($validate)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/loginPage');
    }
}
